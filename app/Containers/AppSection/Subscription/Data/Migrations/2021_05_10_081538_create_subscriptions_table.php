<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plan_id')->constrained()->onDelete('cascade'); // foreignkey for other container table
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique(); // foreignkey for other container table

            $table->date('trial_ends_at')->nullable();
            $table->date('ends_at')->nullable();
            //  Razorpay Payment gateway
            $table->string('payment_id')->nullable();
            $table->string('order_id')->nullable();
            $table->integer('sms_count')->nullable()->default(0);

            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
}
