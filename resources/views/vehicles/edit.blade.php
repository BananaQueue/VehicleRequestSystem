<!DOCTYPE html>
<html>
<head>
    <title>Edit Vehicle</title>
</head>
<body>
    <h1>Edit Vehicle</h1>

    <!-- Update Form -->
    <form action="{{ url('/vehicles/' . $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="plate_number">Plate Number:</label>
        <input type="text" name="plate_number" id="plate_number" value="{{ $vehicle->plate_number }}" required><br><br>

        <label for="driver_name">Driver Name:</label>
        <input type="text" name="driver_name" id="driver_name" value="{{ $vehicle->driver_name }}" required><br><br>

        <label for="make">Make:</label>
        <input type="text" name="make" id="make" value="{{ $vehicle->make }}" required><br><br>

        <label for="model">Model:</label>
        <input type="text" name="model" id="model" value="{{ $vehicle->model }}" required><br><br>

        <label for="year">Year:</label>
        <input type="number" name="year" id="year" value="{{ $vehicle->year }}" required><br><br>

        <label for="color">Color:</label>
        <input type="text" name="color" id="color" value="{{ $vehicle->color }}" required><br><br>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="available" {{ $vehicle->status == 'available' ? 'selected' : '' }}>Available</option>
            <option value="in_use" {{ $vehicle->status == 'in_use' ? 'selected' : '' }}>In Use</option>
        </select><br><br>

        <button type="submit">Update Vehicle</button>
    </form>

    <!-- Delete Form -->
    <form action="{{ url('/vehicles/' . $vehicle->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete Vehicle</button>
    </form>

    <br>
    <a href="{{ url('/') }}">Back to Dashboard</a>
</body>
</html>
