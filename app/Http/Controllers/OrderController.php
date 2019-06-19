<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;

use \App\Order;
use \App\Pizza;
use \App\Customer;

class OrderController extends Controller
{
    public function listAll()
    {
        $orders = Order::with('customer')
                       ->with('pizza')
                       ->orderBy('id', 'ASC')
                       ->get();

        return ['orders' => $orders];
    }

    public function createOrder(Request $request)
    {
        $request['phone'] = preg_replace('/\D/', '', $request->phone);

        $this->validate($request, [
            'pizza' => 'required|string|min:5',
            'slices' => 'required|integer|between:4,8',
            'name' => 'required|string|min:5',
            'phone' => 'required|string|min:10|max:11', // 31983645656
            'address' => 'required|string|min:3',
        ]);

        $pizza = Pizza::where('description', $request->pizza)
                      ->where('slices', $request->slices)
                      ->first();

        $customer = Customer::where('phone', $request->phone)->first();
        if (!$customer)
            $customer = Customer::create($request->only(['name','phone','address']));

        $order = Order::create(['pizza_id' => $pizza->id, 'customer_id' => $customer->id]);

        return ['order' => $order];
    }
}
