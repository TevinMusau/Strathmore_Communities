@extends('layouts.app')
@section('content')
    <div class="container" >
        @include('inc.messages')
        <div class="row justify-content-center">
            <div class="col-md-11 card text-center m-3">
                @if(count($posts->flags)>0)
                    <div class="row justify-content-start">
                        <div class="alert alert-danger" style="width: 100%" role="alert">
                            This post has {{$posts->flags->count()}} {{Str::plural('count',$posts->flags->count())}} of flags that have been created.
                            <br>
                            <a href="/flags/{{$posts->id}}" class="btn btn-link">Click on this to see a report of flags</a>
                        </div>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="p-4">
                        <h1 class="font-weight-bold">
                            {{$posts->title}} 
                        </h1>
                    </div>
                </div>
                <div class="row justify-content-center p-1">
                    <div class="col-5 text-center">
                        <h5 class="">By <a href="/users/{{$posts->user_id}}">{{$posts->user->username}}</a></h5>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <span class="p-2">
                        {{$posts->created_at->diffForHumans()}}
                    </span>  
                </div>
                @if ($posts->post_image)
                <div class="row justify-content-center p-3">
                    <img src="/storage/cover_images/{{$posts->post_image}}" class="img-fluid" alt="Responsive image" style="width: 30%">
                </div>
                @else
                    
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-7" >
                        <p class="text-justify p-3"><?php echo $posts->body?></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10" >
                        @if (count($posts->events)!=0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Event Title:</th>
                                        <th>About:</th>
                                        <th>Location:</th>
                                        <th>Date:</th>
                                        <th>View:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts->events as $item)
                                    <tr>
                                        <td>{{$item->event_title}}</td>
                                        <td><?php echo $item->about;?></td>
                                        <td>{{$item->location}}</td>
                                        <td>{{$item->deadline}}</td>
                                        <td><a href="/events/{{$item->id}}" class="btn-link">View Event</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h3>There are no events for this post</h3>
                        @endif
                    </div>
                </div>
                @auth
                <div class="row justify-content-start">
                   <div class="justify-content-end m-1" style="padding-left: 1px">
                        {!!Form::open(['action'=>['LikesController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                            {{Form::hidden('user_id',Auth::user()->id)}}
                            {{Form::hidden('posts_id',$posts->id)}}
                            {{Form::submit('Upvote',['class'=>'btn btn-outline-success'])}}
                        {!!Form::close()!!}
                   </div>
                   <div class="justify-content-end m-1">
                        {!!Form::open(['action'=>['LikesController@destroy',$posts->id],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Downvote',['class'=>'btn btn-outline-danger'])}}
                        {!!Form::close()!!}
                   </div>
                   <div class="justify-content-end m-1">
                        <span class="p-2">
                            {{$posts->likes->count()}} {{Str::plural('Upvote',$posts->likes->count())}}
                        </span>
                   </div>
                </div>
                <div class="row justify-content-center">
                </div>
                @endauth
                @auth
                    @if (Auth::user()->id==$posts->user_id)
                    <div class="card-footer text-muted text-right">
                        <div class="row" style="float: left">            
                                <div class="justify-content-end m-1">
                                    <a href="/posts/{{$posts->id}}/edit" class="btn btn-outline-primary" >Edit Post</a>
                                </div>

                                <div class="justify-content-end m-1">
                                        {!!Form::open(['action'=>['PostsController@destroy',$posts->id],'method'=>'POST','class'=>'pull-right',
                                        'onsubmit'=>"return confirm('Are you sure you want to Delete This Post?');"])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete Post',['class'=>'btn btn-outline-danger'])}}
                                        {!!Form::close()!!}
                                </div>
                        </div>
                    </div>
                    @else
                    @endif
                @endauth
            </div>
                @auth
                    <div class="col-md-11 card text-center">
                        @if (Auth::user()->id!=$posts->user_id)
                            <div class="row justify-content-center">
                                <button class="btn btn-danger" onclick="Openform();" style="width: 25%">Flag Post</button>
                            </div>
                            <br>
                            <div id="form1" style = "display:none">
                                <div class="row justify-content-center">
                                    <br>
                                    {!!Form::open(['action'=>['FlagsController@store'], 'method'=>'POST',
                                    'onsubmit'=>"return confirm('Do you really want to submit the form?');"])!!}
                                        <div class="form-group-row ">
                                            <div class="row justify-content-center text-secondary font-weight-bold p-3 h4">
                                                {{Form::label('flag_for','Flag For')}}
                                            </div>
                                            {{Form::select('flag_for',[
                                                'Misleading'=>'Misleading',
                                                'Sexual Content'=>'Sexual Content',
                                                'Violent, Abusive or Hateful Content'=>'Violent, Abusive or Hateful Content',
                                                'Harmful or Dangerous Acts'=>'Harmful or Dangerous Acts',
                                                'Barassment or Bullying'=>'Harassment or Bullying'
                                                ], 'Misleading',['class'=>'form-control'])}}
                                        </div>
                                        <div class="form-group-row">
                                            <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                                            {{Form::label('extra','Please provide more infromation for your complaint.')}}
                                            </div>
                                            {{Form::textarea('extra','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
                                        </div>
                                        <div class="row justify-content-center text-secondary font-weight-bold p-3 h4">
                                            {{Form::hidden('post_title',$posts->title)}}
                                            {{Form::hidden('user_id',Auth::user()->id)}}
                                            {{Form::hidden('post_id',$posts->id)}}
                                            <br>
                                            {{Form::submit('Submit',['class'=>'btn btn-outline-success mb-5', 'style'=>'width: 30%;'])}}
                                        </div>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-center">
                            <button class="btn btn-success" onclick="Openform1();" style="width: 25%">Add Event</button>
                            <br>
                            </div>
                            <div id="form2" style = "display:none">
                                <div class="row justify-content-center">
                                    <br>
                                    {!!Form::open(['action'=>['EventsController@store'], 'method'=>'POST',
                                    'onsubmit'=>"return confirm('Confirm Event Creation?');"])!!}
                                        <div class="form-group-row">
                                            <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                                            {{Form::label('event_title','Event Location:')}}
                                            </div>
                                            {{Form::text('event_title','',['class'=>'form-control','placeholder'=>'Title'])}}
                                        </div>
                                        <div class="form-group-row" >
                                            <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                                            {{Form::label('deadline','Event Date:')}}
                                            </div>
                                            {{ Form::date('deadline', new \DateTime(), ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group-row">
                                            <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                                            {{Form::label('location','Event Location:')}}
                                            </div>
                                            {{Form::text('location','',['class'=>'form-control','placeholder'=>'Location'])}}
                                        </div>
                                        <div class="form-group-row">
                                            <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                                            {{Form::label('about','About The Event')}}
                                            </div>
                                            {{Form::textarea('about','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
                                        </div>
                                        <div class="row justify-content-center text-secondary font-weight-bold p-3 h4">
                                            {{Form::hidden('user_id',Auth::user()->id)}}
                                            {{Form::hidden('post_id',$posts->id)}}
                                            <br>
                                            {{Form::submit('Submit',['class'=>'btn btn-outline-success mb-5', 'style'=>'width: 30%;'])}}
                                        </div>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        @endif
                </div>
            @endauth
        </div>
<br><br><br>
<br><br>
        <div class="row justify-content-center">
            <div class="col-md-11 card m-3">
                <div class="row justify-content-center">
                    <div class="p-4">
                        
                        <h2 class="font-weight-bold">
                            Comments
                        </h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-11 card m-3">
                        <div class="row justify-content-center">
                            <div class="p-4">
                                <h2 class="font-weight-bold">
                                    Post a Comment
                                </h2>
                            </div>
                        </div>

                        <div class="form-group">
                            @auth
                            {!! Form::open(['action'=>['CommentsController@store'],'method'=>'POST','onsubmit'=>"return confirm('Confirm Comment Creation?');"]) !!}
                            <div class="form-group-row ">
                                <div class="row justify-content-center">
                                    {{Form::textarea('body','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
                                </div>
                            </div>

                            {{Form::hidden('user_id',Auth::user()->id)}}
                            {{Form::hidden('posts_id',$posts->id)}}

                            <div class="row justify-content-center p-3">
                                {{Form::submit('Submit Comment',['class'=>'btn btn-outline-success', 'style'=>'width: 20%'])}}
                            </div>

                            {!!Form::close()!!}
                            @endauth
                        </div> 
                    </div>
                </div><br><br>

                @if (count($comments)>0)
                    @foreach ($comments as $item)
                    <br>
                        <div class="row justify-content-start m-2">
                            <div class="card" style="width: 100%">
                                <div class="card-body">
                                    <?php echo $item->comment; ?>
                                    <br>
                                </div>

                                <div class="card-footer text-muted text-right p-3">
                                    <p>
                                        <span>By: <a href="/users/{{$item->user->id}}">{{$item->user->username}}</a></span>
                                    </p>
                                    <p>
                                        <span class="font-italic">Created: </span>{{$item->created_at->diffForHumans()}}
                                    </p>

                                    <div class="float-right">
                                        @auth
                                            @if (Auth::user()->id==$item->user_id)
                                                    {!!Form::open(['action'=>['CommentsController@destroy',$item->id],'method'=>'POST','class'=>'pull-right',
                                                    'onsubmit'=>"return confirm('Confirm Comment Deletion?');"])!!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        {{Form::submit('Delete Comment',['class'=>'btn btn-outline-danger'])}}
                                                    {!!Form::close()!!}
                                            @else
                                                
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="text-center">
                        There are no comments
                    </h4>
                @endif
            </div>
        </div>
        <br>
    </div>
    <script>
        function Openform()
        {
            var x = document.getElementById("form1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function Openform1(){
            var x = document.getElementById("form2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        $('#datetimepicker').datetimepicker({
            format: 'yyyy-mm-ddTHH:mm:ss.sssZ'
        });
    </script>
@endsection