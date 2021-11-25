<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'commodity_id',
        'community_id',
        'year_production',
        'quartal',
        'stock',
    ];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
