<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('teacherid')->nullable();
            $table->string('department');
            $table->string('program');
            $table->string('semester');
            $table->string('course_code');
            $table->string('course_name');
            $table->string('section_and_section_ids');
            $table->string('blc_course_link');
            $table->string('assessment_question_link');
            $table->string('assessment_link');
            $table->string('erp_course');
            $table->string('faculty_id');
            $table->unsignedBigInteger('exam_type_id');
            $table->foreign('exam_type_id', 'exam_type_fk_3766659')->references('id')->on('exam_types');
            $table->foreign('user_id', 'user_fk_3766660')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
