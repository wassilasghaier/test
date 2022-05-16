<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contrie;
use App\Models\User;
use App\Models\adherent;
class Club extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'uuid',
        'code',
        'name',
        'description',
        'photo',
        'date_creation',
        'date_debutmarhe',
        'nb_adherent',
        'is_active',
        'contrie_id',  

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function contrie()
    {
        return $this->belongsTo(Contrie::class);
    }
    public function Users()
    {
        return $this->hasMany(User::class);
    }
    public function adherents()
    {
        return $this->hasMany(adherent::class);
    }
}