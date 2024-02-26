<?php

namespace App\Http\Controllers;

use App\Models\Restaurent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Mail;
use App\Mail\OperatorCredentialsEmail;
use App\Models\User; // Update the namespace for the User model
use App\Models\Restaurant; // Update the namespace for the Restaurant model
use Illuminate\Auth\Events\Registered; // Add this at the top of your controller

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
    // public function store(Request $request)
    // {
    //     //
    //     if (is_null(Auth::user()->Plan_id)) {
    //         return redirect()->back()->with('error', 'Please Go to chose Your Plan first.');
    //     }
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'role' => ['required', 'in:2'],
    //     ]);
        
        
    //     // Create a new instance of User
    //     $operatuer = new User();
    //     $role = 'Operatuer';
    //     $operatuer->assignRole($role);
    //     event(new Registered($operatuer));

    //     // Auth::login($operatuer);
    //     $operatuer->name = $request->name;
    //     $operatuer->email = $request->email;
    //     $operatuer->password = bcrypt($request->password); // Hash the password before saving
    //     $user = Auth::user()->resto_id;
    //     $userplan = Auth::user()->Plan_id;

    //     $operatuer->resto_id = $user; 
    //     $operatuer->Plan_id = $userplan; 

    //     // Save the user
    //     $operatuer->save();
    
    //     return redirect()->back()->with('success', 'User created successfully.');
    // }
 
  public function store(Request $request)
    {
        // Check if the authenticated user has a plan ID
        if (is_null(Auth::user()->Plan_id)) {
            return redirect()->back()->with('error', 'Please choose your plan first.');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'role' => ['required', 'in:2'],
        ]);

        // Create a new instance of User
        $operator = new User();
        $operator->assignRole('Operatuer'); // Assign the 'Operatuer' role

        // Set operator details
        $operator->name = $request->name;
        $operator->email = $request->email;
        $operator->password = bcrypt($request->password); // Hash the password before saving

        // Get authenticated user's restaurant ID and plan ID
        $restaurantId = Auth::user()->resto_id;
        $planId = Auth::user()->Plan_id;

        // Assign restaurant ID and plan ID to the operator
        $operator->resto_id = $restaurantId;
        $operator->Plan_id = $planId;

        // Save the operator
        $operator->save();

        // Send email with operator credentials
        $this->sendOperatorCredentialsEmail($operator, $request->password);

        return redirect()->back()->with('success', 'Operator created successfully.');
    }

    private function sendOperatorCredentialsEmail($user, $password)
{
    $data = ['user' => $user, 'password' => $password];

    Mail::send('emails.mail_operatuer', $data, function ($message) use ($user) {
        $message->to($user->email, $user->name)
            ->subject('Your Operator Credentials');
    });
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
