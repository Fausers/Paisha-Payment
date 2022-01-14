<?php

namespace App\Http\Controllers\Mwangaza;

use App\Http\Controllers\Controller;
use App\Models\Mwangaza\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class CategoryMGtControllrt extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories  = PostCategory::get();
        return view('CRM.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
        {
            if ($request['category_id'] == 0)
                $request['category_id'] = null;
    
                
            $user = Auth::user();
    
    
            if (isset($request['photo'])) {
    
                $name = str_replace('/','_',$request['name']);
                $path = 'storage/categories/'.str_replace(' ','_',$name);
                if(!file_exists($path))
                    mkdir($path, 0777,true);
    
                $front = Image::make($request['photo'])
                    ->fit(650, 850)
                    ->save($path.'/'.rand(1000,9999).'front.jpg');
    
                $thumb = Image::make($request['photo'])
                    ->fit(500, 500)
                    ->save($path.'/'.rand(1000,9999).'thumb.jpg');
    
                $wide   = Image::make($request['photo'])
                    ->fit(1920, 1080)
                    ->save($path.'/'.rand(1000,9999).'cover.jpg');
    
                $request['wide'] = str_replace('storage/','',$wide->basePath());
    
                $request['thumb'] = str_replace('storage/','',$thumb->basePath());
    
                $request['image'] = str_replace('storage/','',$front->basePath());
            }
    
            PostCategory::create($request->all());
            return redirect()->back();
        }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::where('category_id',null)->get();
        return view('pos.categories.main',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category = PostCategory::findOrFail($id);
        if ($request['category_id'] == 0)
            $request['category_id'] = null;



        if (isset($request['photo'])) {

            $path = 'storage/categories/'.str_replace(' ','_',$request['name']);
            if(!file_exists($path))
                mkdir($path, 0777);

            $front = Image::make($request['photo'])
                ->fit(650, 850)
                ->save($path.'/'.rand(1000,9999).'front.jpg');

            $thumb = Image::make($request['photo'])
                ->fit(500, 500)
                ->save($path.'/'.rand(1000,9999).'thumb.jpg');

            $wide   = Image::make($request['photo'])
                ->fit(1920, 1080)
                ->save($path.'/'.rand(1000,9999).'cover.jpg');

            $request['wide'] = str_replace('storage/','',$wide->basePath());
            $request['thumb'] = str_replace('storage/','',$thumb->basePath());
            $request['image'] = str_replace('storage/','',$front->basePath());
        }
        $category->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostCategory::destroy($id);
        return redirect()->back();
    }
}
