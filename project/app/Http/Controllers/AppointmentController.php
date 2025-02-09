<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // ...existing code...
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        // ...existing code...
        return view('appointments.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // ...existing code...
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'details' => 'required',
        ]);

        Appointment::create($validatedData);
        return redirect()->route('appointments.index');
    }

    // Display the specified resource.
    public function show(Appointment $appointment)
    {
        // ...existing code...
        return view('appointments.show', compact('appointment'));
    }

    // Show the form for editing the specified resource.
    public function edit(Appointment $appointment)
    {
        // ...existing code...
        return view('appointments.edit', compact('appointment'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Appointment $appointment)
    {
        // ...existing code...
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'details' => 'required',
        ]);

        $appointment->update($validatedData);
        return redirect()->route('appointments.index');
    }

    // Remove the specified resource from storage.
    public function destroy(Appointment $appointment)
    {
        // ...existing code...
        $appointment->delete();
        return redirect()->route('appointments.index');
    }
}
