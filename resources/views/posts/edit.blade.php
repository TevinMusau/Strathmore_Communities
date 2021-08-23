@extends('layouts.app')
@section('content')
   <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="p-4">Edit Post</h2>
        </div>

       <div class="row justify-content-center">
            {!!Form::open(['action'=>['PostsController@update',$posts->id],'method'=>'POST','onsubmit'=>"return confirm('Are you sure you would like to Edit This Post?');"])!!}
            <div class="form-group-row ">
                <div class="row justify-content-center">
                    {{Form::label('title','Title')}}
                </div>
                {{Form::text('title',$posts->title,['class'=>'form-control','placeholder'=>'Title'])}}
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
                    {{Form::textarea('body',$posts->body,['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
            </div>

            <div class="form-group-row">
                <br>
                <span class="px-4"> Select a Post Image (Optional)</span>
                <br>
                {{Form::file('post_image')}}
            </div>

            <div class="row justify-content-center">
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save This Edit',['class'=>'btn btn-outline-success m-3','style'=>'width: 20%;' ])}}
            </div>
            
            {!!Form::close()!!}  
       </div>
    </div> 
@endsection