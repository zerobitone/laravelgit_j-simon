<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // uebung_21: Mass Assignment
	protected $fillable =['title','text']; // für beide Spalten müssen Inhalte angegeben werden bei einem INSERT
   

    public function interest()  // singular
    {
        return $this->belongsTo('App\Models\Interest'); 
        //return $this->belongsTo('App\User', 'fremdschlüssel_article', 'primärschlüssel_interest');
    }

    public function interests()  // plural 
        {
        return $this->belongsToMany('App\Models\Interest'); 
        //return $this->belongsTo('App\User', 'fremdschlüssel_article', 'primärschlüssel_interest');
    }
    
}
