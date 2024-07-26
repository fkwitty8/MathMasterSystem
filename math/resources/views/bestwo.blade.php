@extends('headerfooter')

<!-- Assuming you have a layout setup -->

@section('content')
    <div class="container">
        <h1>Best Pupils per Challenge</h1>
        
    
       @foreach($topTwoPupilDetails as $detail)
       
{{$detail->LastName}}  {{$marks[$detail->PupilID]}}
<br>
       @endforeach
    
@endsection