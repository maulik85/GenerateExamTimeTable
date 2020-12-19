<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamAvailableDaysTable extends Migration
{
    public function up()
    {
        Schema::create('exam_available_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('exam_start_date');
            $table->date('day_1')->nullable();
            $table->date('day_2')->nullable();
            $table->date('day_3')->nullable();
            $table->date('day_4')->nullable();
            $table->date('day_5')->nullable();
            $table->date('day_6')->nullable();
            $table->date('day_7')->nullable();
            $table->date('day_8')->nullable();
            $table->date('day_9')->nullable();
            $table->date('day_10')->nullable();
            $table->date('day_11')->nullable();
            $table->date('day_12')->nullable();
            $table->date('day_13')->nullable();
            $table->date('day_14')->nullable();
            $table->date('day_15')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
