<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\items;
use App\Models\User;
// use BaconQrCode\Writer;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
// use BaconQrCode\Renderer\ImageRenderer;
// use BaconQrCode\Renderer\Module\ErrorCorrectionLevel;
// use BaconQrCode\Renderer\Module\RoundBlockSizeMode;



class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('items', ['menus' => $menus]);
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
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'menu_id' => 'required',
        ]);
        
        $item = new items();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->menu_id = $request->menu_id;
        $item->save();
        

        // Redirect back with success message
        return redirect()->back()->with('success', 'Plan added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(items $item)
    {
        $menus = Menu::all();
        return view('edit_item', ['item' => $item, 'menus' => $menus]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, items $item)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'menu_id' => 'required',
        ]);

        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'menu_id' => $request->menu_id,
        ]);

        return redirect()->back()->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(items $item)
    {
        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully!');
    }

    public function getAllItems($menu_id)
    {
        $items = items::where('menu_id', $menu_id)->get();
        return view('itemsofmenue', ['items' => $items, 'menu_id' => $menu_id]);
    }



    public function getAllItemsOfworkers($menu_id = null)
    {
        // Check if $menu_id is provided
        if ($menu_id !== null) {
            // Get the restaurant ID from the menu ID
            $restaurantId = Menu::findOrFail($menu_id)->restaurant_id;
    
            // Get all users with the same restaurant ID
            $operators = User::where('resto_id', $restaurantId)->get();
    
            // Get all items associated with the given menu_id and operators of the restaurant
            $items = items::whereIn('operator_id', $operators->pluck('id'))
                         ->where('menu_id', $menu_id)
                         ->get();
    
            return view('itemsofOne', ['items' => $items]);
        } else {
            // Handle case when $menu_id is not provided (optional behavior)
            // For example, return all items without filtering by menu
            $items = items::all();
            return view('itemsofOne', ['items' => $items]);
        }
    }
    
    
    

}
