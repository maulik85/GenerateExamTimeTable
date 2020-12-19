<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectiveGroupSubjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('elective_group_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_id_fk_2823215')->references('id')->on('subjects')->onDelete('cascade');
            $table->unsignedBigInteger('elective_group_id');
            $table->foreign('elective_group_id', 'elective_group_id_fk_2823215')->references('id')->on('elective_groups')->onDelete('cascade');
        });
    }
}
