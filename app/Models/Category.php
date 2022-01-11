<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use HasFactory;
    //insertar en la base de datos
    protected $fillable = ['title', 'url_clean'];
}
