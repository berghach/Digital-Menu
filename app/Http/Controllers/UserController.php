<?php

namespace App\Http\Controllers;

use App\Models\Restaurent;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered; // Add this at the top of your controller


use Illuminate\Support\Facades\Auth;
use App\Models\User; // Update the namespace for the User model
use App\Models\Restaurant; // Update the namespace for the Restaurant model

class UserController extends Controller // Change the class name to avoid conflicts
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Awner.AddOperatuers');
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
        //
        if (is_null(Auth::user()->Plan_id)) {
            return redirect()->back()->with('error', 'Please Go to chose Your Plan first.');
        }
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'role' => ['required', 'in:2'],
        ]);
        
        
        // Create a new instance of User
        $operatuer = new User();
        $role = 'Operatuer';
        $operatuer->assignRole($role);
        event(new Registered($operatuer));

        // Auth::login($operatuer);
        $operatuer->name = $request->name;
        $operatuer->email = $request->email;
        $operatuer->password = bcrypt($request->password); // Hash the password before saving
        $user = Auth::user()->resto_id;
        $userplan = Auth::user()->Plan_id;

        $operatuer->resto_id = $user; 
        $operatuer->Plan_id = $userplan; 

        // Save the user
        $operatuer->save();
    
        return redirect()->back()->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
