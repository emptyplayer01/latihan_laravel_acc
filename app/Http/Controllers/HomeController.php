<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function home(){
        return view('home');
    }
    public function about(){
        return view('about');
    }
    public function blog(){
        $Blog = new Blog;
        $blogs = $Blog
        ->paginate(10);
        
        $Category = new Category;
        $categorys = $Category
           ->paginate(5);

        return view('blog',compact('blogs','categorys'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
