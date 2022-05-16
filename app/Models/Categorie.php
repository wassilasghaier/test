<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Categorie extends Model 
{
    use HasFactory;

    protected $fillable = [
       'name',  
    ];
    protected $hidden = [
      'created_at',
      'updated_at',
  ];

  public function events(){
    return $this->hasMany(Event::class);
  }

}






