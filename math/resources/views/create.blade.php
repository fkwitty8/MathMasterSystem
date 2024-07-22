<!DOCTYPE html>
<html>
<head>
    <title>Create Challenge</title>
</head>
<body>
    <h1>Create Challenge</h1>
    <form method="POST" action="{{ route('store') }}">
        @csrf
        <label for="name">Challenge Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="number_of_questions">Number of Questions:</label>
        <input type="number" id="number_of_questions" name="number_of_questions" required><br><br>
        <label for="start_date">Start Date:</label>
        <input type="datetime-local" id="start_date" name="start_date" required><br><br>
        <label for="end_date">End Date:</label>
        <input type="datetime-local" id="end_date" name="end_date" required><br><br>
        <label for="duration">Duration (in minutes):</label>
        <input type="number" id="duration" name="duration" required><br><br>
        <button type="submit">Create Challenge</button>
    </form>
</body>
</html>