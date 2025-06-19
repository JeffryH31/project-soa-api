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
        Schema::create('event_reservations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('customer_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('pax')->default(0);
            $table->text('notes')->nullable();
            $table->decimal('total_price', 10, 2)->default(0);
            $table->enum('status', ['pending', 'dp1', 'dp2', 'paid', 'cancelled']);
            $table->uuid('event_space_id');
            $table->foreign('event_space_id')->references('id')->on('event_spaces')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_reservations');
    }
};
