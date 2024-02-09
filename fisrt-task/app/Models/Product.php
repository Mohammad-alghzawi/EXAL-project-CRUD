<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'short_d_ar',
        'short_d_en',
        'long_d_ar',
        'long_d_en',
        'category',
    ];
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
