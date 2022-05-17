<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club;
use App\Models\Categorie;
use App\Models\User;
class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'image',
        'place',
        'date',
        'time',
        'kilometrage',
        'nivau',
        'participants', 
        'club_id', 
        'categorie_id', 
        'user_id',
        'isCancled'
        

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function users() {
        return $this->belongsToMany(User::class, 'event_user');
    }
}