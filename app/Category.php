<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	//

    protected $table = 'categories';
    protected $fillable = [
        'catName'
    ];

    /**
     * Category has many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'proCategoryId');
    }

}
