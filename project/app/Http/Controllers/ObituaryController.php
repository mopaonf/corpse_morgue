<?php

namespace App\Http\Controllers;

use App\Models\Obituary;
use Illuminate\Http\Request;
use App\Http\Requests\ObituaryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ObituaryController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $obituaries = Obituary::where(function($query) {
            $query->where('status', 'approved')
                ->orWhere(function($q) {
                    $q->where('user_id', Auth::id())
                        ->whereIn('status', ['pending', 'rejected']);
                });
        })
        ->latest()
        ->paginate(10);
        
        return view('obituaries.index', compact('obituaries'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('obituaries.create');
    }

    public function store(ObituaryRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';
        
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('obituaries', 'public');
        }

        $obituary = Obituary::create($validated);

        return redirect()->route('obituaries.show', $obituary)
            ->with('success', 'Obituary submitted successfully and is pending approval.');
    }

    public function show(Obituary $obituary)
    {
        return view('obituaries.show', compact('obituary'));
    }

    public function edit(Obituary $obituary)
    {
        $this->authorize('update', $obituary);
        return view('obituaries.edit', compact('obituary'));
    }

    public function update(ObituaryRequest $request, Obituary $obituary)
    {
        $this->authorize('update', $obituary);
        
        $validated = $request->validated();
        
        if ($request->hasFile('image')) {
            if ($obituary->image_path) {
                Storage::disk('public')->delete($obituary->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('obituaries', 'public');
        }

        $obituary->update($validated);

        return redirect()->route('obituaries.show', $obituary)
            ->with('success', 'Obituary updated successfully');
    }

    public function destroy(Obituary $obituary)
    {
        $this->authorize('delete', $obituary);
        
        if ($obituary->image_path) {
            Storage::disk('public')->delete($obituary->image_path);
        }
        
        $obituary->delete();

        return redirect()->route('obituaries.index')
            ->with('success', 'Obituary deleted successfully');
    }
}
