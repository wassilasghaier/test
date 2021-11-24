<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pack;

class Paiment extends Model
{
    use HasFactory;
   // public $timestamps = false;
   
    protected $fillable = [
        'user_id',
        'pack_id',
        'statut',
        'is_active',
        'code',
        'expired',       
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
}         
          
          
          
         