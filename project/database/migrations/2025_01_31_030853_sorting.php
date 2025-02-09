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
        Schema::create('obituaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_birth');
            $table->date('date_of_death');
            $table->text('biography')->nullable();
            $table->timestamps();
        });

        Schema::create('funerals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obituary_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->string('location');
            $table->text('details')->nullable();
            $table->timestamps();
        });

        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funeral_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->string('attendee_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('funerals');
        Schema::dropIfExists('obituaries');
    }
};
