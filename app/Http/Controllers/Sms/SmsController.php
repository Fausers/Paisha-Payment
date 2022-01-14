<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use App\Imports\ContactsImport;
use App\Models\Pos\Shop;
use App\Models\Sms\Callback;
use App\Models\Sms\Contact;
use App\Models\Sms\Group;
use App\Models\Sms\Inbox;
use App\Models\Sms\Outbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;

class SmsController extends Controller
{
    public function inbox()
    {
        $user = Auth::user();
        $shop = Shop::find($user->active_shop);
        $groups = Group::where('shop_id',$shop->id)->get();
        $inbox = Inbox::get();

        foreach ($inbox->reverse() as $element) {
            $conversation[$element->from][] = $element;
        }

//        return $conversation['255785008133'];

        return view('pos.sms.create',compact('groups','inbox','conversation'));
    }

    public function outbox()
    {
        $user = Auth::user();
        $shop = Shop::find($user->active_shop);
//        $outbox = $shop->outbox->peginate(20);
        $outbox = Outbox::where('shop_id',$shop->id)->orderBy('id','desc')->paginate(30);
        $groups = Group::where('shop_id',$shop->id)->get();
        return view('pos.sms.outbox',compact('groups','outbox'));
    }

    public function group()
    {
        $user = Auth::user();
        $shop = Shop::find($user->active_shop);
        $groups = Group::where('shop_id',$shop->id)->get();
        return view('pos.sms.group',compact(    'groups'));
    }

    public function saveGroup(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::find($user->active_shop);
        $request['shop_id'] = $shop->id;
        Group::create($request->all());

        return redirect()->back();
    }

    public function updateGroup(Request $request,$id)
    {
        $group = Group::findOrFail($id);
        $group->update($request->all());

        return redirect()->back();
    }

    public function destroyGroup($id)
    {
        Group::destroy($id);
        return redirect()->back();
    }

    public function contacts($group_id)
    {
        $group = Group::findOrFail($group_id);
        return view('pos.sms.contact',compact('group'));
    }

    public function storeContact(Request $request)
    {
        Contact::create($request->all());

        return redirect()->back();
    }

    public function updateContact(Request $request,$id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->back();
    }

    public function storeExcelContact(Request $request)
    {
        Contact::create($request->all());

        return redirect()->back();
    }

    public function import(Request $request)
    {
        if (isset($request['contacts'])) {
            $file = $request['contacts'];

            $file_type = $file->extension();

            $file_name  = microtime(true).".".$file_type;

            $file->move('uploads/contacts',$file_name);

            $request['file'] = $file_name;
            $request['type'] = $file_type;
        }

        Excel::import(new ContactsImport, 'uploads/contacts/'.$request['file']);

        return redirect()->route('remove_space',[$request['group_id']]);
    }


    public function removeSpace($id)
    {
        $group = Group::findOrFail($id);
        $contacts = $group->contacts;

        foreach ($contacts as $contact1) {

            $old_no = $contact1->phone;

            $new_no = preg_replace('/\s+/', '', $old_no);
            $new_no = preg_replace('/-/', '', $new_no);
            $new_no = preg_replace('/\)/', '', $new_no);
            $new_no = preg_replace('/\(/', '', $new_no);



            $contact = Contact::find($contact1->id);

            $contact->phone = $new_no;

            $contact->save();
        }

        return redirect()->route('remove_zero',[$id])->with('success', 'All good!');

    }

    public function removeZero($id)
    {
        $group = Group::findOrFail($id);
        $contacts = $group->contacts;

        foreach ($contacts as $contact1) {

            $new_no = $contact1->phone;

            if (strpos($new_no, '0') == 0) {
                $new_no = preg_replace('/^0/', '+255', $new_no);
            }
            if(strpos($new_no, '255') == 0) {
                $new_no = preg_replace('/^255/', '+255', $new_no);
            }
            if(strpos($new_no, '6') == 0) {
                $new_no = preg_replace('/^6/', '+2556', $new_no);
            }
            if(strpos($new_no, '7') == 0) {
                $new_no = preg_replace('/^7/', '+2557', $new_no);
            }

            $contact = Contact::find($contact1->id);

            $contact->phone = $new_no;

            $contact->save();
        }

        return redirect()->route('remove_dead',[$id])->with('success', 'All good!');

    }

