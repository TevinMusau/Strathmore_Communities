@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h2 class="text-center p-4">{{$event->user->username}}'s Event</h2>
        
        <div class="card mx-4">
            <div class="card-header">
                <div class="text-center p-2">
                    <span class="h5 p-2">About "{{$event->event_title}}" Event</span>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <p class="lead"><?php echo $event->about;?></p>
                </div>
            </div>
            <div class="card-footer">
                <span>Event Date:</span>
                <span>{{$event->deadline}}</span> <br>
                
                <span>Event Location:</span>
                <span>{{$event->location}}</span> <br>

                <span>Event Creator:</span>
                <span>{{$event->user->username}}</span> <br>

                <div class="text-center">
                    {!!Form::open(['action'=>['EventUserController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                            {{Form::hidden('user_id',Auth::user()->id)}}
                            {{Form::hidden('event_id',$event->id)}}
                            {{Form::submit('Join Event',['class'=>'btn btn-outline-success', 'style'=>'width:15%; padding: 0.4rem'])}}
                    {!!Form::close()!!}
                </div>

            </div>
        </div>
        {{-- <div class="row p-4">
            <div class="col">
                
                
            </div>
            <div class="col">
            <h5>About Event:</h5>
            <br>
           
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
            <p></p>
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
            </div> --}}
            {{-- <div class="col"><br><br>
                    <a href="/pdf/event/{{$event->id}}" class="btn btn-link">Make PDF</a>
            </div> --}}
        {{-- </div> --}}
        <h4 class="text-center p-4"> Joined this Event </h4>
        
            @if (count($event->users)>0)
            <div class="row justify-content-center">
            <table class="mx-auto w-auto table table-responsive text-center">
                <thead>
                    <tr>
                        <th class="p-3">Name:</th>
                        <th class="p-3">Username:</th>
                        <th class="p-3">Email:</th>
                        <th class="p-3">Admission Number:</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($event->users as $item)
                    <tr>
                        <td class="p-3">{{$item->name}}</td>
                        <td class="p-3">{{$item->username}}</td>
                        <td class="p-3">{{$item->email}}</td>
                        <td class="p-3">{{$item->adm_no}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="text-center p-4">
                    <h1>There are no student in this event!</h1>
                </div>
                    
                @endif
            </table>
            
        </div>
    </div>
@endsection