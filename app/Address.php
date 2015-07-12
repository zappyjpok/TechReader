<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    /**
     * Values that can be mass assigned
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address',
        'city',
        'state',
        'postal_code'
    ];

    /**
     * Address belongs to a User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return$this->belongsTo('App\User');
    }

}
