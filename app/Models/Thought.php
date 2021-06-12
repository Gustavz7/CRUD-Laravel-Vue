<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Thought extends Model
{
    use HasFactory;
    protected $table = 'thoughts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'description',
        'user_id',
    ];
    public function thought(){
        return $this->hasOne(User::class, 'user_id');
    }
}
