<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Enum\Status;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::table('observation_reports', function (Blueprint $table) {
                $table->dropColumn('status');
             $table->enum('status', array_column(Status::cases(), 'value'))->default(Status::UNSOLVED->value);

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};

