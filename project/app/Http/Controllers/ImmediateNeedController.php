<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImmediateNeed;
use Illuminate\Support\Facades\Auth;  // Add this line

class ImmediateNeedController extends Controller
{
    public function index()
    {
        return view('immediate-need.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'planning_for' => 'required|string',
            'your_name' => 'required|string|max:255',
            'your_email' => 'required|email',
            'your_phone' => 'required|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_death' => 'required|date',
            'address' => 'required|string',
            'city' => 'required|string',
            'place_of_birth' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'marital_status' => 'required|string',
            'final_disposition' => 'required|in:burial,cremation',
            'visitation' => 'required|in:public,private',
            'funeral_service' => 'required|in:public,private',
        ]);

        // Add user_id to validated data
        $validated['user_id'] = Auth::id();

        // Create the record with all data including user_id
        ImmediateNeed::create($validated);

        return redirect()->back()->with('success', 'Your immediate need request has been submitted successfully.');
    }
}
