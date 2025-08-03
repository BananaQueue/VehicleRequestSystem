<!DOCTYPE html>
<html>
<head>
    <title>Request a Vehicle</title>
</head>
<body>
    <h1>Request a Vehicle</h1>
    <table border="1">
        <tr><th>Plate</th><th>Driver</th><th>Status</th><th>Action</th></tr>
        @foreach ($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->plate_number }}</td>
                <td>{{ $vehicle->driver_name }}</td>
                <td>{{ $vehicle->status }}</td>
                <td>
                    @if($vehicle->status == 'available')
                        <form method="POST" action="{{ route('request.store', $vehicle->id) }}">
                            @csrf
                            <button type="submit">Request</button>
                        </form>
                    @else
                        In Use
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
