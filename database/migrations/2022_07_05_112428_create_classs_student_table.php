<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasssStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classs_student', function (Blueprint $table) {
            $table->foreignId('classs_id')->references('id')->on('classses')->cascadeOnDelete();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classs_student');
    }
}
