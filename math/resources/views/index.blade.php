<!DOCTYPE html>
<html>
<head>
    <title>Challenges</title>
    <script>
        function countdown(element, endDate) {
            var countDownDate = new Date(endDate).getTime();
            var x = setInterval(function() {  //setInterval is used to create a timer that calls the specified function repeatedly
                var now = new Date().getTime();   //gets the current date and time in milliseconds
                var distance = countDownDate - now;  //calculates the time remaining until the endDate 
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));  //calculates the number of days remaining
                //Math.floor rounds down to the nearest whole number
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));  //calculates the number of hours remaining
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));  //calculates the number of minutes remaining
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);  //calculates the number of seconds remaining
                element.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
                if (distance < 0) {   //checks if countdown has reached zero
                    clearInterval(x);  //stops the interval timer to stop updating the countdown
                    element.innerHTML = "EXPIRED";  //displays 'EXPIRED' if countdown reaches zero
                }
            }, 1000);
        }

        window.onload = function() {
            document.querySelectorAll('.countdown').forEach(function(element) {
                countdown(element, element.getAttribute('data-end'));
            });
        }
    </script>
</head>
<body>
    <h1>Challenges</h1>
    <a href="{{ route('create') }}">Create New Challenge</a>
    <ul>
        @foreach($challenges as $challenge)
            <li>
                <!--{{ $challenge->id }} - {{ $challenge->name }} - {{ $challenge->number_of_questions }} questions - 
                Starts at {{ $challenge->start_date }} - 
                Ends at {{ $challenge->end_date }} - 
                Duration: {{ $challenge->duration }} minutes - 
                <span class="countdown" data-end="{{ $challenge->end_date }}"></span>-->

                <p>ChallengeID:{{ $challenge->id }}</p>
                <P>ChallengeName:{{ $challenge->name }}</p>
                <p>Number Of Questions:{{ $challenge->number_of_questions }}</p>
                <p>Start:{{ $challenge->start_date }}</p> 
                <p>Ends:{{ $challenge->end_date }}</p>
                <p>Duration: {{ $challenge->duration }} minutes</p> 
                <p>Countdown:<span class="countdown" data-end="{{ $challenge->end_date }}"></span></p>
            </li>
        @endforeach
    </ul>
</body>
</html>