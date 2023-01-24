<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content'];
    public function movies(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function users(){
        return $this->belongsTo(Movie::class, 'id_movie');
    }
}
