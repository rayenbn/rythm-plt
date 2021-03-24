<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo', 255)->nullable();
            $table->string('cover_photo', 255)->nullable();
            $table->longText('bio')->nullable();
            $table->string('profession');
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('residence_location')->nullable();
            $table->string('school')->nullable();
            $table->string('website_url')->nullable();
            $table->string('linked_url')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('ing_url')->nullable();
            $table->string('github_url')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
