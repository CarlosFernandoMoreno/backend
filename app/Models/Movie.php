<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;
class Movie extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];
    use HasFactory;
    protected $fillable = ['titulo','descripcion','fecha_de_estreno','portada'];
    public function comments(){
        return $this->hasMany(Comment::class, 'id');

    }
}
