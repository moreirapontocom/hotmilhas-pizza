<?php

namespace App\Http\Controllers;

use \App\Customer;

class CustomerController extends Controller
{
    public function listAll()
    {
        $customers = Customer::orderBy('name', 'ASC')->get();

        return ['customers' => $customers];
    }
}
