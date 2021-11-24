<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Level extends Model
{
    use HasFactory;
   // public $timestamps = false;
   
    protected $fillable = [
        'name'     
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }

}         
          
          
          
         