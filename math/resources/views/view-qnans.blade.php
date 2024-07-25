<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Questions and Answers</title>
</head>
<body>
<div class="container mt-5">
    <h2>Questions and Answers</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>QnID</th>
                <th>Question</th>
                <th>AnsID</th>
                <th>Answer</th>
                <th>Marks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($qnans as $item)
                <tr>
                    <td>{{ $item->QnID }}</td>
                    <td>{{ $item->Qn }}</td>
                    <td>{{ $item->AnsID }}</td>
                    <td>{{ $item->Ans }}</td>
                    <td>{{ $item->Marks }}</td>
                    <td>
                        <a href="{{ route('edit.qnans', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete.qnans', $item->id) }}" method="POST" class="d-inline">
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
