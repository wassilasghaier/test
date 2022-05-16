<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paiment;
use App\Models\Club;
class Contrie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'photo',    
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function clubs()
    {
        return $this->hasMany(Club::class);
    }
}