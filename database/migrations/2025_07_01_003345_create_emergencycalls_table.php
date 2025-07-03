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
        Schema::create('emergencycalls', function (Blueprint $table) {
            $table->id();
            $table->string('caller_name');
            $table->string('caller_phone');
            $table->dateTime('date_time');
            $table->string('status')->default('unsolved');
            $table->string('case');
            $table->text('description');
            $table->boolean('line_1')->default(false)->comment('Line 1 status');
            $table->boolean('line_2')->default(false)->comment('Line 2 status');
            $table->boolean('landline')->default(false)->comment('Landline status');
            $table->boolean('ptt')->default(false)->comment('PTT status');
            $table->text('action_taken');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencycalls');
    }
};
