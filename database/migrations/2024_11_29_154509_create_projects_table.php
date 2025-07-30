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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('users');
			$table->enum('status', ['1', '0']);
			$table->decimal('estimated_time', 5, 2)->nullable();
			$table->decimal('time_spent', 5, 2)->nullable();
			$table->text('comment')->nullable();;
			$table->date('start_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
