<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrainingSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_id');
            $table->integer('step_num');
            $table->string('step_name');
            $table->longText('media');
            $table->longText('description');
            $table->timestamps();

            $table->foreign('training_id')->references('id')->on('trainings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
