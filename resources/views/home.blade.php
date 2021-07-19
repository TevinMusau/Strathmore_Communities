@extends('layouts.app')

@section('content')

<head>
    <style>
        #container{
            border: 1px solid brown
        }
        #row1{
            border: 1px solid pink
        }
        #Col1{
            border: 1px solid black;
        }
        #hand_up{
            color: blue;
            text-align: center;
            width: 100%;
        }
        #hand_up_upvotes{
            display: block;
            text-align: center;
        }
        #hand_down{
            color: red;
            text-align: center;
            width: 100%;
        }
        #hand_up_downvotes{
            display: block;
            text-align: center;
        }
        #Col2{
            border: 1px solid black;
        }
        #row2{
            margin: 1em;
            max-width: 100%;
            border: 1px solid violet;
        }
        #categoryBox{
            margin: .2em;
            border: 1px purple solid;
            display: block;
            padding: 10px;
            max-height: 100%;
            max-width: 100%;
        }
        #categoryText{
            border: 1px solid orange;
            word-wrap: break-word;
            margin:10px;
        }
        #postTitleBox{
            word-wrap: break-word;
            margin: .2em;
            border: 1px indigo solid;
            display: block;
            padding: 10px;
            max-height: 100%;
            max-width: 100%;
        }
        #postTitleText{
            border: 1px solid maroon;
        }
        #postImage{
            margin: 1em;
            border: 1px blue solid;
            max-height: 100%;
        }
        #postDesc{
            margin: 1em;
            word-wrap: break-word;
            border: 1px green solid;
            max-height: 100%;
        }
        #commentBox{
            word-wrap: break-word;
            margin: 1em; 
            border: 1px yellow solid; 
            max-height: 100%;
        }
        #commentTitle{
            word-wrap: break-word;
        }
        #comment1{
            display:inline-block;
            margin-left: 1em;
        }
        #comment2{
            display:inline-block;
            margin-left: 1em;
        }
        #comment2.1{
            display:inline-block;
            margin-left: 2em;
        }
        #comment2.2{
            display:inline-block;
            margin-left: 2em;
        }
        #comment2.2.1{
            display:inline-block
            ;margin-left: 3em;
        }
    </style>
</head>

<div class="container" id="container">
    <div class="row" id="row1">
        <div class="col-lg-3 col-md-3 col-sm-3 my-auto" id="Col1">
            <i class="far fa-hand-point-up fa-5x" id="hand_up"></i>
            <span class="caption" id="hand_up_upvotes">
                Upvotes
            </span>

            <i class="far fa-hand-point-down fa-5x" id="hand_down"></i>
            <span class="caption">
                Downvotes
            </span>
        </div>

        <div class="col-9 order-5" id="Col2">
            <div class="row" id="row2">
                <div class="justify-content-start" id="categoryBox">
                    <p class="p-2" id="categoryText">
                        su/Career and Internship Opportunities
                    </p>            
                </div>

                <div class="justify-content-center" id="postTitleBox">
                    <p class="p-2" id="postTitleText">
                        An internship vacancy at IMF BANK
                    </p>
                </div>
            </div>

            <div class="row justify-content-center" id="postImage">
                <img src="/images/strath_logo.png">
            </div>

            <div class="row justify-content-center" id="postDesc">
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod tenetur rem sequi eius! Soluta commodi voluptates rerum doloremque voluptatum atque quod distinctio autem ex? Cumque ea quas placeat tempora libero. 
                </p>
            </div>
            <div class="row justify-content-center" id="commentBox">
                <p id="commentTitle">
                    Comments
                </p>

                <p id="comment1">
                    Comment 1(Username):Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat illum impedit officiis accusantium quam perspiciatis eius commodi expedita ad iure dolores, vero labore cupiditate quae temporibus omnis consequatur. Facilis, maiores!
                </p>

                <p id="comment2">
                    Comment 2(Username):Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat illum impedit officiis accusantium quam perspiciatis eius commodi expedita ad iure dolores, vero labore cupiditate quae temporibus omnis consequatur. Facilis, maiores!
                </p>

                <p id="comment2.1">
                    Comment 2.1(Username):Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat illum impedit officiis accusantium quam perspiciatis eius commodi expedita ad iure dolores, vero labore cupiditate quae temporibus omnis consequatur. Facilis, maiores!
                </p>

                <p id="comment2.2">
                    Comment 2.2(Username):Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat illum impedit officiis accusantium quam perspiciatis eius commodi expedita ad iure dolores, vero labore cupiditate quae temporibus omnis consequatur. Facilis, maiores!
                </p>

                <p id="comment2.2.1">
                    Comment 2.2.1(Username):Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat illum impedit officiis accusantium quam perspiciatis eius commodi expedita ad iure dolores, vero labore cupiditate quae temporibus omnis consequatur. Facilis, maiores!
                </p>
            </div>
        </div>
    </div>
</div>
@endsection