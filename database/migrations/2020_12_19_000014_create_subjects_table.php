<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('code');
            $table->string('category')->nullable();
            $table->string('type');
            $table->integer('credits');
            $table->string('classroom_hours')->nullable();
            $table->string('tutorial_hours')->nullable();
            $table->string('lab_hours')->nullable();
            $table->string('theory_exam_hours')->nullable();
            $table->string('practical_exam_hours')->nullable();
            $table->integer('total_marks')->nullable();
            $table->integer('total_passing_marks')->nullable();
            $table->integer('theory_intl_marks')->nullable();
            $table->integer('theory_intl_passing_marks')->nullable();
            $table->integer('theory_ext_marks')->nullable();
            $table->integer('theory_ext_passing_marks')->nullable();
            $table->integer('practical_intl_marks')->nullable();
            $table->integer('practical_intl_passing_marks')->nullable();
            $table->integer('practical_ext_marks')->nullable();
            $table->integer('practical_ext_passing_marks')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('year')->nullable();
            $table->boolean('elective')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
