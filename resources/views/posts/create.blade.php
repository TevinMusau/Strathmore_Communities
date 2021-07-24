@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="display 2">Create Post</h2>
        </div>
        <div class="row justify-content-center">
            {!!Form::open(['action'=>'PostsController@store', 'method'=>'POST','enctype'=>'multipart/formdata','files'=>'true'])!!}
                <div class="form-group-row ">
                    <div class="row justify-content-center">
                        {{Form::label('title','Title')}}
                    </div>
                     {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
                </div>
                <div class="form-group-row ">
                    <div class="row justify-content-center">
                        {{Form::label('category','Community')}}
                    </div>
                     {{Form::select('category',$cat,$selectedID,['class'=>'form-control'])}}
                </div>
                <div class="form-group-row">
                    <div class="row justify-content-center">
                     {{Form::label('body','Body')}}
                    </div>
                     {{Form::textarea('body','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
                </div>
                <div class="form-group-row">
                    <br>
                    {{Form::file('post_image')}}
                </div>
                <div class="row justify-content-center">
                    {{Form::hidden('user_id')}}
                    <br>
                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                </div>
            {!!Form::close()!!}
        </div>
    </div>
@endsection