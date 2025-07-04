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
        Schema::create('event_reservation_add_ons', function (Blueprint $table) {
            $table->uuid('event_reservation_id');
            $table->uuid('event_add_on_id');
            $table->foreign('event_reservation_id')->references('id')->on('event_reservations')->onDelete('cascade');
            $table->foreign('event_add_on_id')->references('id')->on('event_add_ons')->onDelete('cascade');
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
