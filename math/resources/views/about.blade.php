@extends('headerfooter')

@section('content')
<div class="about-container">
<h1>About Us</h1>
    <p>Welcome to our Math Challenge System! Our platform is designed to provide engaging and educational math challenges to students of all ages. We believe that learning math should be fun and interactive, and our challenges are crafted to stimulate critical thinking and problem-solving skills.</p>
    
    <h2>Our Mission</h2>
    <p>Our mission is to make math accessible and enjoyable for everyone. We aim to create a supportive environment where students can practice and improve their math skills through a variety of challenges and competitions. Whether you are a beginner or an advanced math enthusiast, our platform has something for everyone.</p>
    
    <h2>How It Works</h2>
    <p>Each challenge is carefully designed by our team of educators and math experts. Participants can join challenges that are appropriate for their skill level and work through problems at their own pace. We provide immediate feedback and detailed explanations to help students learn from their mistakes and understand complex concepts.</p>
    
    <h2>Join Us</h2>
    <p>If you are passionate about math and enjoy solving puzzles, join our community today! Participate in our challenges, track your progress, and see how you rank against other math enthusiasts. We are excited to have you on board and look forward to seeing you excel in math!</p>
    </div>

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

    <style>
        .about-container {
            background-color: #e0f7fa; /* Light blue background */
            padding: 20px;
            border-radius: 8px;
            text-align:center;
        }
        form{
            border:2px solid black;
            padding:20px;
            border-radius:8px;
            width:50%;
            margin-left:24%;
            height:300px;
        }
        
    footer {
        background-color:#002366;
        padding: 20px 0;
        text-align: center;
        margin-top:10%;
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
    .content{
        width:80%;
        padding:20px;
        margin-left:2%;
    }
    </style>
@endsection