<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	//



    // List of fillable fields to protect from mass assignment
    protected $fillable = [
        'name',
        'author',
        'title',
        'category_id',
        'publisher',
        'price',
        'description',
        'image'
        ];

    /**
     * formats the date
     *
     * @param $date
     */
    public function setPublishDateAttribute($date)
    {
        $this->attributes['publish_date'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * A product can have many sales
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Sale', 'product_id');
    }

    /**
     * This function allows values to be added to the order_product pivot table
     *
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    /**
     * Product can only have one category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'id');
    }

    /**
     * function to return the category name
     *
     * @param $id
     * @return mixed
     */
    public function getCategoryName($id)
    {
        $name = Category::where('id', $id)->first()->name;
        return $name;
    }

    /**
     * Function to get the current sales of a product
     *
     * @param $id
     * @return bool
     */
    public function getSales($id)
    {

        $sale = Sale::where('product_id', $id, 'OR')
            ->where('start', '<=', Carbon::now(), 'AND')
            ->where('finish', '>=', Carbon::now())
            ->first();

        if(!is_null($sale))
        {
            return $sale->salDiscount;
        } else {
            return False;
        }
    }
}
