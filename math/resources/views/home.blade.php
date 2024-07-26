@extends('layouts.app')






<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>
        

        
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
                background-color: #e0f7fa;
            }
           
          
        </style>
       
        
    </head>
    <body class="antialiased">
       

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
    <label for="questionsFile" class="form-label">Questions File</label>
    <input type="file" class="form-control" id="questionsFile" name="questionsFile" required>
    
    <div class="mb-3">
            <label for="answersFile" class="form-label">Answers File</label>
            <input type="file" class="form-control" id="answersFile" name="answersFile" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
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
     <div style="position:absolute; top:175% ;left:38.5%;">
             <div id="analysis">
                <span id="closeA">X</span>
                <li id="SA">SCHOOL ANALYTICS</li>
                <li id="PA">PUPIL ANALYTICS</li>
            </div>


            <div id = "sreport" >
            <span id="closeSR">X</span>
                <h5 style=" margin-bottom: -1%;
                        color: white;
                        background-color: black;">schools report</h5>

                <li id="schoolranking">school rankings</li>
                <li>Performance of schools over time</li>
                <li id="WPS">worst performing schools per challenge</li>
                <li id = "BPS">list of best performing schoolos overall</li>

            </div>


            <div id="preport">
            <span id="closePR">X</span> 
                <h5 style="margin-bottom: -1%;
                        color: white;
                        background-color: black;">pupil report</h5>
                <li><a href="{{ route('bestTwo') }}">Best partispant per challenge</a></li>
                <li title="displays a list of partispants">partispant performance overtime</li>
                <li>list of partispants with incomplete challenge</li>
                <li id="BQ">Best done questions per challenge</li>
                <li id="PRQ">Percentage repetition of QUESTIONS</li>
            </div>

<!--FAHAD START HERE -->
            <table border='2' cellspacing=0 id="srankingt">
                                                          
  <tr ><th  colspan="3"> RANKINGS BASING ON AVERAGE SCORE FOR ALL COMPETITIONS<small id="closeSRT">close</small></th> </tr>
  <tr style="color:white; background-color:rgb(89, 40, 150);"><th>POSITION</th><th>NAME</th > <TH>AVERAGE SCORE</TH></tr>
                                                         
                                                         
          @php
            $rank = 1;
        @endphp
        @foreach ($averageMarks as $school)
        <tr>
            <td>{{ $rank }}</td>
            <td>{{ $school['SchoolName'] }}</td>
            <td>{{ $school['AverageMarks'] }}</td>
        </tr>
        @php
            $rank++;
        @endphp
        @endforeach
</table>
                                                         
                                                         
 <table border='2' cellspacing=0 style="display" id="BPST">
                                                          
 <tr ><th  colspan="3"> BEST PERFORMING SCHOOLS OVERALL<small id="closeBPST">close</small></th> </tr>
<tr style="color:white; background-color:rgb(89, 40, 150);"><th>POSITION</th><th>NAME</th > <TH style="color:green;">AVERAGE SCORE</TH></tr>
        @php
            $rank = 1;
        @endphp                                
  @foreach($topSchools as $school)
     <tr>
              <td>{{ $rank }}</td>
            <td>{{ $school['SchoolName'] }}</td>
            <td>{{ $school['AverageMarks'] }}</td>
     </tr>
        @php 
            $rank++;
        @endphp
    @endforeach
                                            </table>
 
     </div>
    
                    </div>
                </div>


                < <div id = "worstlist" >
            <span id="closeWL">X</span>
                <h5 style=" margin-bottom: -1%;
                        color: white;
                        background-color: black;">List of Challenges worst performing</h5>

@foreach ($challengesDetails as $challenge)
            <li><a href="{{ route('see', $challenge->id) }}">{{ $challenge->name }}</a></li>

        
        @endforeach

        
<!--FAHAD END HERE -->

<!--joseph START HERE -->
            < <div id = "BestQNS" >
            <span id="closeBQ">X</span>
                <h5 style=" margin-bottom: -1%;
                        color: white;
                        background-color: black;">List of Challenges for bestdone questions</h5>

@foreach ($challengesDetails as $challenge)
            <li><a href="{{ route('passedqn', $challenge->id) }}">{{ $challenge->name}}</a></li>
        @endforeach
            </div>


<!--JOSEPH END HERE -->




<!--DAVIS  START HERE -->
    <table border='2' cellspacing=0 id="INC">
    <thead>
        <tr ><th  colspan="3"> LIST OF PARTICIPANTS WITH INCOMPLETE CHALLENGE<small id="closeINC">close</small></th> </tr>
   
    </thead>
        <tr style="color:white; background-color:rgb(69, 30, 110);"><th>NUMBER</th><th>FIRSTNAME</th > <th>LASTNAME</th></tr>
        
    
    <tbody>
        @php
            $rank = 1;
        @endphp
        @foreach ($UFpupildetails as $UFdetail)
        <tr>
            <td>{{ $rank }}</td>
            <td>{{ $UFdetail->FirstName }}</td>
            <td>{{ $UFdetail['LastName'] }}</td>
            
        </tr>
        @php
            $rank++;
        @endphp
        @endforeach

        
    </tbody>
</table>
<!--DAVIS END  HERE -->
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


          let worstlist =  document.getElementById("worstlist");
          let closeWL =  document.getElementById("closeWL");
          let WPS =  document.getElementById("WPS");

          let BestQNS =  document.getElementById("BestQNS");
          let closeBQ =  document.getElementById("closeBQ");
          let BQ =  document.getElementById("BQ");

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
 //ParameterDiv.onclick = showNav; 

 WPS.onclick =showWorstlist;
closeWL.onclick = hideWorstlist;
BQ.onclick =showBestQNS;
closeBQ.onclick = hideBestQNS;

//challengeUpload.addEventlistner('onclick',showParameterDiv);

function showFilediv(){
    filediv.style.display="block";
}
function showChallengeForm(){
    challengeform.style.display="block";
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

                    
                    function showWorstlist(){
                                         worstlist.style.display="block"
                                         }
              function hideWorstlist(){
                        worstlist.style.display="none"
                             }
                             function showBestQNS(){
                                         BestQNS.style.display="block"
                                         }
                                         
              function hideBestQNS(){
                        BestQNS.style.display="none"
                             }




        </script>
    
    @endsection









   

