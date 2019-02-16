<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    protected $fillable = ["short_description", "long_description"];

    public function product()
    {
        return $this->belongsTo("App/Models/Product");
    }
}
