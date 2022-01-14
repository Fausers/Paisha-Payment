<?php

namespace App\Http\Controllers\mwangaza;

use App\Http\Controllers\Controller;
use App\Models\Mwangaza\PostCategory;

use Illuminate\Http\Request;

class CategoryManagementContoller extends Controller
{
    public function index()
    {
        $categories  = PostCategory::get();
        return view('CRM.categories',compact('categories'));
    }
}
