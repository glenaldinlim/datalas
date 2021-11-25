<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'gender',
        'avatar',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute()
    {
        return ucwords($this->first_name.' '.$this->last_name);
    }

    public function getRoleNameAttribute()
    {
        return ucfirst($this->getRoleNames()[0]);
    }

    public function getJoinYearAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('M Y');
    }

    public function community()
    {
        return $this->hasOne(Community::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function publishedBies()
    {
        return $this->hasMany(Publication::class, 'published_by', 'user_id');
    }

    public function userLogs()
    {
        return $this->hasMany(UserLog::class);
    }
}
