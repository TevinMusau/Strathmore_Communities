@extends('layouts.app')

@section('content')

<head>
    <style>
        #titleBox1{
            /* border: 1px solid brown; */
            margin: 1rem;
        }
        #relatedLink1Box{
            /* border: 1px solid blue; */
            margin: 1rem;
        }
        #relatedImageBox1{
            /* border: 1px solid yellow; */
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
            /* border: 1px solid red;  */
            margin-top: auto;
            margin-bottom: auto;
        }

        #titleBox2{
            /* border: 1px solid brown; */
            margin: 1rem;
        }
        #relatedLink2Box{
            /* border: 1px solid blue; */
            margin: 1rem;
        }
        #relatedImageBox2{
            /* border: 1px solid yellow;  */
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
            /* border: 1px solid red;  */
            max-width: 55%; 
            margin-top: auto;
            margin-bottom: auto;
        }
        
        #titleBox3{
            /* border: 1px solid brown; */
            margin: 1rem;
        }
        #relatedLinkBox3{
            /* border: 1px solid blue;  */
            margin: 1rem;
        }
        #relatedImageBox3{
            /* border: 1px solid yellow;  */
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
            /* border: 1px solid red;  */
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>
</head>

<div class="container-fluid">

    <div class="row justify-content-center m-5">
        <h3> Related Links </h3>
    </div>
    <hr class="light">

    <div class="justify-content-start p-3" id="titleBox1">
        <div>
            <h3>
                <a href="https://strathmore.edu" title="Strathmore University Website" target="_blank">1. Strathmore Univeristy Website</a>
            </h3>
        </div>
    </div>

    <div class="row justify-content-start" id="relatedLink1Box">
        <div class="col order-1" id="relatedImageBox1">
            <a href="https://strathmore.edu" title="Strathmore University Website" target="_blank">
                <img class="img-fluid" id="relatedImage1" style="border: 3px solid black" src="/images/su_main.png">
            </a>
        </div>

        <div class="col order-2" id="relatedText1">
            <p> 
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos tempore unde qui asperiores, omnis at nesciunt placeat, provident laborum suscipit, totam ratione ullam. Perferendis voluptatem eos sequi optio, laboriosam ex?
            </p>
        </div>
    </div>

    <div class="row justify-content-end mt-5 p-3" id="titleBox2">
        <div>
            <h3>
              <a href="https://elearning.strathmore.edu" title="Strathmore University Website" target="_blank">2. Strathmore Univeristy E-learning</a>
            </h3>
        </div>
    </div>

    <div class="row justify-content-start" id="relatedLink2Box">
        <div class="col order-2" id="relatedImageBox2">
            <a href="https://elearning.strathmore.edu" title="Strathmore University E-Learning" target="_blank">
                <img class="img-fluid" style="border: 3px solid black" src="/images/su_elearning.png" id="relatedImage2">
            </a>
        </div>
        <div class="col order-1" id="relatedText2">
            <p> 
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos tempore unde qui asperiores, omnis at nesciunt placeat, provident laborum suscipit, totam ratione ullam. Perferendis voluptatem eos sequi optio, laboriosam ex?
            </p>
        </div>
    </div>

    <div class="row justify-content-start mt-5 p-3" id="titleBox3">
        <div>
            <h3>
              <a href="https://su-sso.strathmore.edu/susams" title="Strathmore University Website" target="_blank">3. Strathmore Univeristy AMS</a>
            </h3>
        </div>
    </div>

    <div class="row justify-content-start" id="relatedLinkBox3">
        <div class="col order-1" id="relatedImageBox3">
            <a href="https://su-sso.strathmore.edu/susams" title="Strathmore University AMS" target="_blank">
                <img class="img-fluid" style="border: 3px solid black" src="/images/su_ams.png" id="relatedImage3">
            </a>
        </div>
        <div class="col order-2" id="relatedText3">
            <p> 
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos tempore unde qui asperiores, omnis at nesciunt placeat, provident laborum suscipit, totam ratione ullam. Perferendis voluptatem eos sequi optio, laboriosam ex?
            </p>
        </div>
    </div>
</div>
    
@endsection