<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Funeral;
use App\Models\Obituary;
use Illuminate\Http\Request;

class FuneralController extends Controller
{
    public function index()
    {
        $funerals = Funeral::with('obituary')->latest()->paginate(10);
        $obituaries = Obituary::all();
        return view('admin.funerals.index', compact('funerals', 'obituaries'));
    }

    public function create()
    {
        $obituaries = Obituary::all();
        return view('admin.funerals.create', compact('obituaries'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'obituary_id' => 'required|exists:obituaries,id',
            'date' => 'required|date',
            'location' => 'required|string',
            'details' => 'required|string'
        ]);

        Funeral::create($validatedData);
        return redirect()->route('admin.funerals.index')->with('success', 'Funeral created successfully');
    }

    public function edit(Funeral $funeral)
    {
        $obituaries = Obituary::all();
        return view('admin.funerals.edit', compact('funeral', 'obituaries'));
    }

    public function update(Request $request, Funeral $funeral)
    {
        $validatedData = $request->validate([
            'obituary_id' => 'required|exists:obituaries,id',
            'date' => 'required|date',
            'location' => 'required|string',
            'details' => 'required|string'
        ]);

        $funeral->update($validatedData);
        return redirect()->route('admin.funerals.index')->with('success', 'Funeral updated successfully');
    }

    public function destroy(Funeral $funeral)
    {
        $funeral->delete();
        return redirect()->route('admin.funerals.index')->with('success', 'Funeral deleted successfully');
    }
}
