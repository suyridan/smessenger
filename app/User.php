<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Tabla que contiene los usuarios
     *
     * @var string
     */

    protected $table = 'users';

    /**
     * Atritubo llave primaria
     *
     * @var string
     */
    protected $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name','email','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usu_password', 'remember_token',
    ];
}
