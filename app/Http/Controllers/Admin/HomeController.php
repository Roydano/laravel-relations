<?php

namespace App\Http\Controllers\Admin;

/** controller per la parte admin */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;

class HomeController extends Controller
{
    public function index(){

        $categories = Category::all();
        $posts = Post::all();
        return view('admin.home', compact('categories', 'posts'));
    }
}
