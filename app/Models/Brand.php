<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Brand extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'logo',
        'logo_dark',
        'url',
        'background',
        'is_active',
    ];

    public $timestamps = true;


    /**
     * Boot the model.
     */

}
