<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique(); // foreignkey for User container table

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('brand_name')->nullable();

            $table->string('phone')->nullable();
            $table->text('logo')->nullable();
            $table->longText('address')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->date('trial_ends_at')->nullable();

            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
}
