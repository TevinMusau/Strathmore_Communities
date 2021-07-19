@extends('layouts.app')

@section('content')

<head>
    <style>
        #titleBox1{
            border: 1px solid brown;
            margin: 1rem;
        }
        #relatedLink1Box{
            border: 1px solid blue;
            margin: 1rem;
        }
        #relatedImageBox1{
            border: 1px solid yellow;
            display: block; 
            text-align: center; 
            max-width: 55%; 
            margin: 1em;
        }
        #relatedImage1{
            width: 100%; 
            height: 100%;
        }
        #relatedText1{
            display: block; 
            text-align: center;
            border: 1px solid red; 
            margin: 1em;
        }

        #titleBox2{
            border: 1px solid brown;
            margin: 1rem;
        }
        #relatedLink2Box{
            border: 1px solid blue;
            margin: 1rem;
        }
        #relatedImageBox2{
            border: 1px solid yellow; 
            display: block; 
            text-align: center; 
            margin: 1em;
        }
        #relatedImage2{
            width: 100%; 
            height: 100%;
        }
        #relatedText2{
            display: block; 
            text-align: center;
            border: 1px solid red; 
            max-width: 55%; 
            margin: 1em;
        }
        
        #titleBox3{
            border: 1px solid brown;
            margin: 1rem;
        }
        #relatedLinkBox3{
            border: 1px solid blue; 
            margin: 1rem;
        }
        #relatedImageBox3{
            border: 1px solid yellow; 
            display: block; 
            text-align: center; 
            margin: 1em;
        }
        #relatedImage3{
            width: 100%; 
            height: 100%;
        }
        #relatedText3{
            display: block; 
            text-align: center;
            border: 1px solid red; 
            margin: 1em;
        }
    </style>
</head>

<div class="container-fluid">

    <div class="row justify-content-center">
        <h3> Related Links </h3>
    </div>

    <div class="justify-content-start" id="titleBox1">
        <div>
            <p>1. Strathmore Univeristy Website</p>
        </div>
    </div>

    <div class="row justify-content-start" id="relatedLink1Box">
        <div class="col order-1" id="relatedImageBox1">
            <img class="img-fluid" id="relatedImage1" src="/images/su_main.png">
        </div>

        <div class="col order-2" id="relatedText1">
            <p> 
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos tempore unde qui asperiores, omnis at nesciunt placeat, provident laborum suscipit, totam ratione ullam. Perferendis voluptatem eos sequi optio, laboriosam ex?
            </p>
        </div>
    </div>

    <div class="row justify-content-end" id="titleBox2">
        <div>
            <p>
              2. Strathmore Univeristy E-learning
            </p>
        </div>
    </div>

    <div class="row justify-content-start" id="relatedLink2Box">
        <div class="col order-2" id="relatedImageBox2">
            <img class="img-fluid"src="/images/su_elearning.png" id="relatedImage2">
        </div>
        <div class="col order-1" id="relatedText2">
            <p> 
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos tempore unde qui asperiores, omnis at nesciunt placeat, provident laborum suscipit, totam ratione ullam. Perferendis voluptatem eos sequi optio, laboriosam ex?
            </p>
        </div>
    </div>

    <div class="row justify-content-start" id="titleBox3">
        <div>
            <p>
              3. Strathmore Univeristy AMS
            </p>
        </div>
    </div>

    <div class="row justify-content-start" id="relatedLinkBox3">
        <div class="col order-1" id="relatedImageBox3">
            <img class="img-fluid" src="/images/su_ams.png" id="relatedImage3">
        </div>
        <div class="col order-2" id="relatedText3">
            <p> 
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos tempore unde qui asperiores, omnis at nesciunt placeat, provident laborum suscipit, totam ratione ullam. Perferendis voluptatem eos sequi optio, laboriosam ex?
            </p>
        </div>
    </div>
</div>
    
@endsection