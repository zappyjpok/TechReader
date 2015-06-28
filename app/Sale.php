<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model {

	// List of values that can be mass assigned
    protected $fillable = [
        'salProductId',
        'salStart',
        'salFinish',
        'salDiscount'
    ];

    /**
     * Sales belongs to products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function scopeCurrent($query)
    {
        return $query->where('salStart', '<=', Carbon::now());
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }



}
