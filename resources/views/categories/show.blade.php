@extends('layouts.app')
@section('content')
<style>
    #postTitle{
        color: goldenrod;
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
            <h2 class="p-4">{{$catinfo->category_name}} Category</h2>
        </div>
        <hr class="light">

        <div class="row justify-content-center">
            {{-- If posts exist --}}
            @if (count($cat)>0)
                @foreach ($cat as $item)
                <br>
                    <div class="card rounded m-2" style="width: 100%;">
                        <div class="card-header">
                            @if ($item->post_image)
                                <span class="p-4"><img src="{{ asset('/storage/cover_images/'.$item->post_image) }}" alt="Not Here" style="width: 10%"></span>
                                <a id="postTitle" href="/posts/{{$item->id}}">
                                    <span class="card-title p-4 font-weight-bold" id="postTitle">{{$item->title}}</span>
                                </a>
                            @else
                            <a id="postTitle" href="/posts/{{$item->id}}">
                                <span class="card-title p-4 font-weight-bold" id="postTitle">{{$item->title}}</span>
                            </a>
                            @endif                            
                        </div>
                        <div class="card-body">
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
                <h2 class="mb-5">There are no posts in this category</h2>
            @endif
        </div>
    </div>
@endsection