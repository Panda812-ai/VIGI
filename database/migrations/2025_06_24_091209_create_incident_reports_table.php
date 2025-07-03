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
        Schema::create('incident_reports', function (Blueprint $table) {
           $table->id();
            $table->string('ir_number')->unique();       
            $table->string('location');
            $table->string('incident_type');
            $table->dateTime('incident_date_time')->nullable();
            $table->enum('status', ['in_progress', 'closed'])->default('in_progress');
            $table->string('injuries');
            $table->string('injuries_details');
            $table->text('property_damage')->nullable();
            $table->string('damage_type')->nullable();
            $table->string('reporter_name');
            $table->string('status_reporter')->nullable();
            $table->string('reporter_id_no');
            $table->string('reporter_contact_no');
            $table->string('reporting_method')->nullable();
            $table->text('involved_name')->nullable();
            $table->string('involved_id_no')->nullable();
            $table->string('involved_contact_no')->nullable();
            $table->string('involved_relation')->nullable();
            $table->text('incident_details')->nullable();
            $table->text('response_and_action_taken')->nullable();
            $table->text('recommendations')->nullable();
            $table->json('images')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_reports');
    }
};
