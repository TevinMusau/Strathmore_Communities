@extends('layouts.app')
@section('content')
@include('inc.messages')
<style>
    #postTitle{
        color: #A0522D;
        font-size: 1.5rem;
        text-decoration: none;
    }
    #postTitle:hover{
        color: brown;
        text-decoration: none;
    }
    #postTitle:active{
        
    }
</style>

    <div class="container">
        <div class="row justify-content-center">
            <h2 class="p-4 font-weight-bold">{{$catinfo->category_name}} Category</h2>
        </div>
        <div class="row justify-content-center">
            <h3 class="p-4 font-weight-bold">{{$catinfo->about}}</h3>
        </div>
        <div>
            @auth
            <div class="text-center" style="font-size: 1.1rem">
                {!!Form::open(['action'=>['CategoryUserController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                    {{Form::hidden('user_id',Auth::user()->id)}}
                    {{Form::hidden('category_id',$catinfo->id)}}
                    {{Form::submit('Join Community',['class'=>'font-weight-bold btn btn-outline-success', 'style'=>'box-shadow: 2px 2px 2px #2E8B57; width: 15%'])}}
                {!!Form::close()!!}
            </div>    
            @endauth
            <div class="text-center p-3 font-weight-bold" style="font-size: 1.1rem; color: #DAA520;">{{$catinfo->users->count()}} {{Str::plural('Member',$catinfo->users->count())}}</div>
            
            
        </div>
        <hr class="my-2">

        <div class="row justify-content-center">
            {{-- If posts exist --}}
            @if (count($cat)>0)
                @foreach ($cat as $item)
                <br>
                    <div class="card rounded m-2" style="width: 100%;">
                        <div class="card-header">
                            @if ($item->post_image)
                                <span class="p-4"><img src="{{ asset('/storage/cover_images/'.$item->post_image) }}" alt="Post Image" style="width: 10%"></span>
                                <a id="postTitle" href="/posts/{{$item->id}}">
                                    <span class="card-title p-4 font-weight-bold" id="postTitle">{{$item->title}}</span>
                                </a>
                            @else
                            <a id="postTitle" href="/posts/{{$item->id}}">
                                <span class="card-title p-4 font-weight-bold" id="postTitle">{{$item->title}}</span>
                            </a>
                            @endif                            
                        </div>
                        <div class="card-body" style="font-size: 1.1rem">
                            <?php echo $item->body?>
                        </div>
                        <div class="card-footer text-muted text-right">                           
                            <span class="font-italic">Created on: </span>
                            <span>{{$item->created_at}}</span>

                            
                            {{-- <div style="float: right">
                                <span>{{$item->likes->count()}} {{Str::plural('likes',$item->likes->count())}}</span>
                            </div> --}}
                        </div>
                    </div>
                    <br>
                @endforeach
            @else
                <h2 class="m-4 p-4 font-weight-bold" style="font-size: 1.3rem">There are no posts in this category</h2>
            @endif
        </div>
    </div>
@endsection