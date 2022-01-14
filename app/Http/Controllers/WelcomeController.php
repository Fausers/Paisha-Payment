<?php

namespace App\Http\Controllers;

use App\Models\Mwangaza\Post;
use App\Models\Mwangaza\PostCategory;
use App\Models\Pos\Category;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function none()
    {
        $posts = Post::get();
        $category = PostCategory::findOrFail(1);
        $trending = Post::orderBy('views','desc')->limit(6)->get();
        $trending_new = Post::orderBy('created_at','desc')->orderBy('views','desc')->limit(6)->get();
        $trending2 = Post::orderBy('views','desc')->skip(5)->take(3)->get();
        $trending3 = Post::orderBy('views','desc')->skip(8)->take(3)->get();

        $latest_video  = Post::orderBy('created_at','desc')->where('asset_url', '!=' , null)->limit(4)->get();
        $big_vid = Post::orderBy('views','desc')->where('asset_url', '!=' , null)->get();


        $categories  = PostCategory::get();

        return view('welcome',compact('posts','category',
            'trending','trending2','trending3','trending_new', 'latest_video','big_vid','categories'));
    }

    public function welcome()
    {
        return view('user');
    }
}
