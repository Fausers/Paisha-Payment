<?php

namespace App\Http\Controllers\Mwangaza;

use App\Http\Controllers\Controller;
use App\Models\Mwangaza\Post;
use App\Models\Mwangaza\PostCategory;
use Illuminate\Http\Request;

class   PostController extends Controller
{
    public function posts($category_name = null)
    {
        if (isset($category_name)){
            $category = PostCategory::where('name',$category_name)->first();
            $posts = $category->posts;
        }else{
            $posts = Post::get();
        }
        return view('mwangaza.posts',compact('posts','category'));
    }

    public function post($id,$name)
    {
        $post = Post::findOrFail($id);
        $post->views++;
        $post->save();

        $previous_post = Post::where('id','<',$id)->first();
        $next_post = Post::where('id','>',$id)->first();

        $related = $post->post_category->new;
        $populars = $post->post_category->popular;

        return view('mwangaza.post',compact('post',
            'previous_post','next_post','related','populars'));
    }

    
    public function about()
    {
        return view('mwangaza.about');
    }

    public function archive()
    {
        return view('mwangaza.archive');
    }

    public function contacts()
    {
        return view('mwangaza.contacts');
    }


}
