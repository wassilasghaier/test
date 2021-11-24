<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paiment;
use App\Models\User;
class Pack extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'period',
        'color', 
        'price',        
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function paiments()
    {
        return $this->belongsToMany(Paiment::class, 'paiments');
    }
    public function users()
    {
        return $this->hasMany(Users::class);
    }
}