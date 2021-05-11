<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomereventsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // foreignkey for other container table
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // foreignkey for other container table
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // foreignkey for other container table

            $table->date('event_date')->nullable();
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_events');
    }
}
