<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramSubjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('program_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_id_fk_2823141')->references('id')->on('subjects')->onDelete('cascade');
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id', 'program_id_fk_2823141')->references('id')->on('programs')->onDelete('cascade');
        });
    }
}
