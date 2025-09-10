<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Blog extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'thumbnail',
        'title',
        'desc',
        'slug',
        'category',
        'content',
        'url',
        'is_active',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public $timestamps = true;

    protected $table = 'blogs';


    /**
     * Boot the model.
     */
}
