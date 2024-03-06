<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MenuController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('AddMenu');
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
        $user = $request->user();
        $userPlan = Plan::find($user->Plan_id);

        if ($userPlan) {
            $numberOfMenus = $userPlan->NumberOfmenus;
    
            $numberOfMenusCreatedByUser = Menu::where('restaurant_id', $user->resto_id)->count();
    
            if ($numberOfMenusCreatedByUser < $numberOfMenus) {
                $validatedData = $request->validate([
                    'name' => 'required|string',
                    'description' => 'required|string',
                    'media' => 'required|file|mimes:jpeg,png,mp4,mov,avi|max:10240', // Adjust the max file size if needed
                ]);
                    $validatedData['restaurant_id'] = $user->resto_id;
                    $menu = Menu::create($validatedData);
                if ($request->file('media')->isValid() && strpos($request->file('media')->getClientMimeType(), 'video/') === 0) {
                    $menu->addMediaFromRequest('media')->toMediaCollection('videos');
                } else {
                    $menu->addMediaFromRequest('media')->toMediaCollection('images');
                }

                $this->sendMenuCreationConfirmationEmail($user, $menu);

                return redirect()->route('menusform')->with('success', 'Menu created successfully.');
            } else {
                return redirect()->route('menusform')->with('error', 'You cannot add more menus under this plan.');
            }
        } else {
            return redirect()->route('menusform')->with('error', 'Please choose your plan first.');
        }
    }


    private function sendMenuCreationConfirmationEmail($user, $menu)
{
    // Prepare data to be passed to the email view
    $data = ['user' => $user, 'menu' => $menu];

    // Send the email using the specified view and data
    Mail::send('emails.mail_Menu', $data, function ($message) use ($user) {
        $message->to($user->email, $user->name)
            ->subject('Menu Creation Confirmation');
    });
}
    

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }

    
}
