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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('ttl')->default(86400);
            $table->bigInteger('soa_serial')->nullable();
            $table->integer('soa_refresh')->default(3600);
            $table->integer('soa_retry')->default(1800);
            $table->integer('soa_expire')->default(604800);
            $table->integer('soa_minimum')->default(86400);
            $table->string('soa_ns')->nullable();
            $table->string('soa_email')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
