<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug_name')->unique();
            $table->string('company_name', 255)->nullable();
            $table->string('cover_photo', 255)->nullable();
            $table->string('profile_photo', 255)->nullable();
            $table->longText('bio')->nullable();
            $table->string('country')->nullable();
            $table->string('office_address')->nullable();
            $table->string('industry')->nullable();
            $table->dateTime('establishment_date')->nullable();
            $table->string('project_level')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('startups');
    }
}
