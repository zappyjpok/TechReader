<?php namespace App;

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

    /**
     * A product can have many sales
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Sale');
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
}
