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
        Schema::create('access_royal_courts', function (Blueprint $table) {
            $table->id();
            $table->string('VehiclePlate')->unique();
            $table->string('VehicleType');
            $table->datetime('AccessDateTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_royal_courts');
    }
};
