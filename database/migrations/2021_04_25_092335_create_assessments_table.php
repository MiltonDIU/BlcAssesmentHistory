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
            $table->string('course_code');
            $table->string('course_name');
            $table->string('section_and_section_ids');
            $table->string('blc_course_link');
            $table->string('assessment_question_link');
            $table->string('assessment_link');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_3766660')->references('id')->on('users');
            $table->unsignedBigInteger('faculty_id');
            $table->foreign('faculty_id', 'faculty_fk_3766655')->references('id')->on('faculties');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id', 'department_fk_3766656')->references('id')->on('departments');
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id', 'program_fk_3766657')->references('id')->on('programs');
            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id', 'semester_fk_3766658')->references('id')->on('semesters');
            $table->unsignedBigInteger('exam_type_id');
            $table->foreign('exam_type_id', 'exam_type_fk_3766659')->references('id')->on('exam_types');

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
