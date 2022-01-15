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
       
    }

    public function welcome()
    {
        return view('user');
    }
}
