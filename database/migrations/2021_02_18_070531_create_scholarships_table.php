<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('scholar_type')->nullable();
            $table->string('scholar_duration')->nullable();
            $table->string('scholar_coverage')->nullable();
            $table->dateTime('starting_date')->nullable();
            $table->string('teaching_lang')->nullable();
            $table->string('original_tuition')->nullable();
            $table->longText('desc')->nullable();
            $table->unsignedInteger('university_id')->nullable();
            $table->foreign('university_id', 'university_fk_2220842')->references('id')->on('universities');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarships');
    }
}
