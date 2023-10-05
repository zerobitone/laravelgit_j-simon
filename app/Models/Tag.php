<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function products()
    {
        // Tag belongsTo Product
        return $this->belongsToMany(Product::class);
    }
}
