<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {


    /**
     * Values that can be mass assigned
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Role belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\User');
    }

}
