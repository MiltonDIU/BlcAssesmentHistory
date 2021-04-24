<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('short_name');
            $table->string('slug')->unique();
            $table->string('is_active');
            $table->longText('about')->nullable();
            $table->unsignedBigInteger('faculty_id');
            $table->foreign('faculty_id', 'faculty_fk_3762079')->references('id')->on('faculties');
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
        Schema::dropIfExists('departments');
    }
}
