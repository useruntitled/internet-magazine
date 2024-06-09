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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('brand_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('category_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('slug', 80)->unique();

            $table->string('name', 80);

            $table->string('description', 200);

            $table->string('image', 120)->nullable()->default(null);

            $table->integer('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
