@extends('layouts.app')
@section('content')
<style>
    a{
        color: goldenrod;
        text-decoration: none;
    }
    a:hover{
        color: salmon;
        text-decoration: none;
    }
</style>

@include('inc.messages')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1 class="p-3">Communities</h1>
        </div>
        <hr class="light">

        @foreach ($cat as $item)
            <div class="row">
                <div class="col-md-4 order-1 mx-5 text-center p-3">
                    <a href="/categories/{{$item->id}}">
                        <h4 class="font-weight-bold">{{$item->category_name}}</h4>
                    </a>
                </div>
                
                <div class="col-md-6 order-2 mx-3 text-center p-3">
                    <h5 class="text-center">About This Community</h5>
                    <p class="text-center">{{$item->about}}</p>
                </div> 
            </div>
            <br>
        @endforeach
        
    </div>
@endsection