<?php

use App\Enum\CameraStatus;
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
        Schema::create('camera_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('camera_no')->unique();
            $table->string('camera_type');
            $table->enum('status', array_column(CameraStatus::cases(), 'value'))->default(CameraStatus::OFFLINE->value);
            $table->string('ticket_no')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camera_statistics');
    }
};
