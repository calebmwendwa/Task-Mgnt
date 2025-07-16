<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskToDoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_to_do', function (Blueprint $table) {
            $table->increments('id');
            $table->text('task');
            $table->date('date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('task_id')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('estimated_hours')->nullable();
            $table->string('priority');
            $table->integer('is_completed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_to_do');
    }
}
