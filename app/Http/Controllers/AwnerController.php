<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Awner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->resto_id != null){
        $authUserRestoId = Auth::user()->resto_id;
        $users = User::where('resto_id', $authUserRestoId)->get();
        return view('Awner.GestOfOperateurs', ['users' => $users]);
    }else{
    }
        $message = 'You have no operateurs akhay!!';
        return view('Awner.GestOfOperateurs', compact('message'));

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
            'email' => 'required|email',
            'password' => 'required',
            'role' => ['required', 'in:2'], 
            'plan_id' => 'required|exists:plans,id', 
        ]);
    
        // Create a new operator
        $operator = new User();
        $operator->name = $request->name;
        $operator->email = $request->email;
        $operator->password = bcrypt($request->password); 
        $operator->role = $request->role;
        $operator->resto_id = Auth::user()->resto_id;
        $operator->plan_id = $request->plan_id;
        $operator->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Operator created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    // public function show(Awner $awner)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $operator = User::findOrFail($id);
        return view('Awner.EditOperatuer', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'role' => ['required', 'in:2'],
            'plan_id' => 'required|exists:plans,id',
        ]);
    
        $operator = User::findOrFail($id);
        $operator->name = $request->name;
        $operator->email = $request->email;
        $operator->password = bcrypt($request->password);
        $operator->role = $request->role;
        $operator->plan_id = $request->plan_id;
        $operator->save();

        Session::flash('success', 'Operator updated successfully.');
        return redirect()->route('awners.index')->with('success', true);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $operator = User::findOrFail($id);
    $operator->delete();
    return redirect()->route('GestionOfOPerar', ['id' => $id])->with('success', 'Operator deleted successfully.');
}
}
