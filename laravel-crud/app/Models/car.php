<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'model_year',
        'color',
        // '_token', // Add _token to allow mass assignment
    ];
}
