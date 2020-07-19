<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * Get the user that owns the User.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
