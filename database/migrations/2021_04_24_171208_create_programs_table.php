<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('short_name')->nullable();
            $table->string('slug')->unique();
            $table->string('is_active');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
