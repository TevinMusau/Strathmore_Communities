@extends('layouts.app')
@section('content')
<style>
    #carouselCaption{
        top: 50%; 
        transform: translateY(-50%); 
        bottom: initial;
    }
</style>
    <!-- Image Slider -->
    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/student1.jpg') }}" alt="" style="width: 100%;">
                <div class="carousel-caption" id="carouselCaption">
                    <h1 class="display-4 text-light bg-secondary">
                        STRATHMORE COMMUNITIES
                    </h1>
                    <h3>
                        Be more, Be Strathmore... and join a Community
                    </h3>
                    <a class="btn btn-outline-light btn-lg" href="{{ route('categories.index') }}">
                        View Communities
                    </a>
                    <a class="btn btn-primary btn-lg" href="{{ route('register') }}">
                        Get Started
                    </a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/student2.jpg') }}" alt="" style="width: 100%;">
                <div class="carousel-caption" id="carouselCaption">
                    <h1 class="display-4 text-light bg-secondary">
                        STRATHMORE COMMUNITIES
                    </h1>
                    <h3>
                        Be more, Be Strathmore... and join a Community
                    </h3>
                    <a class="btn btn-outline-light btn-lg" href="{{ route('categories.index') }}">
                        View Communities
                    </a>
                    <a class="btn btn-primary btn-lg" href="{{ route('register') }}">
                        Get Started
                    </a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/student3.jpg') }}" alt="" style="width: 100%">
                <div class="carousel-caption" id="carouselCaption">
                    <h1 class="display-4 text-light bg-secondary">
                        STRATHMORE COMMUNITIES
                    </h1>
                    <h3>
                        Be more, Be Strathmore... and join a Community
                    </h3>
                    <a class="btn btn-outline-light btn-lg" href="{{ route('categories.index') }}">
                        View Communities
                    </a>
                    <a class="btn btn-primary btn-lg" href="{{ route('register') }}">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Jumbotron -->
    <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-12">
                <p class="lead">
                    <span class="font-weight-bold" style="font-size: 1.5rem">Strathmore Communities:</span>
                     A Web Application Designed to enhance Information Dissemination and reduce Information Overload in Strathmore University
                </p>
            </div>
            <br>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <a href="{{ route('categories.index') }}">
                    <button type="button" class="btn btn-outline-secondary btn-lg">View Communities</button>
                </a>
            </div>
        </div>
    </div>
    <!-- Welcome Section -->
    <div class="container-fluid p-4 m-4">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Welcome to Strathmore Communities</h1>
            </div>
            <hr class="light">

            <div class="col-12">
                <p class="lead">
                    Strathmore Communities is a web application aimed at reducing information overload in the student emails and providing students with the ability to follow through on categories which they find useful to themselves.
                </p>
            </div>
        </div>
    </div>
    <!-- POSTS section -->
    <div class="container-fluid padding">
        <div class="row text-center welcome">
            <div class="col-12">
                <h1 class="display-4">Available Categories</h1>
                <hr class="dark">
            </div>
            <hr>
        </div>
    </div>
    <!-- Cards -->
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-3">
                <div class="card h-100 m-1" style="background-image: url('/images/shattered.png');">
                    <img class="card-img-top mx-auto" src="{{ asset('images/strath_logo.png') }}" style="width: 70%;" >
                    <div class="card-body text-center">
                        <h4 class="card-title">Administration</h4>
                        <p class="card-text">Administration</p>
                        <a href="/categories/1" class="btn btn-outline-info btn-lg">See Community</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 m-1" style="background-image: url('/images/shattered.png');">
                    <img class="card-img-top mx-auto" src="{{ asset('images/su_council.jpg') }}" style="width: 70%">
                    <div class="card-body text-center">
                        <h4 class="card-title">Student Council</h4>
                        <p class="card-text">Student Council</p>
                        <a href="/categories/2" class="btn btn-outline-info btn-lg">See Community</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 m-1" style="background-image: url('/images/shattered.png');">
                    <img class="card-img-top mx-auto" src="{{ asset('images/careers.PNG') }}" style="width: 70%">
                    <div class="card-body text-center">
                        <h4 class="card-title">Career and Internship Opportunities</h4>
                        <p class="card-text">Career and Internship Opportunities</p>
                        <a href="/categories/5" class="btn btn-outline-info btn-lg">See Community</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 m-1" style="background-image: url('/images/shattered.png');">
                    <img class="card-img-top mx-auto" src="{{ asset('images/communications.png') }}" style="width: 70%">
                    <div class="card-body text-center">
                        <h4 class="card-title">Strathmore Communications</h4>
                        <p class="card-text">Strathmore Communications</p>
                        <a href="/categories/3" class="btn btn-outline-info btn-lg">See Community</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection