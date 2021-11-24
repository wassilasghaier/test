<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Menu;
class Role extends Model
{
    use HasFactory;
    protected $fillable = [
       'name',
       'description',  
    ];
    protected $hidden = [
      'pivot',
      'created_at',
      'updated_at',
  ];
    public function users(){
      return $this->belongsToMany(User::class, 'role_user');
    }
    public function menus(){
      return $this->belongsToMany(Menu::class, 'menu_role');
    }
}
