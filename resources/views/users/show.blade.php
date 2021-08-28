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
                    <h1 class="text-center p-4 font-weight-bold">
                        Welcome {{$user->username}}
                    </h1>

                @else
                    <h1 class="text-center p-4 font-weight-bold">
                        Welcome to {{$user->username}}'s profile
                    </h1>

                @endif
        @endauth

        <div class="row justify-content-center">
            <div class="col-md-12">
                @auth
                    @if (Auth::user()->id==$user->id)
                        <h4 class="display 3 text-center font-weight-bold">
                            About Me
                        </h4>
                        <hr class="light">

                        {{-- @include('inc.messages') --}}

                    @else
                        <h4 class="display 3 text-center font-weight-bold">
                            About {{$user->username}}
                        </h4>
                        <hr class="light">

                        {{-- @include('inc.messages') --}}
                        
                    @endif
                @endauth
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-12 col-lg-5 col-xs-12 order-1 text-center mx-auto my-auto" style="border-right: 1px solid">
                <div class="row justify-content-center">
                    <div class="col-md-5 text-center p-4">
                        @if ($user->user_image == null)
                            <img class="text-center rounded-circle img-fluid" src="/storage/users/default.png" style="width: 100%; border-radius: 50%; clip-path: circle()">
                        @else
                            <img class="text-center rounded-circle img-fluid" src="/storage/cover_images/{{$user->user_image}}" alt="Image Not Found" style="width: 100%; border-radius: 50%; clip-path: circle()">
                        @endif
                    </div>
                    <br>
                </div>

                <input type="button" id="myDetails" class="btn btn-outline-secondary font-weight-bold text-center m-4" value="Click to View Personal Details" onclick="openDetails(); changeText();"/>                
                    <div class="p-1" id="details" style = "display:none; width: 100%">
                        <div class="text-right" style="float:left">
                            <span class="p-2">Username:</span> <br>
                            <br />
                            <span class="p-2">Name:</span><br>
                            <br />
                            <span class="p-2">Email:</span><br>
                            <br />
                            <span class="p-2">Admission Number:</span><br>
                            <br />
                            <span class="p-2">Joined on:</span><br>
                            
                        </div>
                        <div class="text-left" style="float: none">
                            <span class="p-2">{{$user->username}}</span><br>
                            <br />
                            <span class="p-2">
                                @if ($user->name==null)
                                Null
                                @else
                                    {{$user->name}}
                                @endif
                            </span><br>
                            <br />                
                            <span class="p-2"> {{$user->email}}</span><br>                            
                            <br />
                            <span class="p-2"> {{$user->adm_no}}</span><br>                            
                            <br />
                            <span class="p-2">{{$user->created_at->format('Y-m-d')}}</span>
                        </div>                            
                        @if ($user->id == Auth::user()->id)
                            <a href="/users/{{$user->id}}/edit" class="text-center font-weight-bold btn btn-outline-info mt-4" style="width: 40%;">Edit Personal Details</a>
                        @else
                        @endif
                    </div>                
                    <br>
                    
                @if (Auth::user()->id==$user->id)
                    <div class="container">
                        <div class="row justify-content-center">
                            @if (Auth::user()->disabled==1)
                                <div class="alert alert-danger">
                                    This Account has been suspened.
                                    <br>
                                    Suspended Accounts are unable to:
                                    <ul>
                                        <li>Interact With Events</li>
                                        <li>Interact With Communities</li>
                                        <li>Interact With Posts</li>
                                    </ul>
                                    Please Contact an Administrator for more guidance.
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    
                @endif
            </div>
        
            <div class="col-md-5 col-sm-12 col-lg-7 col-xs-12 order-2">
                <br>
                <div class="row justify-content-center">
                    <div class="text-center">
                        <!-- Tab links -->
                        @if (Auth::user()->id==$user->id)
                            <div class="row justify-content-center">
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
                            <div class="row justify-content-center">
                                <button class="btn font-weight-bold" onclick="openCity(event, 'Posts')" id="tabBTN">
                                    {{ $user->username }}'s Posts
                                </button>

                                <button class="btn font-weight-bold" onclick="openCity(event, 'Community')" id="tabBTN">
                                    {{ $user->username }}'s Communities
                                </button>
                                
                                {{-- <button class="tablinks" onclick="openCity(event, 'ClassF')" id="tabBTN">Class Finder</button> --}}
                            </div>
                        @endif
                        
                            <!-- Tab content -->
                            <div id="Posts" class="tabcontent" style="display: none">
                            {{-- <h3>My Posts</h3> --}}
                            <br>
                                @if (count($posts)>0)
                                @if (Auth::user()->id==$user->id)
                                <div class="row justify-content-center">
                                    <a href="/posts/create" class="font-weight-bold btn btn-outline-success mb-5" style="width: 50%; box-shadow: 2px 2px 2px #2E8B57">
                                        Add Post
                                    </a>
                                </div>
                                @endif
                                    @foreach ($posts as $item)
                                        <div class="card text-center p-2 mb-4">
                                            <div class="card-body">
                                                <a href="/posts/{{$item->id}}"><h5 class="card-title">{{$item->title}}</h5></a>
                                            </div>

                                            <div class="card-footer text-muted">
                                                Created: {{$item->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @if (Auth::user()->id!=$user->id)
                                        <h3 class="p-2">{{$user->username}}'s has not created a post</h3>
                                    @else
                                    <p class="lead p-2 font-weight-bold">No Posts Created</p>
                                    <a href="/posts/create" class="font-weight-bold btn btn-outline-success mb-5" style="width: 50%; box-shadow: 2px 2px 2px #2E8B57">
                                        Add Post
                                    </a>
                                    @endif
                                @endif
                            </div>

                            <div id="Community" class="tabcontent" style="display: none">
                                {{-- <h3>My Communities</h3> --}}
                                <br>
                                @if (count($user->categories)>0)
                                    @foreach ($user->categories as $item)
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <a href="/posts/{{$item->id}}"><h5 class="card-title">{{$item->category_name}}</h5></a>
                                                <p>{{$item->about}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @if (Auth::user()->id==$user->id)
                                    <div class="row justify-content-center">
                                        <p class="lead p-2 font-weight-bold">No Communities Joined</p>
                                        <a href="/categories" class="btn btn-outline-success mb-5 font-weight-bold" style="width: 50%; box-shadow: 2px 2px 2px #2E8B57">
                                            Find A Community
                                        </a>
                                    </div>
                                    @else
                                    <div class="row justify-content-center">
                                        <span class="p-2">{{$user->username}}'s has not Joined a Community</span>
                                    </div>
                                    @endif
                                @endif
                            </div>

                            <div id="ClassF" class="tabcontent m-4" style="display: none">
                                @if (count($user->events) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="p-3">Event Title</th>
                                            <th class="p-3">About</th>
                                            <th class="p-3">Location</th>
                                            <th class="p-3">Event Date</th>
                                            <th class="p-3"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($user->events as $item)
                                        @if ($item->deadline < date('Y-m-d H:i:s'))
                                            
                                        @else
                                            <tr>
                                                <td class="p-3">{{$item->event_title}}</td>
                                                <td class="p-3"><?php echo $item->about;?></td>
                                                <td class="p-3">{{$item->location}}</td>
                                                <td class="p-3">{{$item->deadline}}</td>
                                                <td class="p-3"><a href="/events/{{$item->id}}" class="btn-link">View Event</a></td>
                                            </tr>
                                        @endif
                                        
                                        @endforeach
                                    </tbody>
                                    </table>
                                    @else
                                    <div class="row justify-content-center">
                                        <p class="lead p-2 font-weight-bold">No events</p>
                                    </div>
                                        
                                    @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openDetails()
        {
            var x = document.getElementById("details");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function changeText()
        {
            var elem = document.getElementById("myDetails");
            if (elem.value=="Click to View Personal Details") elem.value = "Click to Close Personal Details";
            else elem.value = "Click to View Personal Details";
        }
    </script>
@endsection