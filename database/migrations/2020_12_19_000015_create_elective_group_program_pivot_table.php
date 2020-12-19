<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectiveGroupProgramPivotTable extends Migration
{
    public function up()
    {
        Schema::create('elective_group_program', function (Blueprint $table) {
            $table->unsignedBigInteger('elective_group_id');
            $table->foreign('elective_group_id', 'elective_group_id_fk_2823207')->references('id')->on('elective_groups')->onDelete('cascade');
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id', 'program_id_fk_2823207')->references('id')->on('programs')->onDelete('cascade');
        });
    }
}
