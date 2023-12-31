<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail'
    ];

    public function tags()
    {
        // Product belongToMany Tags
        return $this->belongsToMany(Tag::class);
    }

    // Accessor
    public function getDescriptionAttribute($value)
    {
        return strtoupper($value);
    }

    // Mutator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = "!".ucfirst($value)."!";
    }
}