<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants List</title>
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
    <h1>Participants from {{ $school->Name }}</h1>
    <ul class="list-group">
        @foreach ($participants as $participant)
            <li class="list-group-item">
                <a href="{{ route('participants.show', $participant->PupilID) }}">
                    {{ $participant->FirstName }} {{ $participant->LastName }}
                </a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('school.index') }}" class="btn btn-primary mt-3">Back to Schools List</a>
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
