<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	//



    // List of fillable fields to protect from mass assignment
    protected $fillable = [
        'proName',
        'proAuthor',
        'proTitle',
        'proCategoryId',
        'proPublishDate',
        'proPublisher',
        'proPrice',
        'proDescription',
        'proImagePath'
        ];


    public function setPublishDateAttribute($date)
    {
        $this->attributes['proPublishDate'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * A product can have many sales
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Sale', 'salProductId');
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

    public function getCategoryName($id)
    {
        $name = Category::where('id', $id)->first()->catName;
        return $name;
    }

    public function getSales($id)
    {

        $sale = Sale::where('salProductId', $id, 'OR')
            ->where('salStart', '<=', Carbon::now(), 'AND')
            ->where('salFinish', '>=', Carbon::now())
            ->first();

        if(!is_null($sale))
        {
            return $sale->salDiscount;
        } else {
            return False;
        }
    }
}
