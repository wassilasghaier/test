<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adherent extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'cin', 
        'club_id', 
        'user_id', 

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
