<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function application()
    {
        return $this->hasOne('App\Application');
    }

    public function routeNotificationForSlack()
    {
        return 'https://hooks.slack.com/services/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';
    }
}
