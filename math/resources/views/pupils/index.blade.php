<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schools List</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
    body{
            background-color: #e0f7fa; /* Light blue background */
            
        }
</style>
</head>
<body>
<div class="container mt-5">
    <h1>PARTICIPANT PERFORMANCE OVER THE YEARS IN EACH SCHOOL</h1>
    <ul class="list-group mt-4">
        @foreach($schools as $school)
            <li class="list-group-item">
                <a href="{{ route('schools.showPupils', $school->id) }}">{{ $school->Name }}</a>
            </li>
        @endforeach
    </ul>
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
</body>
</html>