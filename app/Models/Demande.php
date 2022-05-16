<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club;
use App\Models\User;
class Demande extends Model
{
    public $table = 'demandes';
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'cin', 
        'club_id', 
        'user_id', 

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}