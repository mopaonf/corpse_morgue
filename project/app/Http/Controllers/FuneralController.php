<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funeral;

class FuneralController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // ...existing code...
        $funerals = Funeral::all();
        return view('funerals.index', compact('funerals'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        // ...existing code...
        return view('funerals.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // ...existing code...
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'location' => 'required',
            'details' => 'required',
        ]);

        Funeral::create($validatedData);
        return redirect()->route('funerals.index');
    }

    // Display the specified resource.
    public function show(Funeral $funeral)
    {
        // ...existing code...
        return view('funerals.show', compact('funeral'));
    }

    // Show the form for editing the specified resource.
    public function edit(Funeral $funeral)
    {
        // ...existing code...
        return view('funerals.edit', compact('funeral'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Funeral $funeral)
    {
        // ...existing code...
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'location' => 'required',
            'details' => 'required',
        ]);

        $funeral->update($validatedData);
        return redirect()->route('funerals.index');
    }

    // Remove the specified resource from storage.
    public function destroy(Funeral $funeral)
    {
        // ...existing code...
        $funeral->delete();
        return redirect()->route('funerals.index');
    }
}
