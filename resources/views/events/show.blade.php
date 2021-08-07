@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col">
            <h5>Event Title:</h5>
            <br>
            <p>{{$event->event_title}}</p>
            </div>
            <div class="col">
            <h5>About Event:</h5>
            <br>
            <p><?php echo $event->about;?></p>
            </div>
            <div class="col">
            <h5>Event Date:</h5>
            <br>
            <p>{{$event->deadline}}</p>
            </div>
        </div>
        <div class="row ">
            <div class="col">
            <h5>Event Location:</h5>
            <br>
            <p>{{$event->location}}</p>
            </div>
            <div class="col">
            <h5>Event Creator:</h5>
            <br>
            <p>{{$event->user->username}}</p>
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
        </div>
        <div class="row">
            @if (count($event->users)>0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name:</th>
                        <th>Username:</th>
                        <th>Email:</th>
                        <th>Admission Number:</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($event->users as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->adm_no}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="row justify-content-center">
                    <h1>There are no student in this event!</h1>
                </div>
                    
                @endif
            
        </div>
    </div>
@endsection