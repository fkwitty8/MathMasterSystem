  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Performance</title>
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
    <h1>Performance of Participants from {{ $school->Name }}</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Year</th>
                <th>Total Marks</th>
                <th>Number of Challenges</th>
                <th>Average Score</th>
                <th>Percentage Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pupilPerformances as $performance)
                <tr>
                    <td>{{ $performance->FirstName }}</td>
                    <td>{{ $performance->LastName }}</td>
                    <td>{{ $performance->year }}</td>
                    <td>{{ $performance->totalMarks }}</td>
                    <td>{{ $performance->challengesCount }}</td>
                    <td>{{ $performance->averageScore }}</td>
                    <td>{{ $performance->percentageScore }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
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

