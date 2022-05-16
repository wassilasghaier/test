<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club;
use App\Models\Categorie;
use App\Models\User;
class Actualite extends Model
{
    use HasFactory;
    public $table = 'actualites';
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
    protected $hidden = [
        'updated_at',
    ];

}