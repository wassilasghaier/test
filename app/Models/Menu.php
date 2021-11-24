<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'icon',
        'url'  
     ];
    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
    ];
    public function roles(){
        return $this->belongsToMany(Role::class, 'menu_role');
      }
}
