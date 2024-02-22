<?php

namespace App\Http\Controllers;

use App\Models\Plan as planing;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'duration_in_days' => 'required|numeric',
        ]);

        // Create a new plan
        $plan = new planing();
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->duration_in_days = $request->duration_in_days;
        $plan->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Plan added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(planing $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(planing $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, planing $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(planing $plan)
    {
        //
    }
}
