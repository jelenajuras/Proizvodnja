<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->unsignedInteger('id');
			$table->integer('investitor_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->string('naziv')->nullable($value = true);
			$table->string('objekt')->nullable($value = true);
			$table->integer('user_id')->nullable($value = true);
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
        Schema::dropIfExists('projects');
    }
}
