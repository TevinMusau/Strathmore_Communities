@extends('layouts.app')
@section('content')
@include('inc.messages')
<style>
    #tabBTN{
        background-color: #FFF8DC;
        border: none;
        color: black;
    }
    #tabBTN:hover{
        color: gray;
        border-top: 2px solid salmon;
    }
    #tabBTN:active{
        color: green;
    }
</style>

<script>
    function openCity(evt, cityName) 
    {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) 
        {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) 
        {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

    <div class="container-fluid">
        @auth
                @if (Auth::user()->id==$user->id)
                    <h1 class="text-center p-4">
                        Welcome {{$user->username}}
                    </h1>

                @else
                    <h1 class="text-center p-4">
                        Welcome to {{$user->username}}'s profile
                    </h1>

                @endif
        @endauth

        <div class="row justify-content-center">
            <div class="col-md-12">
                @auth
                    @if (Auth::user()->id==$user->id)
                        <h4 class="display 3 text-center">
                            About Me
                        </h4>
                        <hr class="light">

                        {{-- @include('inc.messages') --}}

                    @else
                        <h4 class="display 3 text-center">
                            About {{$user->username}}
                        </h4>
                        <hr class="light">

                        {{-- @include('inc.messages') --}}
                        
                    @endif
                @endauth
            </div>
        </div>

            <div class="row">
                <div class="col-md-5 text-center order-1">
                    @if ($user->user_image == null)
                        <img src="/storage/users/default.png" style="width: 60%; border-radius: 5%">
                    @else
                        <img  src="/storage/cover_images/{{$user->user_image}}" alt="Image Not Found" style="width: 60%; border-radius: 5%">
                    @endif
                </div>
                <br>

                <div class="col order-2">
                    <div>
                        <span>
                            <div class="text-right p-3" style="float: left">
                                <span>UserName:</span>
                                <br>
                                <span>Name:</span>
                                <br>
                                <span>Email:</span>
                                <br>
                                <span>Admission Number:</span>
                                <br>
                                <span>Joined on:</span>
                                <br>
                            </div> 

                            <div class="text-left p-3">
                                <span>{{$user->username}}</span>
                                <br>
                                <span>@if ($user->name==null)
                                    Null
                                @else
                                    {{$user->name}}
                                @endif</span>
                                <br>
                                <span> {{$user->email}}</span>
                                <br>
                                <span> {{$user->adm_no}}</span>
                                <br>
                                <span>{{$user->created_at->format('Y-m-d')}}</span>
                            </div>
                        </span>                        
                    </div>
                    @if ($user->id == Auth::user()->id)
                    <div>
                        <a href="/users/{{$user->id}}/edit" class="btn btn btn-outline-info" style="width: 40%">Edit</a>
                    </div>
                    @else
                        
                    @endif
                </div> 
            </div>
            <br><br>

            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <!-- Tab links -->
                    @if (Auth::user()->id==$user->id)
                        <div class="tab btn-group d-flex mb-5">
                            <button class="btn font-weight-bold" onclick="openCity(event, 'Posts')" id="tabBTN">
                                My Posts
                            </button>
                            
                            <button class="btn font-weight-bold" onclick="openCity(event, 'Community')" id="tabBTN">
                                My Communities
                            </button>

                            <button class="btn font-weight-bold" onclick="openCity(event, 'ClassF')" id="tabBTN">
                                My Events
                            </button>
                        </div>
                    @else
                        <div class="tab btn-group d-flex mb-5">
                            <button class="btn font-weight-bold" onclick="openCity(event, 'Posts')" id="tabBTN">
                                {{ $user->username }}'s Posts
                            </button>

                            <button class="btn font-weight-bold" onclick="openCity(event, 'Community')" id="tabBTN">
                                {{ $user->username }}'s Communities
                            </button>
                            
                            {{-- <button class="btn font-weight-bold" onclick="openCity(event, 'ClassF')" id="tabBTN">Class Finder</button> --}}
                        </div>
                    @endif
                    
                        <!-- Tab content -->
                        <div id="Posts" class="tabcontent">
                        {{-- <h3>My Posts</h3> --}}
                            @if (count($posts)>0)
                            <div class="row justify-content-center">
                                <a href="/posts/create" class="btn btn-outline-success mb-5" style="width: 20%">
                                    Add Post
                                </a>
                            </div>
                                @foreach ($posts as $item)
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <a href="/posts/{{$item->id}}"><h5 class="card-title">{{$item->title}}</h5></a>
                                        </div>

                                        <div class="card-footer text-muted">
                                            {{$item->created_at->diffForHumans()}}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @if (Auth::user()->id!=$user->id)
                                    <h3>{{$user->username}}'s has not created a post</h3>
                                @else
                                <a href="/posts/create" class="btn btn-outline-success mb-5" style="width: 20%">
                                    Add Post
                                </a>
                                @endif
                            @endif
                        </div>

                        <div id="Community" class="tabcontent">
                            {{-- <h3>My Communities</h3> --}}
                            <h3 class="display 3 mb-5">
                                No Community Joined
                            </h3>
                        </div>

                        <div id="ClassF" class="tabcontent">
                            @if (count($user->events)>0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Event Title:</th>
                                        <th>About:</th>
                                        <th>Location:</th>
                                        <th>Event Date:</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($user->events as $item)
                                    @if ($item->deadline < date('Y-m-d H:i:s'))
                                        
                                    @else
                                        <tr>
                                            <td>{{$item->event_title}}</td>
                                            <td><?php echo $item->about;?></td>
                                            <td>{{$item->location}}</td>
                                            <td>{{$item->deadline}}</td>
                                            <td><a href="/events/{{$item->id}}" class="btn-link">View Event</a></td>
                                        </tr>
                                    @endif
                                    
                                    @endforeach
                                </tbody>
                                </table>
                                @else
                                <div class="row justify-content-center">
                                    <h1>No events</h1>
                                </div>
                                    
                                @endif
                        </div>
                </div>
            </div>
    </div>
@endsection