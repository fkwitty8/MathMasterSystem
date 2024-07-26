<!DOCTYPE html>
<html>
<head>
    <title>Challenge Analytics</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<head>
    <title>Challenge Analytics</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Challenge Analytics</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Challenge ID</th>
                    <th>Question ID</th>
                    <th>Selection Count</th>
                    <th>Percentage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($analytics as $data)
                    <tr>
                        <td>{{ $data->ChID }}</td>
                        <td>{{ $data->QnID}}</td>
                        <td>{{ $data->selection_count }}</td>
                        <td>{{ number_format($data->percentage, 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
