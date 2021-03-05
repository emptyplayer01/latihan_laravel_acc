<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
        $Category = new Category;
        $categorys = $Category->paginate(5);

        return view('category.index',compact('categorys'));
    }
    public function create(Request $request){
        return view('category.create');
    }
    public function store(Request $request){
        $Category = new Category;
        $Category->create([
            'title'=> $request->title
        ]);

        return redirect()->route('category.index');
    }
    public function delete(Request $request){
        $Category = new Category;
        $categoryWillBeDelete = $Category->find($request->id);

        if($categoryWillBeDelete != null){
            $Category->whereId($request->id)->delete();
            return redirect()->route('category.index');
        }else{
            return redirect()->route('category.index');
        }
    }
}
