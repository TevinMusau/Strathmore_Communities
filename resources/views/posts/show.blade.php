@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                
            </div>
            <div class="col-8">
                <h1 class="display 2">
               {{$posts->title}} 
            </h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <img src="/storage/cover_images/{{$posts->post_image}}" class="img-fluid" alt="Responsive image">
            </div>
        <div class="row">
            <br>
            <h6>By <a href="/users/{{$posts->user_id}}">{{$uname}}</a></h6>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <?php echo $posts->body?>
            </div>
        </div>
        <div class="card-footer text-muted">
            <span>{{$posts->created_at->diffForHumans()}}</span>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                @auth
                    {!!Form::open(['action'=>['LikesController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                        {{Form::hidden('user_id',Auth::user()->id)}}
                        {{Form::hidden('posts_id',$posts->id)}}
                        {{Form::submit('Like',['class'=>'btn btn-link'])}}
                    {!!Form::close()!!}
                @endauth
            </div>
            
                @auth
                @if (Auth::user()->id==$posts->user_id)
                <div class="col">
                    <a href="/posts/{{$posts->id}}/edit" class="btn btn-outline-primary">Edit</a>
                </div>
                <div class="col">
                        {!!Form::open(['action'=>['PostsController@destroy',$posts->id],'method'=>'POST','class'=>'pull-right',
                        'onsubmit'=>"return confirm('Do you really want to submit the form?');"])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}
                </div>
                @else
                    
                @endif
            @endauth
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col"><span>{{$posts->likes->count()}} {{Str::plural('like',$posts->likes->count())}}</span></div>
        </div>
        <br>
        <br>
        <div class="row justify-content-center">
            <h3 class="display 3">Comments</h3>
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
            <div class="row justify-content-center">
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
            {!!Form::close()!!}
            @endauth
        </div>
        <br>
        @if (count($comments)>0)
            @foreach ($comments as $item)
            <br>
                <div class="row justify_content_start">
                    <div class="card" style="width: 100%">
                        <div class="card-body">
                            <?php echo $item->comment; ?>
                            <br>
                            
                        </div>
                        <div class="card-footer text-muted">
                            {{$item->created_at->diffForHumans()}}
                            <div class="float-right">
                                @auth
                                    @if (Auth::user()->id==$item->user_id)
                                            {!!Form::open(['action'=>['CommentsController@destroy',$item->id],'method'=>'POST','class'=>'pull-right',
                                            'onsubmit'=>"return confirm('Do you really want to submit the form?');"])!!}
                                                {{Form::hidden('_method','DELETE')}}
                                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
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
            <h4>There are no comments</h4>
        @endif
    </div>
@endsection