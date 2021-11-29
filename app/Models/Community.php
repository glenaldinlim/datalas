<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'province_id',
        'origin_id',
        'address',
        'contact_name',
        'contact_phone',
        'is_active',
    ];

    public function productions()
    {
        return $this->hasMany(Production::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }
}
