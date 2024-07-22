<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>View Schools</title>
</head>
<body>
<div class="container mt-5">
    <h2>View Schools</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>District</th>
                <th>Registration Number</th>
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
                <td>{{ $school->district }}</td>
                <td>{{ $school->schoolRegistrationNumber }}</td>
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
</body>
</html>
