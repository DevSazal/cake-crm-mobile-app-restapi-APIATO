<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_event_id')->constrained()->onDelete('cascade'); // foreignkey for other container table
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // foreignkey for other container table
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // foreignkey for other container table
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // foreignkey for other container table

            $table->date('delivery_date')->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();

            $table->longText('note')->nullable();
            $table->string('cake_title')->nullable();
            $table->string('cake_size')->nullable();
            $table->string('phone');

            $table->longText('delivery_address')->nullable();
            $table->string('road_name')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('state_id')->nullable();

            $table->integer('status')->default(0);

            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
