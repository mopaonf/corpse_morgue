<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('immediate_needs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('planning_for');
            $table->string('your_name');
            $table->string('your_email');
            $table->string('your_phone');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_death');
            $table->string('gender');
            $table->string('final_disposition');
            $table->string('visitation');
            $table->timestamps();

            // Add foreign key constraint separately
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('immediate_needs');
    }
};
