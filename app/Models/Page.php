<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club;
use App\Models\Categorie;
use App\Models\User;
class Page extends Model
{
    use HasFactory;
    public $table = 'pages';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

}