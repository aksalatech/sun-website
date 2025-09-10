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
        Schema::table('msslides', callback: function (Blueprint $table) {
            $table->enum('wording_position', ['left','center', 'right'])->default('left')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('msslides', function (Blueprint $table) {
            $table->dropColumn('wording_position');
        });
    }
};
