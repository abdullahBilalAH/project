<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // الحصول على جميع الطلبات
        $orders = Order::all();
        // عرض الطلبات في العرض المناسب
        return view('orders', compact('orders'));
    }
    public function index1($orderId)
    {
        // الحصول على جميع الطلبات
        $orders = Order::all();
        $items = Item::all();
        // عرض الطلبات في العرض المناسب
        return view('order', ["orders" => $orders, "items" => $items, "orderId" => $orderId]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:15',
            'totalCost' => 'required|numeric',
            'items' => 'required|string' // يتم التحقق كـ string لأننا نمرر JSON
        ]);

        $order = new Order();
        $order->order_value = $validatedData['totalCost'];
        $order->items = $validatedData['items']; // حفظ معرفات العناصر كـ JSON
        $order->address = $validatedData['address'];
        $order->phoneNumber = $validatedData['phoneNumber'];
        $order->save();

        // Clear the cart after saving the order
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Order placed successfully and cart cleared!');
    }
}
