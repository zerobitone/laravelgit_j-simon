<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // uebung_21

class Interest extends Model
{
    use HasFactory;

    use SoftDeletes; // uebung_21
// get() oder all()  // where deleted_at is null

    public function articles() // plural
    {
        //return $this->hasMany('App\Models\Article'); 
        return $this->hasOne('App\Models\Article'); 
        //Fremdschlüssel und Primärschlüssel können angepasst werden
        //return $this->hasOne('App\Models\Article', 'fremdschlüssel_article', 'primärschlüssel_interest');
    }
    
}
