<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'title',
        'slug',
        'input_type',
        'group',
        'content',
    ];
    public $timestamps = true;

    /**
     * Get a setting value by slug
     *
     * @param string $slug
     * @return mixed
     */
    public static function getContentBySlug(string $slug): mixed
    {
        $setting = self::where('slug', $slug)->first();
        return $setting?->content;
    }
}
