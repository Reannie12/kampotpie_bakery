<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'image',
        'stock',
    ];

    protected $appends = ['image_url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getImageUrlAttribute()
    {
        if (!empty($this->image)) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
                return $this->image;
            }

            if (str_starts_with($this->image, 'storage/')) {
                return asset($this->image);
            }

            if (str_starts_with($this->image, 'products/')) {
                return asset('storage/' . $this->image);
            }

            if (str_starts_with($this->image, 'image/')) {
                return asset($this->image);
            }

            return asset('image/' . $this->image);
        }

        $name = strtolower($this->name ?? '');
        $category = strtolower(optional($this->category)->name ?? '');
        $text = $name . ' ' . $category;

        return match (true) {
            str_contains($text, 'apple') => asset('image/Applepie.webp'),
            str_contains($text, 'blueberry') => asset('image/blueberry-pie.jpg'),
            str_contains($text, 'strawberry') && str_contains($text, 'ice') => asset('image/Strawberry-ice-cream.webp'),
            str_contains($text, 'strawberry') => asset('image/Strawberry-cake.jpg'),
            str_contains($text, 'chocolate') && str_contains($text, 'ice') => asset('image/chocolate-ice-cream.jpg'),
            str_contains($text, 'chocolate') => asset('image/chocolate-cake.jpg'),
            str_contains($text, 'vanilla') => asset('image/vanilla-ice-cream.jpg'),
            str_contains($text, 'ice cream') || str_contains($text, 'ice-cream') => asset('image/vanilla-ice-cream.jpg'),
            str_contains($text, 'cake') => asset('image/chocolate-cake.jpg'),
            str_contains($text, 'pie') => asset('image/Applepie.webp'),
            default => asset('image/logokampotpie.jpg'),
        };
    }
}
