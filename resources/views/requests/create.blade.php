<!DOCTYPE html>
<html>
<head>
    <title>Request Vehicle</title>
</head>
<body>
    <h1>Request a Vehicle</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('request.store', ['vehicle' => old('vehicle_id')]) }}" method="POST">
        @csrf

        <label for="vehicle_id">Select Vehicle:</label>
        <select name="vehicle_id" id="vehicle_id" required onchange="updateAction(this)">
            <option disabled selected>Select a vehicle</option>
            @foreach($vehicles as $vehicle)
                @if($vehicle->status === 'available')
                    <option value="{{ $vehicle->id }}">
                        {{ $vehicle->plate_number }} - {{ $vehicle->make }} {{ $vehicle->model }}
                    </option>
                @endif
            @endforeach
        </select><br><br>

        <label for="driver_name">Driver Name:</label>
        <input type="text" name="driver_name" id="driver_name" required><br><br>

        <button type="submit">Request Vehicle</button>
    </form>

    <script>
        function updateAction(select) {
            const form = document.querySelector('form');
            const vehicleId = select.value;
            form.action = `/request/${vehicleId}`;
        }
    </script>

    <br>
    <a href="{{ url('/') }}">Back to Dashboard</a>
</body>
</html>
