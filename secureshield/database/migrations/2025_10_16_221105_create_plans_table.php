<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Table with at least 5 fields as required by the assignment.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Free, Basic, Premium, Enterprise
            $table->text('description');
            $table->decimal('price', 10, 2); // Monthly price
            $table->integer('devices_limit'); // Max devices protected
            $table->boolean('real_time_protection')->default(false);
            $table->boolean('cloud_backup')->default(false);
            $table->boolean('vpn_included')->default(false);
            $table->boolean('priority_support')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
