<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $cast = [
        'written_by_me' => 'boolean'
    ];
}
