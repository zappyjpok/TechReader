<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    /**
     * Values that can be mass assigned
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address_id',
        'order_date',
        'total'
    ];
}
