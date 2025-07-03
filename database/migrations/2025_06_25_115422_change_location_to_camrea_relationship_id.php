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
        Schema::table('incident_reports', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->unsignedBigInteger('camera_relationship_id')->nullable()->after('id');
            $table->foreign('camera_relationship_id')
                ->references('id')
                ->on('cameras')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incident_reports', function (Blueprint $table) {
            //
        });
    }
};
