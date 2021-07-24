@extends('layouts.app')
@section('content')
<script>
    function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
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
            <h1>Welcome {{$user->username}}</h1>
            <a href="/posts/create" style="float: right" class="btn btn-primary">Add Post</a>
        @else
            <h1>Welcome to {{$user->username}}'s profile</h1>
        @endif
        @endauth
        <div class="row">
            <div class="col-4">
                @auth
                    @if (Auth::user()->id==$user->id)
                    <h4 class="display 3">About Me</h4 class="display 3">
                    <hr>
                @else
                    <h4 class="display 3">About {{$user->username}}</h4 class="display 3">
                @endif
                @endauth
                
                    <img class="rounded" src="/storage/cover_images/{{$user->user_image}}" alt="Image Not Found" style="width: 25%">
                    <br><span>User Name: {{$user->username}}</span><br>
                    <span>Email: {{$user->email}}</span><br>
                    <span>Admission Number: {{$user->adm_no}}</span><br>
                    <span>Joined at: {{$user->created_at}}</span><br>
                    <a href="/users/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
            </div>
            <div class="col-8">
                <!-- Tab links -->
                    <div class="tab">
                    <button class="btn" onclick="openCity(event, 'Posts')">My Posts</button>
                    <button class="btn" onclick="openCity(event, 'Community')">My Communities</button>
                    <button class="btn" onclick="openCity(event, 'ClassF')">Class Finder</button>
                    </div>

                    <!-- Tab content -->
                    <div id="Posts" class="tabcontent">
                    <h3>My Posts</h3>
                        @if (count($posts)>0)
                            @foreach ($posts as $item)
                                <div class="card text-center">
                                <div class="card-body">
                                    <a href="/posts/{{$item->id}}"><h5 class="card-title">{{$item->title}}</h5></a>
                                </div>
                                <div class="card-footer text-muted">
                                    {{$item->created_at}}
                                </div>
                                </div>
                            @endforeach
                        @else
                            <h3 class="display 3">I Have no posts</h3>
                        @endif
                    </div>

                    <div id="Community" class="tabcontent">
                    <h3>My Communities</h3>
                    <p>I Have Not Joined a Community</p>
                    </div>

                    <div id="ClassF" class="tabcontent">
                        <h3>Class Finder</h3>
                        <p>No classes as of yet</p>
                    </div>
            </div>
        </div>
    </div>
@endsection