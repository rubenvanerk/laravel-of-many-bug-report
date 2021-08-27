<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Brand extends Model
{
    use HasFactory;

    public function cheapestProduct(): HasOne
    {
        return $this->hasOne(Product::class)->ofMany(['price' => 'min'], function ($query) {
            $query->whereHas('category', function ($query) {
                $query->where('published', true);
            });
        });
    }
}
