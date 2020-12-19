<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegeProgramPivotTable extends Migration
{
    public function up()
    {
        Schema::create('college_program', function (Blueprint $table) {
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id', 'program_id_fk_2822731')->references('id')->on('programs')->onDelete('cascade');
            $table->unsignedBigInteger('college_id');
            $table->foreign('college_id', 'college_id_fk_2822731')->references('id')->on('colleges')->onDelete('cascade');
        });
    }
}
