<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studenttbl', function (Blueprint $table) {
            $table->id();
            $table->string('st_name');
            $table->string('st_address');
            $table->string('e_mail');
            $table->string('mo_num');
            // $table->foreign('course_id')->references('id')->on('courses');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studenttbl');
    }
};
