@extends('layouts.app')






<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        

        
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<!-- Styles -->
<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">



<link href="css/bootstrap-icons.css" rel="stylesheet">
<link href="css/templatemo-leadership-event.css" rel="stylesheet">
<link rel="stylesheet" href="css/home.css">


        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: lightskyblue;
            }
           
          
        </style>
       
        
    </head>
    <body class="antialiased">
       

        <nav class="navbar navbar-expand-lg" id="nav">
            <button id="upload"><b>UPLOAD FILES</b></button>
    
            <div id="files">
                <span id="hide">X</span>
                <li id="cli1"><a href="{{ route('upload') }}">CgitHALLENGE</a></li>
                <li id="cli2"><a href="{{ route('upload.schools') }}">REGISTERED SCHOOLS</a></li>
            </div>
            <form action="form" method="POST" id="challenge">
            <span id="hideform1"><small>x</small></span>
    @csrf
    <input type="file" name="file" required >
    
    <div  id="challengeUload" > <button type="submit" >UPLOAD</button></div>
</form>
<form action="{{ route('upload.schools') }}" method="POST" id="schools">
<span id="hideform2"><small>x</small></span>
    @csrf
    <input type="file" name="schoolfile" required >
    <button type="submit" title="BE SURE TO UPLOAD ONLY VERIFIED SCHOOLS">UPLOAD</button>
</form>
           


<div class="container" >

                

<a href="#" class="navbar-brand mx-auto mx-lg-0">
    <i class="bi-bullseye brand-logo"></i>
    <span class="brand-text">Mathmaster <br> system</span>
</a>



<div class="collapse navbar-collapse" id="navbarNav">

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header"></div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

   
</div>
</div>
</div>
</div>
</div>









                    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"></a>
                    @else
                         
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        <span>for</span>
                        <span style = "color:red";>admin only</span>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
                        
            </div>
        </nav>

        <main>

            <section class="hero" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12 m-auto">
                            <div class="hero-text">

                                <h1 class="text-white mb-4"><u class="text-info">HERE YOU CAN</u>  PERFORM ALL THE NECESSARY TASKS</h1>

                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="date-text">July 2 to 29, 2024</span>

                                    <span class="location-text">Times Square, KAMPALA</span>
                                </div>

                                <a href="#section_2" class="custom-link bi-arrow-down arrow-icon"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="videos/pexels-pavel-danilyuk-8716790.mp4" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>
            </section>


            <section class="highlight">
                <div class="container">
                    <div class="row">

                   
                       

                    </div>
                </div>
            </section>


            <section class="about section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h2 class="mb-4">CURRENT <u class="text-info" style="color:rgb(5, 154, 247);">REPORT AND ANALYTICS FOR COMPLETE CHALLENGES</u></h2>
                        </div>

                        <div class="col-lg-6 col-12">
                            <h3 class="mb-3">General over view of performance</h3>

                            <p style="margin-top:-40px;">all challenfges have been well done with great improvements from most participants , a number of d1......egrtrudhcbchghdcc dfhdjhkjknjkdvn bdvkhkh vkdvjknjkvduhdvk   dvuv  jbiouvdk ovb ovovjoi iorkvoujefbjkvhiofury uhvbvduihofvh hoevhjkbkdvjbih huodvbkbkjvdajhioh qevolejhbjdhierkbdvk vuhvbsvdv n diefhefiy h bhuhruhrqhqwjifuhquijbeuiyeueuru e n uueb    bue hkv bhefhuh nytub d  hfeyrfyef  yigwefdgj</p>
                            
                        
                        </div>
                    
           
                        <button id="reports"><b>MORE INCITE</b></button>
          

             </section>
    
             
    
    @endsection









   

