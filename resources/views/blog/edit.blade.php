@extends('layouts/app')

@section('title')
    edit-{{$blog->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row page-titles mt-4">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="mb-0 mt-0">
                    Edit Blog
                </h3>
            </div>
        </div>
        <div class="row mt-4">
            <div class="card col-12">
                <div class="card-body">
                    <form action="{{route('blog.update')}}" method="POST">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" name="id" value="{{$blog->id}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Conten</label>
                            <div class="col-sm-10">
                                <textarea name="content" cols="50" rows="5">{{$blog->content}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-2">
                            @php
                                //1.update 2.rejected 3.accepted
                                $blog->status == 1 ? $status = 'update' : $blog->status == 2 ? $status = 'rejected' :  $status = 'accepted'
                            @endphp

                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$status}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Aktif</label>
                            <div class="col-sm-10">
                                <input type="radio" name="flag_active" class="form-check-input" value="1" 
                                @php
                                    if($blog->flag_active==1) checked 
                                @endphp>
                                <label>Ya</label>
                                <br>
                                <input type="radio" class="form-check-input" name="flag_active" value="0" 
                                @php
                                if($blog->flag_active == 0)checked 
                                @endphp>
                                <label>Tidak</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection