<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\Order;

class Customer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class)->with('orders_pizzas');
    }
}
