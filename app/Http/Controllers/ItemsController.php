<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\items;
// use BaconQrCode\Writer;




use Illuminate\Http\Request;
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
    public function edit(items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(items $items)
    {
        //
    }
    public function getAllItems($menu_id)
    {
        $items = items::where('menu_id', $menu_id)->get();
        return view('itemsofmenue', ['items' => $items, 'menu_id' => $menu_id]);
    }
    
    
    // public function generateQRCode($menu_id)
    // {
    //     $url = url("/allItems/$menu_id");
    
    //     // Create QR code renderer
    //     $renderer = new ImageRenderer(
    //         new ImagickImageBackEnd(),  // Use the appropriate ImageBackEndInterface implementation
    //         new ErrorCorrectionLevel(), // Use the appropriate error correction level module
    //         new RoundBlockSizeMode(400) // Use the appropriate block size mode module
    //     );
        
    //     // Create QR code writer
    //     $writer = new Writer($renderer);
    
    //     // Generate QR code as PNG string
    //     $qrCode = $writer->writeString($url);
    
    //     // Return the QR code image as a response
    //     return response($qrCode)->header('Content-Type', 'image/png');
    // }
    

}
