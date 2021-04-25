<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('mobile');
            $table->string('gender')->nullable();
            $table->string('designation');
            $table->string('employee')->comment("it's employee id");
            $table->string('employee_type');
            $table->longText('about')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_3106458')->references('id')->on('users');
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
        Schema::dropIfExists('profiles');
    }
}
