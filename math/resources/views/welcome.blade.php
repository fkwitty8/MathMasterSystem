<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <style>
    footer {
        background-color:#002366;
        padding: 20px 0;
        text-align: center;
    }
    .footer-content ul {
        list-style: none;
        padding: 0;
    }
    .footer-content ul li {
        display: inline;
        margin: 0 30px;
    }
    .footer-content ul li a {
        text-decoration: none;
        color: #ffffff;
    }
</style>
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
                            <a class="nav-link click-scroll" href="{{ url('/') }}">Home</a>
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
        <main>

            <section class="hero" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12 m-auto">
                            <div class="hero-text">

                                <h1 class="text-white mb-4"><u class="text-info">WELCOME TO</u> MATHCHALLENGE 2024</h1>

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

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="highlight-thumb">
                                <img src="images/highlight/math2.jpg" class="highlight-image img-fluid" alt="">

                                <div class="highlight-info">
                                    <h3 class="highlight-title">Be a mathematician</h3>

                                    <a href="https://www.youtube.com/templatemo" class="bi-youtube highlight-icon"></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="highlight-thumb">
                                <img src="images/highlight/miguel-henriques--8atMWER8bI-unsplash.jpg" class="highlight-image img-fluid" alt="">

                                <div class="highlight-info">
                                    <h3 class="highlight-title">2020 Highlights</h3>

                                    <a href="https://www.youtube.com/templatemo" class="bi-youtube highlight-icon"></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="highlight-thumb">
                                <img src="images/highlight/jakob-dalbjorn-cuKJre3nyYc-unsplash.jpg" class="highlight-image img-fluid" alt="">

                                <div class="highlight-info">
                                    <h3 class="highlight-title">2021 Highlights</h3>

                                    <a href="https://www.youtube.com/templatemo" class="bi-youtube highlight-icon"></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>





            <section class="about section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h2 class="mb-4">CURRENT <u class="text-info">REPORT AND ANALYTICS FOR COMPLETE CHALLENGES</u></h2>
                        </div>

                        <div class="col-lg-6 col-12">
                            <h3 class="mb-3">General over view of performance</h3>





                            <p style="margin-top:-40px;">The MathMasterChallenge typically evaluates students on their problem-solving skills, mathematical reasoning, and application of mathematical concepts. Overall performance can be summarized in a few key areas:</p>


                           
                        </div>





                        <button id="reports"><b>MORE INCITE</b></button>
     <div style="position:absolute; top:268% ;left:4%;">
             <div id="analysis">
                <span id="closeA">X</span>
                <li id="SA">SCHOOL ANALYTICS</li>
                <li id="PA">PUPIL ANALYTICS</li>
            </div>


            <div id = "sreport" >
            <span id="closeSR">X</span>
                <h5 style=" margin-bottom: -1%;
                        color: white;
                        background-color: black; height:fit-content;" >schools report</h5>

                <li >school rankings</li>
                <li>Performance of schools over time</li>
                <li>worst performing schools per challenge</li>
                <li>list of best performing schoolos overall</li>

            </div>


            <div id="preport">
            <span id="closePR">X</span>
                <h5 style=" margin-bottom: -1%;
                        color: white;
                        background-color: black;height:fit-content;">pupil report</h5>
                <li>Best partispant per challenge</li>
                <li title="displays a list of partispants">partispant performance overtime</li>
                <li>list of partispants with incomplete challenge</li>
            </div>

     </div>
    
                       

                    </div>
                </div>
            </section>
            

<script>
            let reports =  document.getElementById("reports");
          let analysis =  document.getElementById("analysis");
          let schoolreport =  document.getElementById("sreport");
          let pupilreport =    document.getElementById("preport");
          let schoolAnalysis =  document.getElementById("SA");
          let pupilanalysis =    document.getElementById("PA");
          let closeA =  document.getElementById("closeA");
          let closeSR =  document.getElementById("closeSR");
          let closePR =  document.getElementById("closePR")


          reports.onclick =  showAnalysis;
schoolAnalysis.onclick = showSchoolreport;
pupilanalysis.onclick = showPupilReport;
closeA.onclick = hideAnalysis;
closeSR.onclick = hideSchoolreport;
closePR.onclick = hidePupilReport;


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





</script>











    </body>
    <footer>
    <div class="footer-content">
        <ul>
            <li><a href="{{ url('/') }}">Back</a></li>
            <li><a href="{{ url('/schools') }}">School Analysis</a></li>
            <li><a href="{{ url('/PUPIL') }}">Pupil Analysis</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </div>
</footer>


</html>
