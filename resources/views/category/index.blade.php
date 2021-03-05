@extends('layouts/app')

@section('title')
    Category
@endsection

@section('content')
    <div class="container">
        <div class="row page-titles mt-4">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="mb-0 mt-0">Category</h3>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="float-right">
                    <a class="ml-2" href="{{route('category.create')}}">
                        <button class="btn btn-md btn-success pull-right">
                            <i class="fas fa-plus-circle"></i>
                            Add Category
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($categorys as $category)
                <div class="col-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$category->title}}</h4>

                            <div class="row float-right">
                                <a href="" class="btn btn-primary mr-2">
                                    Edit
                                </a>

                                <form action="{{route('category.delete')}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <button class="bn btn-danger" type="submit">Delete</button>
                                </form>                                
                            </div>                          
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>   
    </div>
@endsection