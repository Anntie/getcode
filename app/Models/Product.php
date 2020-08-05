<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'categories' => 'array',
        'images' => 'array',
    ];

    public function getFirstImageAttribute()
    {
        return empty($this->images) ? '' : $this->images[0];
    }

    public function getCategoriesListAttribute()
    {
        return empty($this->categories) ? '' : implode(' > ', $this->categories);
    }
}
