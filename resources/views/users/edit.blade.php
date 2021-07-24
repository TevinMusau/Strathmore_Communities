@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
                <h2>Edit My Details</h2>
        </div>
        <div class="container">
            {!! Form::open(['action'=> ['UsersController@update', $users->id], 'method'=>'POST',
             'enctype'=>'multipart/formdata','files'=>'true','onsubmit'=>'return confirm("Do you really want to submit the form?");']) !!}
                <div class="form-group row">
                     {{Form::text('username',$users->username,['class'=>'form-control','placeholder'=>'User name'])}}
                </div>
                <div class="form-group row">
                    {{Form::text('adm_no',$users->adm_no,['class'=>'form-control','placeholder'=>'Admission Number'])}}
                </div>
                <div class="form-group row">
                    {{Form::text('email',$users->email,['class'=>'form-control','placeholder'=>'Email'])}}
                </div>
                <div class="form-group-row">
                    {{Form::file('user_image')}}
                </div>
                <br>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save',['class'=>'btn btn-primary'])}}
                {!!Form::close()!!}
        </div>
    </div>
@endsection