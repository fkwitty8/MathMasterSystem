<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Upload Schools</title>
</head>
<body>
<div class="container mt-5">
    <h2>Upload Schools</h2>
    <form action="{{ route('upload.schools') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="schoolsFile" class="form-label">Schools Excel File</label>
            <input type="file" class="form-control" id="schoolsFile" name="schoolsFile" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
