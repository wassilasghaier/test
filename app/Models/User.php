<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Role;
use App\Models\Club;
use App\Models\adherent;
use App\Models\Event;
use App\Models\Operation;
use App\Models\Paiment;

class User extends Authenticatable

{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'cin',
        'name',
        'email',
        'password',
        'username',
        'phone',
        'date_birth',
        'adresse',
        'image',
        'is_active',
        'club_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'username',
        'created_at',
        'updated_at',
        'pivot',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    public function club()
    {
        return $this->belongsTo(Club::class,'club_id');
    }
    public function events() {
        return $this->belongsToMany(Event::class, 'event_user');
    }
    public function adherents()
    {
        return $this->hasMany(adherent::class);
    }
}
