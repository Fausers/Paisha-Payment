<?php

namespace App\Http\Controllers\Mwangaza;

use App\Http\Controllers\Controller;
use App\Models\Mwangaza\Post;
use App\Models\Mwangaza\PostCategory;
use App\Models\Mwangaza\PostImage;
use App\Models\Mwangaza\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostManagementController extends Controller
{

    public function index()
    {
        $posts = Post::get();
        $categories  = PostCategory::get();
        return view('CRM.posts',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $post  = Post::create($request->all());
        $this->uploadImage($request,$post->id);

        return $this->edit($post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::get();
        $post = Post::findOrFail($id);
        return view('CRM.edit',compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        if(isset($request['tags'])) {
            $post->main_tags()->detach();
            $post->main_tags()->attach($request['tags']);
        }

        return redirect()->route('admin_post',[$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage(Request $request,$post_id)
    {
        $post = Post::findOrFail($post_id);
        $request['post_id'] = $post_id;

        if (isset($request['file'])) {

            $title = str_replace(' ','_',$post->title);

            $product_path = 'storage/posts/'.preg_replace('/[^A-Za-z0-9\-]/','',$title);
            if(!file_exists($product_path))
                mkdir($product_path, 0777);

            $path = 'storage/posts/'.preg_replace('/[^A-Za-z0-9\-]/','',$title).'/'.rand(1000,9999);
            if(!file_exists($path))
                mkdir($path, 0777);

            $front = Image::make($request['file'])
                ->fit(650, 750)
                ->save($path.'/front.webp');

            $cover   = Image::make($request['file'])
                ->fit(730, 450)
                ->save($path.'/main.webp');

            $thumb_car   = Image::make($request['file'])
                ->fit(400, 250)
                ->save($path.'/thumb.webp');
            $request['thumb'] = str_replace('storage/','',$thumb_car->basePath());

            $wide   = Image::make($request['file'])
                ->fit(900, 500)
                ->save($path.'/wide.webp');
            $request['wide'] = str_replace('storage/','',$wide->basePath());

            $request['main'] = str_replace('storage/','',$cover->basePath());

            $request['mid'] = str_replace('storage/','',$front->basePath());

            $post->image_url = $request['wide'];
            $post->save();
            return PostImage::create($request->all());
        }

        return '2020';
    }

    public function deleteImage($id)
    {
        $product_image = PostImage::findOrFail($id);

        if (count($product_image->post->images) < 2) {
            $product_image->post->status = 0;
            $product_image->post->save();
        }

        PostImage::destroy($id);

        return redirect()->back();
    }

    public function activatePost($id)
    {
        return $id;
    }

    public function desc(Request $request,$id)
    {
        $post = Post::findOrFail($id);
        $post->content = str_replace('"','',$request['doc']);
        $post->save();

        return response('Success');
    }

    public function search(Request $request)
    {
        $porojo = Post::where('title','Like','%'.$request['key'].'%')->get();
        $category  = "Matokeo";
        return view('mwangaza.searchs',compact('porojo','category'));
    }

}
