<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Product extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'category',
        'detail_name',
        'detail_desc',
        'detail_size',
        'detail_packing',
        'detail_certificate',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public $timestamps = true;

    protected $table = 'products';

    protected $casts = [
        'detail_size' => 'array',
        'detail_packing' => 'array',
        'detail_certificate' => 'array',
    ];

    /**
     * Get the product images.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}
