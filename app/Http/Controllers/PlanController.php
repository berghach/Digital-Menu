<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Plan as planing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        // dd($request);
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'duration_in_days' => 'required|numeric',
            'NumberOfOperateurs' => 'required|numeric',
            'NumberOfmenus___' => 'required|numeric',
        ]);
        // Create a new plan
        $plan = new planing();
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->duration_in_days = $request->duration_in_days;
        $plan->NumberOfmenus = $request->NumberOfmenus___; 
        $plan->NumberOfOperateurs = $request->NumberOfOperateurs;
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
            'NumberOfmenus' => 'required|numeric',
            'NumberOfOperateurs' => 'required|numeric',

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
    $users = User::where('resto_id', $restoId)->get();
    $planId = $request->Plan_id;

    foreach ($users as $user) {
        $user->Plan_id = $planId;
        $user->save();


        $plan = planing::findOrFail($planId);
        $this->sendAbonnementUpdatedEmail($user, $plan);

        $planDuration = $plan->duration_in_days;
        $expirationDate = Carbon::parse($user->updated_at)->addDays($planDuration);

        if (Carbon::now()->gt($expirationDate)) {
            foreach ($users as $user) {
                $user->Plan_id = $planId;
                $user->save();
                $this->sendAbonnementUpdatedEmail($user, $plan);
            }
            return redirect()->back()->with('error', 'Your plan has expired. Please choose a new plan.');
        }
        else {
            foreach ($users as $user) {
                $user->Plan_id = $planId;
                $user->save();
                $this->sendAbonnementUpdatedEmail($user, $plan);
            }
            return redirect()->back()->with('success', 'Plan assigned successfully!');
        }
    }
}




/**
 * Send email notification to user about abonnement update.
 */
private function sendAbonnementUpdatedEmail($user, $plan)
{
    $data = ['user' => $user, 'plan' => $plan]; // Updated variable names

    Mail::send('emails.abon_update', $data, function ($message) use ($user) {
        $message->to($user->email, $user->name)
            ->subject('Your Plan has been Updated'); // Updated email subject
    });
}


}











// public function assignPlan(Request $request)
// {
//     $restoId = Auth::user()->resto_id;
//     $planId = $request->Plan_id;

//     $plan = planing::findOrFail($planId);


//     $planDuration = $plan->duration_in_days;
//     $expirationDate = Carbon::parse(Auth::user()->updated_at)->addDays($planDuration);

//     if (Carbon::now()->lt($expirationDate)) {
//         return redirect()->back()->with('info', 'Your plan is still active. If you want to change your plan, please contact support.');
//     } if (Carbon::now()->gt($expirationDate)) {

//         return redirect()->back()->with('error', 'Your plan has expired. Please choose a new plan.');
//     } if (Auth::user()->Plan_id != $planId) {
//         $users = User::where('resto_id', $restoId)->get();

//         foreach ($users as $user) {
//             $user->Plan_id = $planId;
//             $user->save();
//             $this->sendAbonnementUpdatedEmail($user, $plan);
//         }
//         return redirect()->back()->with('success', 'Plan assigned successfully!');
//     }

   
// }
// public function assignPlan(Request $request)
// {
    
//     $restoId = Auth::user()->resto_id;
//     // jebt biha ga3 khoutna li b7al khothom
//     $users = User::where('resto_id', $restoId)->get();
//     $planId = $request->Plan_id;
//         foreach ($users as $user) {
//         $user->Plan_id = $planId;
//         $user->save();
//     }

//     return redirect()->back()->with('success', 'Plan assigned to users successfully!');
// }