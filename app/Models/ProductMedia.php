<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    protected $table = 'product_medias';
    protected $fillable = ["caption", "url", "type", "is_main", "is_publish"];
}
