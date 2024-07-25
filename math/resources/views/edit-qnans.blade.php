<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Question and Answer</title>
</head>
<body>
<div class="container mt-5">
    <h2>Edit Question and Answer</h2>
    <form action="{{ route('update.qnans', $qnans->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="QnID" class="form-label">QnID</label>
            <input type="text" class="form-control" id="QnID" name="QnID" value="{{ $qnans->QnID }}" required>
        </div>
        <div class="mb-3">
            <label for="Qn" class="form-label">Question</label>
            <input type="text" class="form-control" id="Qn" name="Qn" value="{{ $qnans->Qn }}" required>
        </div>
        <div class="mb-3">
            <label for="AnsID" class="form-label">AnsID</label>
            <input type="text" class="form-control" id="AnsID" name="AnsID" value="{{ $qnans->AnsID }}" required>
        </div>
        <div class="mb-3">
            <label for="Ans" class="form-label">Answer</label>
            <input type="text" class="form-control" id="Ans" name="Ans" value="{{ $qnans->Ans }}" required>
        </div>
        <div class="mb-3">
            <label for="Marks" class="form-label">Marks</label>
            <input type="number" class="form-control" id="Marks" name="Marks" value="{{ $qnans->Marks }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
