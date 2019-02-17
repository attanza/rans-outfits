<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Uuids, Sluggable;

    public $incrementing = false;

    protected $fillable = [
        'product_category_id',
        'code',
        'name',
        'slug',
        'regular_price',
        'sell_price',
        'discount',
        'tax',
        'stock',
        'stock_status_id',
        'ordering',
        'material',
        'tags',
        'is_featured',
        'is_publish',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function medias()
    {
        return $this->hasMany("App\Models\ProductMedia");
    }

    public function category()
    {
        return $this->belongsTo("App\Models\ProductCategory");
    }

    public function stockStatus()
    {
        return $this->belongsTo("App\Models\StockStatus");
    }

    public function description()
    {
        return $this->hasOne('App\Models\ProductDescription');
    }

    public function shipping()
    {
        return $this->hasOne("App\Models\ProductShipping");
    }

    public function attributes()
    {
        return $this->hasMany("App\Models\ProductAttribute");
    }
}
