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
        Schema::create('issuances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date');
            $table->string('reference_no');
            $table->string('category')->nullable();
            $table->string('outcome')->nullable();
            $table->string('type');
            $table->string('url_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issuances');
    }
};
