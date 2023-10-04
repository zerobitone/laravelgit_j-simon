<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // MASS ASSIGMENT

    protected $fillable = ['title',"text"];  // whitelist erlaubte Felder
    //protected $guarded = ['id','created_at','updated_at'];  // oder blacklist, nicht erlaubte,  nicht beide!



    // scope
    public  function scopeNurFuenf($query) {
        return $query->offset(0)->limit(5);
    }
}
