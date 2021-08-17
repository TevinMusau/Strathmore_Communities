@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <br>
    <div class="row ">
        <div class="col">
        <h5>Post Title:</h5>
        <br>
        <p>{{$post->title}}</p>
        </div>
        <div class="col">
        <h5>Post Creator:</h5>
        <br>
        <p><a href="/users/{{$post->user->id}}" class="btn btn-link">{{$post->user->username}}</a></p>
        </div>
        <div class="col">
        <h5>Date of Post Creation:</h5>
        <br>
        <p>{{$post->created_at->diffForHumans()}}</p>
        </div>
    </div>
    {{-- <div class="row ">
        <div class="col">
        <h5>Event Location:</h5>
        <br>
        <p>{{$flag->location}}</p>
        </div>
        <div class="col">
        <h5>Event Creator:</h5>
        <br>
        <p>{{$flag->user->username}}</p>
        </div>
        <div class="col">
        <h5>Action:</h5>
        <br>
            {!!Form::open(['action'=>['EventUserController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                {{Form::hidden('user_id',Auth::user()->id)}}
                {{Form::hidden('event_id',$event->id)}}
                {{Form::submit('Join Event',['class'=>'btn btn-outline-success'])}}
            {!!Form::close()!!}
        </div>
    </div> --}}
    <div class="row justify-content-center">
        <table class="table table-stripped" style="width:75%">
            <thead>
                <tr>
                    <th>Flagged By:</th>
                    <th>Flagged For:</th>
                    <th>Context for Flagging:</th>
                    <th>Created:</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($post->flags as $item)
                <tr>
                    <td>{{$item->user->username}}</td>
                    <td>{{$item->flag_for}}</td>
                    <td><?php echo $item->extra;?></td>
                    <td><span class="type-2">{{$item->created_at->diffForHumans()}}</span></td>
                </tr>
                @endforeach
            </tbody>
            </table>
    </div>
</div>
@endsection