<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('category')->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('sleeve_type')->nullable();
            $table->string('style')->nullable();
            $table->string('gender')->nullable();
            $table->string('production_country')->nullable();
            $table->string('weight')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
