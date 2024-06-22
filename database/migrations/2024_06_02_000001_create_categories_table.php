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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();

            $table->string('name', 120);

            $table->string('description', 200);

            $table->foreignId('parent_id')->nullable()->default(null)->constrained('categories');

            $table->tinyInteger('nesting_level')->nullable()->default(1);

            $table->string('icon', 120)->nullable()->default(null);
            $table->string('preview_image')->nullable()->default(null);
            $table->string('banner')->nullable()->default(null);

            $table->boolean('navigation_only')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
