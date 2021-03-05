@extends('layouts/app')

@section('title')
    Create Category
@endsection

@section('content')
    <div class="container">
        <div class="row page-titles mt-4">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="mb-0 mt-0">Create Blog</h3>
            </div>
        </div>
        <div class="row mt-4">
            <div class="card col-12">
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection