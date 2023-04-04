<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'cat_id',
        'name',
        'description',
        'image',
        'price',
        'quantity',
    ];
    public $timestamps = false;
}
