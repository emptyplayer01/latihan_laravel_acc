<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Blog;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Category;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
        $this->middleware('adminUser', ['only' => ['dashboard','reject','accept']]);
        $this->middleware('authorUser', ['only' => ['index','edit','create','update','store','delete']]);
    }

    public function index(Request $request){
        $Blog = new Blog;
        $Category = new Category;
        $user_id = Auth::user()->id;

        $blogs  = $Blog->where('user_id',$user_id)->paginate(5);
        $categorys = $Category->where('id','id_category');
        return view('blog.index', compact('blogs','categorys'));
    }

    public function create(Request $request){
        $Category = new Category;
        $categorys = $Category
        ->paginate(5);
        return view('blog.create',compact('categorys'));
    }

    public function store(BlogStoreRequest $request){
        $Blog = new Blog;
        $Blog->create([
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=> Auth::user()->id,
            'status'=>1,
            'flag_active'=>1,
            'id_category'=>$request->category
        ]);

        return redirect()->route('blog.index')->with(['success' => 'berhasil menambahkan blog']);
    }

    public function edit(Request $request, $id){
        $Blog = new Blog;
        $blog = $Blog->whereId($id)->first();

        if($blog !=null && $blog->user_id==Auth::user()->id){
            return view('blog.edit', compact('blog'));
        }else{
            return redirect()->route('blog.index');
        }
    }

    public function update(BlogUpdateRequest $request){
        $Blog = new Blog;
        $blogWillBeUpdate = $Blog->find($request->id);

        if ($blogWillBeUpdate!=null && $blogWillBeUpdate->user_id ==Auth::user()->id) {
            $Blog->whereId($request->id)->update([
                'title'=>$request->title,
                'content'=>$request->content,
                'status'=>1,
                'flag_active'=>$request->flag_active
            ]);
            return redirect()->route('blog.index');
        }else{
            return redirect()->route('blog.index');
        }
    }

    public function delete(Request $request){
        $Blog = new Blog;
        $blogWillBeDelete = $Blog->find($request->id);

        if($blogWillBeDelete!=null && $blogWillBeDelete->user_id==Auth::user()->id){
            $Blog->whereId($request->id)->delete();
            return redirect()->route('blog.index')->with(['success'=>'berhasil menghapus blog']);
        }else{
            return redirect()->route('blog.index')->with(['error'=>'terjadi kesalahan']);
        }
    }

    public function show(Request $request,$id){
        $Blog = new Blog;
        $blog = $Blog->whereId($id)->with('user')->first();

        Auth::check() ? $user_id = Auth::user()->id : $user_id = 0;
        return view('blog.show',compact('blog','user_id'));
    }

    public function dashboard(Request $request){
        $Blog = new Blog;
        $blogs = $Blog->with('user')->paginate(5);

        return view('blog.dashboard',compact('blogs'));
    }

    public function accept(Request $request,$id){
        $Blog = new Blog;
        
        if($Blog->find($request->id)){
            $Blog->whereId($request->id)->update([
                'status'=>3
            ]);
        return redirect()->back()->with(['success'=>'mengubah status blog dengan id '.$id.' menjadi accepted']);
        }else{
            return redirect()->back()->with(['error'=>'terjadi kesalahan']);
        }
    }

    public function reject(Request $request,$id){
        $Blog = new Blog;
        
        if($Blog->find($request->id)){
            $Blog->whereId($request->id)->update([
                'status'=>2
            ]);
            return redirect()->back()->with(['success'=>'Mengubah status blog dengan id'.$id.'menjadi rejected']);
        }else{
            return redirect()->back()->with(['error'=>'terjadi kesalahan sistem']);
        }
    }
    
}
