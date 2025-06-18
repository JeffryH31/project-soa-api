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
         Schema::create('event_reservations_addons', function (Blueprint $table) {
            $table->uuid('event_package_id');
            $table->uuid('event_add_on_id');
            $table->foreign('event_package_id')->references('id')->on('event_packages')->onDelete('cascade');
            $table->foreign('event_add_on_id')->references('id')->on('event_add_ons')->onDelete('cascade');
            $table->primary(['event_package_id', 'event_add_on_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
