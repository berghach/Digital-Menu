<?php

namespace App\Http\Controllers;

use App\Models\Restaurent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Awner.createResto');
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
        if (Auth::user()->resto_id == null) {
            $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'hours_of_operation' => 'required|string',
            ]);
            
            // Create a new instance of Restaurant
            $restaurant = new Restaurent();
            $restaurant->name = $request->name;
            $restaurant->address = $request->address;
            $restaurant->hours_of_operation = $request->hours_of_operation;
            $restaurant->save();
        
            // Update the user's resto_id
            $user = Auth::user();
            $user->resto_id = $restaurant->id; 
            $user->save();
        
            return redirect()->back()->with('success', 'Restaurant created successfully.');
        } else {
            return redirect()->back()->with('error', 'You cant add another restaurent from this account.');
        }
    }
    
    
    
    /**
     * Display the specified resource.
     */
    public function show(Restaurent $restaurent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurent $restaurent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurent $restaurent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurent $restaurent)
    {
        //
    }
}
