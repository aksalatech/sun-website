<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->unique()->after('desc');
            $table->string('category')->nullable()->after('slug');
            $table->text('content')->nullable()->after('category');
            $table->string('meta_title')->nullable()->after('content');
            $table->string('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'category',
                'content',
                'meta_title',
                'meta_description',
                'meta_keywords'
            ]);
        });
    }
};
