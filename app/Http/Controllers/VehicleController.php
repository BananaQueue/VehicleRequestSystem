<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    // Show dashboard with available vehicles
    public function index()
    {
        $vehicles = Vehicle::all(); // You can filter with ->where('status', 'available') if needed
        return view('dashboard', compact('vehicles'));
    }

    // Show form to create a new vehicle (admin only)
    public function create()
    {
        return view('vehicles.create');
    }

    // Store new vehicle
    public function store(Request $request)
    {
         $request->validate([
        'make' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'plate_number' => 'required|string|unique:vehicles',
        'driver_name' => 'required|string',
    ]);

    Vehicle::create([
        'make' => $request->make,
        'model' => $request->model,
        'year' => $request->year,
        'plate_number' => $request->plate_number,
        'driver_name' => $request->driver_name,
        'status' => 'available',
        'assigned_to' => null,
    ]);

    return redirect('/')->with('success', 'Vehicle successfully added.');
}

    // Show edit form (admin only)
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    // Update vehicle
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $request->validate([
            'plate' => 'required|unique:vehicles,plate,' . $vehicle->id,
            'driver' => 'required',
        ]);

        $vehicle->update([
            'plate' => $request->plate,
            'driver' => $request->driver,
        ]);

        return redirect('/')->with('success', 'Vehicle updated.');
    }

    // Optional: delete vehicle
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect('/')->with('success', 'Vehicle deleted.');
    }

    public function showRequestForm()
{
    $vehicles = Vehicle::all(); // Or just available vehicles
    return view('requests.create', compact('vehicles'));
}

}
