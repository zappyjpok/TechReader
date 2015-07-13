<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	//

    /**
     * Values that can be mass assigned
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone'
    ];

    /**
     * A profile can  have one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return$this->belongsTo('App\User');
    }

}
