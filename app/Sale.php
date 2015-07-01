<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model {

	// List of values that can be mass assigned
    protected $fillable = [
        'product_id',
        'start',
        'finish',
        'discount'
    ];



    /**
     * Sales belongs to products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function scopeCurrent($query)
    {
        $query->where('start', '<=',Carbon::now())->where('finish', '>=', Carbon::now());
    }

    public function scopeFindProduct($query, $id)
    {
        $query->where('product_id', $id);
    }
}
