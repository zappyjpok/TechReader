<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	//

    /**
     * A product can have many sales
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    // List of fillable fields to protect from mass assignment
    protected $fillable = [
        'proName',
        'proAuthor',
        'proTitle',
        'proPublishDate',
        'proPublisher',
        'proPrice',
        'proDescription',
        'proImagePath'
        ];

    public function sales() {
        return $this->hasMany('App\Sale');
    }
}