    public function deleteDead($id)
    {
        $group = Group::findOrFail($id);
        $contacts = $group->contacts;

        foreach ($contacts as $contact1) {

            if (!strpos($contact1->phone, '255') == 1) {
                // $new_no = '+255'.$new_no;
                $contact = Contact::find($contact1->id);
                $contact->delete();
            }

            if (strpos($contact1->phone, ':::') == 13) {
                $contact = Contact::find($contact1->id);
                $contact->delete();
            }
        }

        return redirect()->route('contacts',[$id])->withFlashSuccess('Contacts Successfully Added');
    }

    public function destroyContact($id)
    {
        Contact::destroy($id);

        return redirect()->back()->withFlashSuccess('Contact Deleted');
    }



    public function sent()
    {

    }


    public function sendSMS(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::find($user->active_shop);

        $groups = json_decode($request['compose_to'],true);
        foreach ($groups as $group){
            $gr = Group::where('name',$group['value'])->first();
            if (isset($gr)){
                foreach ($gr->contacts as $contact){
                    $message = str_replace('@name',$contact->first_name,$request['message']);
                    $message = str_replace('@phone',$contact->phone,$message);
                    $sms = $message;
                    $draft = new Outbox;
                    $draft->user_id = $user->id;
                    $draft->shop_id = $shop->id;
                    $draft->phone = $contact->phone;
                    $draft->status = 0;
                    $draft->message = $sms;
                    $draft->length = strlen($sms);
                    $draft->sms_count = $sms_count = ceil(strlen($sms)/160);

                    $draft->save();

                    if ($sms_count > $shop->balance->credits){
                        $draft->status = 3;
                        $draft->save();
                    }else{
                        $shop_balance = $shop->balance;
                        $shop_balance->credits -= $sms_count;
                        $shop_balance->save();

                        $source = $request['sender_name'];

                        $respons = $this->beemSend($draft->id,$contact->phone,$sms,$source);
                        $response = json_decode($respons,true);
                        if ($response['code'] == 100){
                            $draft->status = 1;
                            $draft->request_id = $response['request_id'];
                            $draft->save();
                        }
                    }

                }
            }
        }
        return redirect()->route('outbox');
    }

    public function beemSend($id,$phone,$sms,$source = 'Luxtech')
    {
        //        return '1';
        $api_key='07957caba2fe012f';
        $secret_key = 'ODdjZGFhZjUyOWIwNjE0MTYwNWMzNTQ0ZDQ2MDZjMmYxZjhmMDA4YWU4YmM4NDY0ZTI5MGI2NmJmYjY2ZWM0Ng==';
        // The data to send to the API
        $postData = array(
            'source_addr' => $source,
            'encoding'=>0,
            'schedule_time' => '',
            'message' => $sms,
            'recipients' => [
                array('recipient_id' => $id,'dest_addr'=>$phone)
            ]
        );
        //.... Api url
        $Url ='https://apisms.beem.africa/v1/send';

        // Setup cURL
        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if($response === FALSE){
                echo $response;

            die(curl_error($ch));
        }
        return $response;
    }

    public function reports(Request $request)
    {
//        file_put_contents('usa/user.txt', $request);
        $fp = fopen('usa/lidn.txt', 'a');
        fwrite($fp, $request);
        fclose($fp);

        $draft = Outbox::where('request_id',$request['request_id'])->first();
        $draft->status = 2;
        $draft->save();

        return $draft;
    }

    public function outboundReports(Request $request)
    {
        $callback = new Callback;
        $callback->response = $request;
        $callback->save();
//        $request['callback_id'] = $callback->id;
//        return $request->all();
        $inbox = new Inbox;
        $inbox->callback_id = $callback->id;
        $inbox->from = $request['from'];
        $inbox->to = $request['to'];
        $inbox->channel = $request['channel'];
        $inbox->timeUTC = $request['timeUTC'];
        $inbox->transaction_id = $request['transaction_id'];
        $inbox->message = $request['message']['text'];
        $inbox->billing = $request['billing']['subscriber_price'];

        $inbox->save();

        return $inbox;
        Inbox::create($request->all());
    }

    public function balance()
    {
        $user = Auth::user();
        $shop = Shop::find($user->active_shop);

        return view('pos.sms.balance',compact('shop'));
    }

    public function senderNames()
    {

    }
}
