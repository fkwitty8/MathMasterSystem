@extends('layouts.app') <!-- Assuming you have a layout setup -->

@section('content')
    <div class="container">
        <h1>Best Pupils per Challenge</h1>
        
        @foreach($bestTwoPupilsPerChallenge as $challengeID => $pupils)
            <h2>Challenge ID: {{ $challengeID }}</h2>
            <ul>
                @foreach($pupils as $pupil)
                    <li>
                        Pupil Name: {{ $pupil->UserName }} <!-- Adjust with your actual column name for pupil's name -->
                        <br>
                        Total Marks: {{ $pupil->total_marks }} <!-- Adjust with your actual column name for total marks -->
                    </li>
                @endforeach
            </ul>
            <hr>
        @endforeach
    </div>
@endsection