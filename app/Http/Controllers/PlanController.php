<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Plan as planing;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $plans = planing::all();
        return view('Awner.index', compact('plans'));
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
        return view('Admin.editPlans', compact('plan'));
    }
    
    public function update(Request $request, planing $plan)
    {
        // dd($plan);

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'duration_in_days' => 'required|numeric',
        ]);
    
        $plan->update($request->all());
    
        return redirect()->back()->with('success', 'Plan updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(planing $plan)
{
    $plan->delete();
    return redirect()->back()->with('success', 'Plan deleted successfully!');
}

public function assignPlan(Request $request)
{
    
    $restoId = Auth::user()->resto_id;
    // jebt biha ga3 khoutna li b7al khothom
    $users = User::where('resto_id', $restoId)->get();
    $planId = $request->Plan_id;
        foreach ($users as $user) {
        $user->Plan_id = $planId;
        $user->save();
    }

    return redirect()->back()->with('success', 'Plan assigned to users successfully!');
}


}
