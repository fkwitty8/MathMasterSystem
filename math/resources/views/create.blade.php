@extends('headerfooter')

<!DOCTYPE html>
<html>
<head>
    <title>Set Parameters</title>

    <style>
        body{
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
            height:250px;
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
</head>
<body>
    <h1>Set Challenge Parameters</h1>
    <form method="POST" action="{{ route('store') }}">
        @csrf
        <div class=content>
        <label for="name">Challenge Name:</label>
        <input type="text" id="name" name="name" required style="width:40%"><br><br>
        <label for="number_of_questions">Number of Questions:</label>
        <input type="number" id="number_of_questions" name="number_of_questions" required><br><br>
        <label for="start_date">Start Date:</label>
        <input type="datetime-local" id="start_date" name="start_date" required><br><br>
        <label for="end_date">End Date:</label>
        <input type="datetime-local" id="end_date" name="end_date" required><br><br>
        <label for="duration">Duration (in minutes):</label>
        <input type="number" id="duration" name="duration" required><br><br>
        <button type="submit">Create Challenge</button>
</div>
    </form>


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