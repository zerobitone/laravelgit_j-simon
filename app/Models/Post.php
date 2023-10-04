<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // für das soft delete

class Post extends Model
{
    use HasFactory;

    // für das soft delete
 	use SoftDeletes;   

    // MASS ASSIGMENT

    protected $fillable = ['title',"text"];  // whitelist erlaubte Felder
    //protected $guarded = ['id','created_at','updated_at'];  // oder blacklist, nicht erlaubte,  nicht beide!



    // scope
    public  function scopeNurFuenf($query) {
        return $query->offset(0)->limit(5);
    }
    // dates, Carbon Instanzen
    // siehe Besipiel in der Route für /eloquent
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
