<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category', 'image'];

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopePriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    public function scopePopular($query)
    {
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }

    public function purchases() : HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
