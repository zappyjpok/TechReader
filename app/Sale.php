<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model {

	//

    /**
     * Sales belongs to products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo('App\Product');
    }

}
