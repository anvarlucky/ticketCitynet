<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
		    $table->bigInteger('organization_id')->unsigned()->index();
            $table->string('contacts');
		    $table->bigInteger('priority_id')->unsigned()->index();
            $table->bigInteger('department_id')->unsigned()->index();
		    $table->bigInteger('user_id')->unsigned()->index();
		    $table->bigInteger('work_id')->unsigned()->index();
		    $table->bigInteger('status_id')->unsigned()->index();
		    $table->integer('is_active');
		    $table->dateTime('deadline');
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
        Schema::dropIfExists('tasks');
    }
}
