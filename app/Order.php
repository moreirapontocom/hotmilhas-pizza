<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\Customer;
use \App\Pizza;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pizza_id',
        'customer_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function orders_pizzas()
    {
        return $this->hasOne(Pizza::class, 'id', 'pizza_id');
    }
}
