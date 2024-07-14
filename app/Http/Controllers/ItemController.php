<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('error', 'Unauthorized action.');
    }
    // Method to handle storing items
    public function index()
    {
        $item = Item::all();
        return view('itemsDB', ['DB' => $item]);
    }
    public function indexUser()
    {
        dd(0000);
    }
    public function show($itemID)
    {
        $item = Item::where('itemID', $itemID)->first();
        return view("item", ["item" => $item, 'itemId' => $itemID]);
    }
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'quantity' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for photo
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName); // Move uploaded file to public/photos directory
            $photoPath = 'photos/' . $imageName; // Store relative path to database
        }

        // Create new item and save to database
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->type = $request->type;
        $item->quantity = $request->quantity;
        $item->photo = $photoPath; // Save path to database
        $item->save();

        // Optionally, you can return a response or redirect
        return redirect()->route('itemsDB')->with('success', 'Item created successfully.');
    }
    public function update(Request $request, $itemID)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'quantity' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for photo
        ]);

        // Find the existing item by ID
        $item = Item::find($itemID);

        if (!$item) {
            return redirect()->route('itemsDB')->with('error', 'Item not found.');
        }

        // Handle file upload if a new photo is provided
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName); // Move uploaded file to public/photos directory
            $photoPath = 'photos/' . $imageName; // Store relative path to database
            $item->photo = $photoPath; // Update photo path in the item
        }

        // Update the item properties
        $item->name = $request->name;
        $item->price = $request->price;
        $item->type = $request->type;
        $item->quantity = $request->quantity;

        // Save the updated item to the database
        $item->save();

        // Optionally, you can return a response or redirect
        return view("item", ["item" => $item, 'itemId' => $itemID]);
    }

    public function destroy($itemID)
    {
        // Find the item by its ID
        $item = Item::find($itemID);

        if (!$item) {
            return redirect()->route('itemsDB')->with('error', 'Item not found.');
        }

        // Delete the item
        $item->delete();

        // Optionally, you can return a response or redirect
        return redirect()->route('itemsDB')->with('success', 'Item deleted successfully.');
    }


    public function viewCart()
    {
        dd('viewCart method called');
        $cart = session('cart', []);
        return view('cart', compact('cart'));
    }
    // In ItemController.php

}
