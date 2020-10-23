<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_declarations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->string('q1a')->nullable();
            $table->string('q1b')->nullable();
            $table->string('q1c')->nullable();
            $table->string('q1d')->nullable();
            $table->string('q1e')->nullable();
            $table->string('q1f')->nullable();
            $table->string('q1g')->nullable();
            $table->string('q2')->nullable();
            $table->string('q3')->nullable();
            $table->string('q4')->nullable();
            $table->string('q5')->nullable();
            $table->string('q5a')->nullable();
            $table->string('q6')->nullable();
            $table->string('q7')->nullable();
            $table->timestamps();
            $table->foreign('profile_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_declarations');
    }
}
