<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obituary;
use Illuminate\Http\Request;

class ObituaryController extends Controller
{
    public function index()
    {
        $obituaries = Obituary::with('user')
            ->latest()
            ->paginate(10);
        
        return view('admin.obituaries.index', compact('obituaries'));
    }

    public function create()
    {
        return view('admin.obituaries.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'date_of_death' => 'required|date',
            'biography' => 'required'
        ]);

        Obituary::create($validatedData);
        return redirect()->route('admin.obituaries.index')->with('success', 'Obituary created successfully');
    }

    public function edit(Obituary $obituary)
    {
        return view('admin.obituaries.edit', compact('obituary'));
    }

    public function update(Request $request, Obituary $obituary)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'date_of_death' => 'required|date',
            'biography' => 'required'
        ]);

        $obituary->update($validatedData);
        return redirect()->route('admin.obituaries.index')->with('success', 'Obituary updated successfully');
    }

    public function destroy(Obituary $obituary)
    {
        $obituary->delete();
        return redirect()->route('admin.obituaries.index')->with('success', 'Obituary deleted successfully');
    }

    public function show(Obituary $obituary)
    {
        return view('admin.obituaries.show', compact('obituary'));
    }

    public function updateStatus(Request $request, Obituary $obituary)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $obituary->update([
            'status' => $validated['status'],
            'approved_at' => $validated['status'] === 'approved' ? now() : null
        ]);

        return back()->with('success', 'Obituary status updated successfully');
    }

    public function updateNotes(Request $request, Obituary $obituary)
    {
        $validated = $request->validate([
            'admin_notes' => 'nullable|string'
        ]);

        $obituary->update($validated);

        return back()->with('success', 'Admin notes updated successfully');
    }
}
