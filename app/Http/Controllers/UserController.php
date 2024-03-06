<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Restaurent;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\OperatorCredentialsEmail;
use Spatie\Permission\Models\Permission;
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
        // Get the authenticated user
        $user = $request->user();
    
        // Retrieve the plan associated with the authenticated user
        $userPlan = Plan::where('id', $user->Plan_id)->first();
    // dd($userPlan);
        // If the user plan exists
        if ($userPlan) {
            // Retrieve the number of operators with the same resto_id as the authenticated user
            $numberOfOperatorsWithSameResto = User::where('resto_id', $user->resto_id)
                ->where('id', '!=', $user->id) // Exclude the authenticated user
                ->count();
    
            // Check if the user can add more operators under the current plan
            if ($numberOfOperatorsWithSameResto < $userPlan->NumberOfOperateurs) {
                // Validation rules for creating a new user
                $request->validate([
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'password' => 'required',
                    'role' => ['required', 'in:2'],
                ]);
    
                // Create a new instance of User
                $operator = new User();
    
                // Set operator details
                $operator->name = $request->name;
                $operator->email = $request->email;
                $operator->password = bcrypt($request->password); // Hash the password before saving
                $operator->resto_id = $user->resto_id;
                $operator->Plan_id = $user->plan_id;
    
                // Save the operator
                $operator->save();
                // Get authenticated user's restaurant ID and plan ID
                $restaurantId = Auth::user()->resto_id;
                $planId = Auth::user()->Plan_id;
                    
                // Assign restaurant ID and plan ID to the operator
                $operator->resto_id = $restaurantId;
                $operator->Plan_id = $planId;
                    
                // Save the operator
                $operator->save();
  
    
    
                // Assign the 'Operatuer' role
                $operator->assignRole('Operatuer');
    
                // Send email with operator credentials
                $this->sendOperatorCredentialsEmail($operator, $request->password);
    
                return redirect()->back()->with('success', 'Operator created successfully.');
            } else {
                // If the maximum number of operators is reached
                return redirect()->back()->with('error', 'You cannot add more operators under this plan.');
            }
        } else {
            // If the user does not have an active plan
            return redirect()->back()->with('error', 'Please choose your plan first.');
        }
    }


    private function sendOperatorCredentialsEmail($user, $password)
    {
        $data = ['user' => $user, 'password' => $password];
    
        Mail::send('emails.mail_operatuer', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Your Operator Credentials');
        });
    }
    

    public function assignPermissionsToOperator(Request $request)
    {
        $userId = $request->input('user_id');
        $operator = User::find($userId);
    
        if (!$operator) {
            return redirect()->back()->with('error', 'Operator not found.');
        }
    
        // Find the Operatuer role
        // $operatuerRole = Role::where('name', 'Operatuer')->first();
        // if (!$operatuerRole) {
        //     return redirect()->back()->with('error', 'Operatuer role not found.');
        // }
    
     if($request->input('add_menu')){
        $operator->givepermissionTo('add menu');    
     }elseif($request->input('update_menu')){
        $operator->givepermissionTo('update menu');    
     }elseif($request->input('delete_menu')){
        $operator->givepermissionTo('delet menu');    
     }else{
        return redirect()->back()->with('success', 'maapermission ma ta le3baa.');
     }
                // return redirect()->back()->with('error', 'Permission ' . $permissionName . ' not found.');

        
    
        return redirect()->back()->with('success', 'Permissions assigned successfully to the operator.');
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
    public function showAssignPermissionsForm()
    {
        // Get the authenticated user's resto ID
        $restoId = Auth::user()->resto_id;
    
        // Get the operators with the same resto ID
        $operators = User::where('resto_id', $restoId)
                        ->whereHas('roles', function ($query) {
                            $query->where('name', 'Operatuer');
                        })
                        ->get();
    
        return view('Awner.AwnerPermessions', ['operators' => $operators]);
    }
    
    
 
}


