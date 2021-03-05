@extends('layouts/app')

@section('title')
    Blog
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"> Halaman Blog
            </h1>
            <p class="lead"> Isi Content Blog
            </p>
        </div>
    </div>
    
    <div class="container">
        <div class="row ">
            <div class="col-md-6 mt-2"> 
                <form action="">
                    @foreach ($categorys as $category)
                        <a href="{{route('blog')}}">
                            <button class="btn btn-primary">{{$category->title}}</button>     
                        </a>   
                                          
                    @endforeach
                </form>
            </div>
        </div>
        <div class="row">
            
            @foreach ($blogs as $blog)
                <div class="col-md-6 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$blog->title}} - </h5>
                            <h6 class="card card-subtitle mb-2 text-muted">{{$blog->user->name}}</h6>                          
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            {{$blogs->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection