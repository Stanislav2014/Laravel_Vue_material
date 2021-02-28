<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'amount_invest',
        'email',
        'password',
        'agree',
        'subscribe',
        'on_vacation'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    protected $casts = [
        'agree' => 'boolean',
        'subscribe' => 'boolean',
        'on_vacation' => 'boolean',
    ];
}
