<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Condidat;
use App\Models\Forum;
class Reset extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'code',
    ];
   
}
           
           
