<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTrainingsSteps extends Migration
{
    public function up()
    {
        Schema::create('user_training_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('step_id');
            $table->timestamps();
            $table->foreign('training_id')->references('id')->on('trainings');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('step_id')->references('id')->on('training_steps');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_training_steps');
    }
}
