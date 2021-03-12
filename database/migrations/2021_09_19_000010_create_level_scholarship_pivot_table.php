<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelScholarshipPivotTable extends Migration
{
    public function up()
    {
        Schema::create('level_scholarship', function (Blueprint $table) {
            $table->unsignedInteger('scholarship_id');
            $table->foreign('scholarship_id', 'scholarship_id_fk_2220843')->references('id')->on('scholarships')->onDelete('cascade');
            $table->unsignedInteger('level_id');
            $table->foreign('level_id', 'level_id_fk_2220843')->references('id')->on('levels')->onDelete('cascade');
        });
    }
}
