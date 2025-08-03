
<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Request System</title>
</head>
<body>
    @php use Illuminate\Support\Facades\Auth; @endphp

    @if(Auth::check())
    <p>Hello, {{ Auth::user()->name }}! You are logged in.</p>
@endif

    <h1>Available Vehicles</h1>

    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('vehicles.create') }}">Add Vehicle</a>
            <a href="{{ route('employees.create') }}">Add Employee</a>
        @endif
    @endauth

    <table border="1">
        <thead>
            <tr>
                <th>Vehicle ID</th>
                <th>Plate Number</th>
                <th>Driver's Name</th>
                <th>Status</th>
                <th>Assigned To</th>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <th>Action</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->plate_number }}</td>
                    <td>{{ $vehicle->driver_name }}</td>
                    <td>{{ $vehicle->status }}</td>
                    <td>{{ $vehicle->assigned_to }}</td>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <td>
                                <a href="{{ route('vehicles.edit', $vehicle->id) }}">Edit</a>
                            </td>
                        @endif
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @if (auth()->check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif
</div>

</form>

</body>
</html>
