<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Funeral;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['funeral.obituary'])->latest()->paginate(10);
        $funerals = Funeral::with('obituary')->get();
        return view('admin.appointments.index', compact('appointments', 'funerals'));
    }

    public function create()
    {
        $funerals = Funeral::with('obituary')->get();
        return view('admin.appointments.create', compact('funerals'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'funeral_id' => 'required|exists:funerals,id',
            'date' => 'required|date',
            'time' => 'required',
            'attendee_name' => 'required|string|max:255',
            'notes' => 'nullable|string'
        ]);

        Appointment::create($validatedData);
        return redirect()->route('admin.appointments.index')->with('success', 'Appointment created successfully');
    }

    public function edit(Appointment $appointment)
    {
        $funerals = Funeral::with('obituary')->get();
        return view('admin.appointments.edit', compact('appointment', 'funerals'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validatedData = $request->validate([
            'funeral_id' => 'required|exists:funerals,id',
            'date' => 'required|date',
            'time' => 'required',
            'attendee_name' => 'required|string|max:255',
            'notes' => 'nullable|string'
        ]);

        $appointment->update($validatedData);
        return redirect()->route('admin.appointments.index')->with('success', 'Appointment updated successfully');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully');
    }
}
