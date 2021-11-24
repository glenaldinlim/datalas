<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'slug',
        'content',
        'cover',
        'published_status',
        'published_at',
        'published_by',
    ];

    public function getPublishTimeAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->published_at)->format('d M Y H:i:s');
    }
}
