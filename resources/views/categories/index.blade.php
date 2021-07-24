@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h3 class="display 3">Communities</h3>
        </div>
            @foreach ($cat as $item)
                <div class="row justify-content-start">
                    <div class="col-4">
                        <a href="/categories/{{$item->id}}">
                         <h4>{{$item->category_name}}</h4>
                        </a>
                    </div>
                    <div class="col-8">
                        <div class="row justify-content-start"><h5>About This Community</h5></div>
                        <p>{{$item->about}}</p>
                    </div>
                </div>
                <br>
            @endforeach
    </div>
@endsection