<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'title',
        'path',
        'path_type',
        'icon',
        'order',
        'is_active'
    ];

    public $timestamps = true;
    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($menu) {
            if (!$menu->order) {
                $menu->order = static::max('order') + 1;
            }
        });
    }
}
