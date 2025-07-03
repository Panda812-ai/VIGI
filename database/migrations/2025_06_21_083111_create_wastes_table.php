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
        Schema::create('wastes', function (Blueprint $table) {
            $table->id();
            $table->string('camera_no');
            $table->text('description')->comment('Description of the waste');
            $table->enum('status', ['solved', 'unsolved'])->default('unsolved')->comment('Status of the waste');
            $table->string('notes')->nullable()->comment('Additional notes about the waste');
            $table->string('image')->nullable()->comment('Image URL of the waste');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wastes');
    }
};
