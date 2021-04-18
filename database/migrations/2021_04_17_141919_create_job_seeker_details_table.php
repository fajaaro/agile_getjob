<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSeekerDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('job_seeker_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedSmallInteger('total_works_experience')->default(0);
            $table->string('work_places_experience')->nullable();
            $table->string('last_education_level');
            $table->string('last_education_name');
            $table->string('languages');
            $table->string('resume_url')->nullable();
            $table->text('skills');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_seeker_details');
    }
}
