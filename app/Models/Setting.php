<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'about',
        'address',
        'telphone',
        'phone',
        'instagram_url',
        'facebook_url',
        'twitter_url',
        'maps_url',
    ];
}
