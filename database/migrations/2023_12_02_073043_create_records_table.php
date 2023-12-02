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
        Schema::create('records', function (Blueprint $table) {
            $table->string('order_ID')->unique();
            $table->string('rider', 10);
            $table->string('passenger', 10);
            $table->boolean('go_or_leave');
            $table->dateTime('start_time_rider');
            $table->dateTime('end_time_rider');
            $table->dateTime('start_time_passenger');
            $table->dateTime('end_time_passenger');
            $table->boolean('success');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
