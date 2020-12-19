<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProgramsTable extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->foreign('faculty_id', 'faculty_fk_2822730')->references('id')->on('faculties');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->foreign('level_id', 'level_fk_2822732')->references('id')->on('levels');
        });
    }
}
