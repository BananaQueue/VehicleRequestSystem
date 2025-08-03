<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle</title>
</head>
<body>
    <h1>Add Vehicle</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ url('/vehicles') }}" method="POST">
        @csrf
        <label>Make:</label><input type="text" name="make" required><br>
        <label>Model:</label><input type="text" name="model" required><br>
        <label>Year:</label><input type="number" name="year" required><br>
        <label>Plate Number:</label><input type="text" name="plate_number" required><br>
        <label>Driver Name:</label><input type="text" name="driver_name" required><br>
        <button type="submit">Add Vehicle</button>
    </form>

    <br>
    <a href="{{ url('/') }}">Back to Dashboard</a>
</body>
</html>
