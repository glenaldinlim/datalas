<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'is_active'
    ];

    public function origins()
    {
        return $this->hasMany(Origin::class);
    }

    public function communities()
    {
        return $this->hasMany(Community::class);
    }
}
