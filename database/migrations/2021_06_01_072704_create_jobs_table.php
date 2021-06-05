<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recruiter_id');
            $table->string('name');
            $table->enum('type', ['onsite', 'freelance', 'remote']);
            $table->unsignedInteger('slot')->default(1);
            $table->text('description')->nullable();
            $table->boolean('is_open');
            $table->timestamps();
            $table->date('expired_at')->nullable();

            $table->foreign('recruiter_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
