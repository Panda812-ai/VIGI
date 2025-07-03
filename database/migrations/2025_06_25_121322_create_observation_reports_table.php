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
        Schema::create('observation_reports', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('camera_relationship_id')->nullable();
             $table->string('Shift')->nullable();
             $table->string('Type')->nullable();
             $table->text('Description')->nullable();
             $table->string('Status')->default('unsolved');
             $table->string('Notes')->nullable();
             $table->string('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observation_reports');
    }
};
