<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>View Schools</title>
    <style>
        body{
            background-color: #e0f7fa; /* Light blue background */
            
        }
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
</style>
</head>
<body>
<div class="container mt-5">
    <h2>View Schools</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>District</th>
                <th>schoolRegNo</th>
                <th>Representative ID</th>
                <th>Representative Email</th>
                <th>Representative First Name</th>
                <th>Representative Last Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
            <tr>
                <td>{{ $school->Name }}</td>
                <td>{{ $school->District }}</td>
                <td>{{ $school->schoolRegNo }}</td>
                <td>{{ $school->RepID }}</td>
                <td>{{ $school->RepEmail }}</td>
                <td>{{ $school->RepFirstName }}</td>
                <td>{{ $school->RepLastName }}</td>
                <td><a href="{{ route('edit.school', $school->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('delete.school', $school->id) }}" method="POST" style="display:inline-block;">
                    <!--<a href="#" class="btn btn-warning">Edit</a>
                    <form action="#" method="POST" class="d-inline">-->
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
