<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeTablesTable extends Migration
{
    public function up()
    {
        Schema::table('time_tables', function (Blueprint $table) {
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id', 'program_fk_2823109')->references('id')->on('programs');
            $table->unsignedBigInteger('exam_available_days_id')->nullable();
            $table->foreign('exam_available_days_id', 'exam_available_days_fk_2823163')->references('id')->on('exam_available_days');
            $table->unsignedBigInteger('academic_year_id')->nullable();
            $table->foreign('academic_year_id', 'academic_year_fk_2823177')->references('id')->on('academic_years');
        });
    }
}
