<!DOCTYPE html>
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

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="css/home.css">


        <link href="css/templatemo-leadership-event.css" rel="stylesheet">
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            
        </style>
    </head>
    <body class="antialiased">
       

            
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="index.html" class="navbar-brand mx-auto mx-lg-0">
                    <i class="bi-bullseye brand-logo"></i>
                    <span class="brand-text">Mathmaster <br> system</span>
                </a>

               

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('/about') }}">About</a>
                        </li>

                       
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('/contact') }}">Contact</a>
                        </li>
                    </ul>




                    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">back to admin page</a>
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
        @yield('content')
        @include('footer')





        
       

































        <nav class="navbar navbar-expand-lg" id="nav">
            <button id="upload"><b>UPLOAD FILES</b></button>

            <div id="files">
                <span id="hide">X</span>
                <li id="cli1"><a href="#">CHALLENGE</a></li>
                <li id="cli2"><a href="{{ route('upload.schools') }}">REGISTERED SCHOOLS</a></li>
            </div>
              <form action="{{ route('upload.files') }}" method="POST" enctype="multipart/form-data" id="challenge">
            <span id="hideform1"><small>x</small></span>
    @csrf
    <div class="mb-3">
    <label for="questionsFile">Questions File</label>
    <input type="file"  id="questionsFile" name="questionsFile" required>
    </div>
    <div class="mb-3"style="margin-left:-70px">
            <label for="answersFile" >Answers File</label>
            <input type="file" id="answersFile" name="answersFile" required>
        </div>
        <button type="submit" style="margin-left:-70px">Upload</button>
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

