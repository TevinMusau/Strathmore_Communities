@extends('layouts.app')
@section('content')
   <div class="container-fluid">
       <div class="row justify-content-center">
            {!!Form::open(['action'=>['PostsController@update',$posts->id],'method'=>'POST','onsubmit'=>"return confirm('Do you really want to submit the form?');"])!!}
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
            <div class="row justify-content-center">
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save',['class'=>'btn btn-primary'])}}
            </div>
            {!!Form::close()!!}  
       </div>
    </div> 
@endsection