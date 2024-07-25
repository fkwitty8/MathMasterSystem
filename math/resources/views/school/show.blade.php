<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Performance</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <h1>Performance of {{ $participant->FirstName }} {{ $participant->LastName }}</h1>
    <canvas id="performanceChart"></canvas>
    
    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Back to Participants List</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('performanceChart').getContext('2d');

    // Prepare the data
    var data = @json($performanceData);

    // Extract years and percentage scores
    var years = data.map(item => item.year);
    var percentageScores = data.map(item => item.percentageScore);

    // Generate different colors for each bar
    var backgroundColors = years.map(() => {
        return `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.2)`;
    });

    var borderColors = backgroundColors.map(color => {
        return color.replace('0.2', '1');
    });

    // Create chart
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: years,
            datasets: [{
                label: 'Percentage Score',
                data: percentageScores,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Percentage Score'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Year'
                    }
                }
            }
        }
    });
});
</script>
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
