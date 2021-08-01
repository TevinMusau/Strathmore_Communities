@extends('layouts.app')
@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-11 card text-center m-3">
                <div class="row justify-content-center">
                    <div class="p-4">
                        <h1 class="font-weight-bold">
                            {{$posts->title}} 
                        </h1>
                    </div>
                </div>

                <div class="row justify-content-center p-1">
                    <div class="col-5 text-center">
                        <h5 class="">By <a href="/users/{{$posts->user_id}}">{{$uname}}</a></h5>
                    </div>
                </div>

                @if ($posts->post_image)
                <div class="row justify-content-center p-3">
                    <img src="/storage/cover_images/{{$posts->post_image}}" class="img-fluid" alt="Responsive image" style="width: 30%">
                </div>
                @else
                    
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-9" >
                        <p class="text-justify p-3"><?php echo $posts->body?></p>
                    </div>
                </div>

                <div class="col-md-4 text-center m-4">
                    @auth
                        {!!Form::open(['action'=>['LikesController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                            {{Form::hidden('user_id',Auth::user()->id)}}
                            {{Form::hidden('posts_id',$posts->id)}}
                            {{Form::submit('Upvote',['class'=>'btn btn-outline-success'])}}
                        {!!Form::close()!!}
                        {!!Form::open(['action'=>['LikesController@destroy',$posts->id],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Downvote',['class'=>'btn btn-outline-danger'])}}
                        {!!Form::close()!!}
                    @endauth
                        <span class="p-2">
                            {{$posts->likes->count()}} {{Str::plural('Upvote',$posts->likes->count())}}
                        </span>
                </div>
                
                <div class="card-footer text-muted text-right">
                    <span class="p-2" style="border-right: 1px solid black">
                        By <a href="/users/{{$posts->user_id}}">{{$posts->user->username}}</a>
                    </span>

                    <span class="p-2">
                        {{$posts->created_at->diffForHumans()}}
                    </span>   

                    <div class="row" style="float: left">            
                        @auth
                            @if (Auth::user()->id==$posts->user_id)
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
                            @else
                                
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
<br><br><br>
<br><br><br>
<br><br><br>
        <div class="row justify-content-center">
            <div class="col-md-11 card m-3">
                <div class="row justify-content-center">
                    <div class="p-4">
                        @include('inc.messages')
                        <h2 class="font-weight-bold">
                            Comments
                        </h2>
                    </div>
                </div>

                @if (count($comments)>0)
                    @foreach ($comments as $item)
                    <br>
                        <div class="row justify-content-start m-2">
                            <div class="card" style="width: 100%">
                                <div class="card-body m-2">
                                    <?php echo $item->comment; ?>
                                    <br>
                                </div>

                                <div class="card-footer text-muted text-right p-3">
                                    <p>
                                        <span class="font-italic">Created: </span>{{$item->created_at->diffForHumans()}}
                                    </p>

                                    <div class="float-right">
                                        @auth
                                            @if (Auth::user()->id==$item->user_id)
                                                    {!!Form::open(['action'=>['CommentsController@destroy',$item->id],'method'=>'POST','class'=>'pull-right',
                                                    'onsubmit'=>"return confirm('Do you really want to submit the form?');"])!!}
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
                    {!! Form::open(['action'=>['CommentsController@store'],'method'=>'POST','onsubmit'=>"return confirm('Do you really want to submit the form?');"]) !!}
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
        </div>
    </div>
@endsection