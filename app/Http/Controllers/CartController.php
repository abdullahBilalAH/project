<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
        // Get the cart from the session
        $cart = session('cart', []);

        // Fetch item details from the database based on item IDs in the cart
        $itemIds = array_keys($cart);
        $items = Item::whereIn('itemID', $itemIds)->get();

        // Prepare cart items with quantities
        $cartItems = $items->map(function ($item) use ($cart) {
            $item->quantity = $cart[$item->itemID];
            return $item;
        });

        return view('cart', compact('cartItems'));
    }
    public function addToCart(Request $request, $itemId)
    {
        // Get the current cart from the session
        $cart = session('cart', []);

        // Get the action from the request
        $action = $request->input('action');

        // Initialize the counter if it does not exist
        if (!isset($cart[$itemId])) {
            $cart[$itemId] = 0;
        }

        // Handle increment and decrement actions
        if ($action === 'increment') {
            $cart[$itemId] += 1;
        } elseif ($action === 'decrement' && $cart[$itemId] > 0) {
            $cart[$itemId] -= 1;
        } elseif ($action === 'add-to-cart') {
            $quantity = $request->input('counter', 1);
            $cart[$itemId] += $quantity;
        }

        // Update the cart in the session
        session(['cart' => $cart]);

        // Redirect back to the market page
        return redirect()->route('home');
    }
}
