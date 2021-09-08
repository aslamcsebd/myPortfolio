<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('image', 150);
            $table->string('date', 50);
            $table->string('skill', 150)->nullable();
            $table->string('link', 150)->nullable();
            $table->string('github', 150)->nullable();
            $table->text('description');
            $table->integer('orderBy');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('works');
    }
}
