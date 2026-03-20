<?php

namespace App\Http\Controllers;

use App\Models\activity_type;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activityTypes = activity_type::latest()->paginate(10);
        return view('backend.activity_types.index', compact('activityTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.activity_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);

        activity_type::create($validated);

        return redirect()->route('activity_types.index')
            ->with('success', 'Activity type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(activity_type $activity_type)
    {
        return view('backend.activity_types.show', compact('activity_type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(activity_type $activity_type)
    {
        return view('backend.activity_types.edit', compact('activity_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activity_type $activity_type)
    {
        $validated = $request->validate([
            'activity' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);

        $activity_type->update($validated);

        return redirect()->route('activity_types.index')
            ->with('success', 'Activity type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activity_type $activity_type)
    {
        $activity_type->delete();

        return redirect()->route('activity_types.index')
            ->with('success', 'Activity type deleted successfully.');
    }
}
