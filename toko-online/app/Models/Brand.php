<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['nama', 'deskripsi'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
