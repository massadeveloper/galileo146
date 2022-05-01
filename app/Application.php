<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'notes', 'user_id', 'job'
    ];



    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
