<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit School</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit School</h2>
        <form action="{{ route('update.school', $school->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="Name" class="form-control" value="{{ $school->Name }}" required>
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" name="district" class="form-control" value="{{ $school->District }}" required>
            </div>
            <div class="form-group">
                <label for="schoolRegistrationNumber">School Registration Number</label>
                <input type="text" name="schoolRegistrationNumber" class="form-control" value="{{ $school->schoolRegNo }}" required>
            </div>
            <div class="form-group">
                <label for="RepID">Rep ID</label>
                <input type="text" name="RepID" class="form-control" value="{{ $school->RepID }}" required>
            </div>
            <div class="form-group">
                <label for="RepEmail">Rep Email</label>
                <input type="email" name="RepEmail" class="form-control" value="{{ $school->RepEmail }}" required>
            </div>
            <div class="form-group">
                <label for="RepFirstName">Rep First Name</label>
                <input type="text" name="RepFirstName" class="form-control" value="{{ $school->RepFirstName }}" required>
            </div>
            <div class="form-group">
                <label for="RepLastName">Rep Last Name</label>
                <input type="text" name="RepLastName" class="form-control" value="{{ $school->RepLastName }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
