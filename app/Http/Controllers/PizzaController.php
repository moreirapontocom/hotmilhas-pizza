<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Pizza;

class PizzaController extends Controller
{
    public function createPizza(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|string|min:5',
            'slices' => 'required|integer|between:4,8'
        ]);

        return Pizza::create($request->all());
    }

    public function editPizza(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'description' => 'required|string|min:5',
            'slices' => 'required|integer|between:4,8'
        ]);

        $pizza = Pizza::find($request->id);
        $pizza->update($request->only(['description', 'slices']));

        return $pizza;
    }

    public function removePizza($id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();

        return ['message' => 'Pizza removed'];
    }

    public function listAll()
    {
        $all = Pizza::orderBy('description', 'ASC')->get();

        return ['pizzas' => $all];
    }
}
