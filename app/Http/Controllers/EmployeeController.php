<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

if (!auth()->check()) {
    return redirect('/login');
}


class EmployeeController extends Controller
{
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employee'
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Employee added successfully!');
    }
}
