<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Drop the table if it exists
        Schema::dropIfExists('obituaries');

        if (!Schema::hasTable('users')) {
            throw new \Exception('Users table must exist before creating obituaries table.');
        }

        Schema::create('obituaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->date('date_of_birth');
            $table->date('date_of_death');
            $table->text('biography');
            $table->string('image_path')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();

            try {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            } catch (\Exception $e) {
                Schema::dropIfExists('obituaries');
                throw $e;
            }
        });
    }

    public function down()
    {
        Schema::dropIfExists('obituaries');
    }
};