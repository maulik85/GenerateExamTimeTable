<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectiveGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('elective_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('offered_subjects_in_group')->nullable();
            $table->integer('max_subjects_allowed')->nullable();
            $table->integer('min_subjects_required')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
