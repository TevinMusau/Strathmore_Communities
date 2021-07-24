@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center"><h2>{{$catinfo->category_name}}</h2></div>
        <div class="row justify-content-center">
            @if (count($cat)>0)
                @foreach ($cat as $item)
                <br>
                    <div class="card" style="width: 100%">
                        <div class="card-header">
                                <a href="/posts/{{$item->id}}" class="btn btn-link">
                                     <h5 class="card-title">{{$item->title}}</h5>
                                </a>
                        </div>
                        <div class="card-body">
                            <?php echo $item->body?>
                           
                        </div>
                        <div class="card-footer text-muted">
                            <span>{{$item->created_at}}</span>
                            <div style="float: right">
                                {{-- <span>{{$item->likes->count()}} {{Str::plural('likes',$item->likes->count())}}</span> --}}
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            @else
                <h2>There are no posts</h2>
            @endif
        </div>
    </div>
@endsection