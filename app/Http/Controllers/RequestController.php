<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

if (!auth()->check()) {
    return redirect('/login');
}


class RequestController extends Controller
{
public function create()
{
    $vehicles = Vehicle::where('status', 'available')->get();
    return view('requests.create', compact('vehicles'));
}

    public function store(Request $request, $vehicleId)
{
    $request->validate([
        'driver_name' => 'required|string',
    ]);

    $vehicle = Vehicle::findOrFail($vehicleId);

    $vehicle->update([
        'driver_name' => $request->driver_name,
        'status' => 'in_use',
        'assigned_to' => auth()->user()->name,
    ]);

    return redirect('/')->with('success', 'Vehicle requested successfully.');
}

    public function return($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->status = 'available';
        $vehicle->assigned_to = null;
        $vehicle->save();

        return redirect('/')->with('success', 'Vehicle returned.');
    }

    public function showRequestForm()
{
    $vehicles = Vehicle::all(); // Or just available vehicles
    return view('requests.create', compact('vehicles'));
}

}
