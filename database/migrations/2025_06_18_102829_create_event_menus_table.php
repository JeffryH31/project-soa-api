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
        Schema::create('event_menus', function (Blueprint $table) {
         $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 18, 2);
            $table->string('image')->nullable();
            $table->uuid('dish_category_id');
            $table->foreign('dish_category_id')->references('id')->on('dish_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_menus');
    }
};
