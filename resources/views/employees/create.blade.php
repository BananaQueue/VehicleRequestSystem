<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <h2>Add Employee</h2>
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Password:</label>
        <input type="password" name="password" required><br>
        
        <button type="submit">Add Employee</button>
    </form>
</body>
</html>
