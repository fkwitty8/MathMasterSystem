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
           
          #nav{
            display:none;
          }
        </style>
       
        
    </head>
    <body class="antialiased">
       
<div class="parameter" id="parameterDiv">
    <div class="container" >

                

                <a href="#" class="navbar-brand mx-auto mx-lg-0">
                    <i class="bi-bullseye brand-logo"></i>
                    <span class="brand-text">Mathmaster <br> system</span>
                </a>
          <P>
  PLEASE CLICK THE BUTTON BELOW TO  SET  ALL THE NECESSARY PAREMATERS FOR THE CHALLENGE UPLOADED
                </P>
                <a href="{{ route('create') }}"><button id="parameterButton">SET PARAMETERS</button></a>
</div>
            
        <nav class="navbar navbar-expand-lg" id="nav">
            <button id="upload"><b>UPLOAD FILES</b></button>
           
            <div id="files">
                <span id="hide">X</span>
                <li id="cli1">CHALLENGE</li>
                <li id="cli2">REGISTERED SCHOOLS</li>
            </div>
            <form action="form" method="POST" id="challenge">
            <span id="hideform1"><small>x</small></span>
    @csrf
    <input type="file" name="file" required >
    
    <div  id="challengeUload" > <button type="submit" >UPLOAD</button></div>
</form>
<form action="form" method="POST" id="schools">
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


           
            
          

           

            <script>
          const challengeUpload = document.getElementById("challengeUload");
          const parameterDiv = document.getElementById("parameterDiv"); parameterDiv
          const nav = document.getElementById("nav");




          const uploadbutton = document.getElementById("upload");
          let filediv = document.getElementById("files");
          let click1 =  document.getElementById("cli1");
          let click2 =  document.getElementById("cli2");
          let challengeform =  document.getElementById("challenge");
          let schoolsform =  document.getElementById("schools");
          let hide =  document.getElementById("hide");
          let hideform1 =  document.getElementById("hideform1");
          let hideform2 =  document.getElementById("hideform2");
          
          let reports =  document.getElementById("reports");
          let analysis =  document.getElementById("analysis");
          let schoolreport =  document.getElementById("sreport");
          let pupilreport =    document.getElementById("preport");
          let schoolAnalysis =  document.getElementById("SA");
          let pupilanalysis =    document.getElementById("PA");
          let closeA =  document.getElementById("closeA");
          let closeSR =  document.getElementById("closeSR");
          let closePR =  document.getElementById("closePR")
          

          let schoolranks =  document.getElementById("schoolranking");
          let srankingtable =  document.getElementById("srankingt");
          let Bestps =  document.getElementById("BPS");
          let Bestpstable =  document.getElementById("BPST");
          let closeSRT =  document.getElementById("closeSRT");
          let closeBPST =  document.getElementById("closeBPST");

uploadbutton.onclick=showFilediv;
click1.onclick =showChallengeForm;
click2.onclick = showSchoolsForm;
hide.onclick = showNone;
hideform1.onclick = hideChallengeForm;   
hideform2.onclick = hideSchoolForm;

reports.onclick =  showAnalysis;
schoolAnalysis.onclick = showSchoolreport;
pupilanalysis.onclick = showPupilReport;
closeA.onclick = hideAnalysis;
closeSR.onclick = hideSchoolreport;
closePR.onclick = hidePupilReport;

schoolranks.onclick = showSrankingT;
closeSRT.onclick = hideSrankingT;
Bestps.onclick =showBestpstable;
 closeBPST.onclick =hideBestpstable;

 //challengeUpload.onclick = showParameterDiv;
 ParameterDiv.onclick = showNav; 

challengeUpload.addEventlistner('onclick',showParameterDiv);

function showFilediv(){
    filediv.style.display="block";
}
function showChallengeForm(){
    challengeform.style.display="flex";
  showNone();
}
function showSchoolsForm(){
    schoolsform.style.display="flex";
    showNone();
}

function hideChallengeForm(){
    challengeform.style.display="none"
}
function hideSchoolForm(){
    schoolsform.style.display="none"
}

function showNone(){
    filediv.style.display="none"
    
}
function hideChallengeForm(){
    challengeform.style.display="none"
}







function showAnalysis(){
    analysis.style.display="block"
}
function hideAnalysis(){
    analysis.style.display="none"
}

function showSchoolreport(){
    schoolreport.style.display="block"
    hideAnalysis();
}
function hideSchoolreport(){
    schoolreport.style.display="none"
}


function showPupilReport(){
    pupilreport.style.display="block"
    hideAnalysis();
}
function hidePupilReport(){
    pupilreport.style.display="none"
}

                    function showSrankingT(){
                        srankingtable.style.display="block"
                    }
                    function hideSrankingT(){
                        srankingtable.style.display="none"
                    }
                    function showBestpstable(){
                        Bestpstable.style.display="block"
                    }
                    function hideBestpstable(){
                        Bestpstable.style.display="none"
                    }
                    
                    function showParameterDiv(){
                        ParameterDiv.style.display="flex";
                        nav.style.display="none"
                    }

                    function showNav(){
                        nav.style.display="block"
                    }


        </script>
    
    @endsection









   
