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

    /**
     * This function allows values to be added to the order_product pivot table
     *
     */
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }

    /**
     * An order has a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * An order has an address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
}
