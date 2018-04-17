<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('preparations', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('ormar_id');
			$table->date('datum')->nullable($value = true);
			$table->string('rijeseno1')->nullable($value = true);
			$table->string('koment_3p')->nullable($value = true);
			$table->string('rijeseno2')->nullable($value = true);
			$table->string('koment_3pOd')->nullable($value = true);
			$table->string('rijeseno3')->nullable($value = true);
			$table->string('koment_komax')->nullable($value = true);
			$table->string('rijeseno4')->nullable($value = true);
			$table->string('koment_perf')->nullable($value = true);
			$table->string('rijeseno5')->nullable($value = true);
			$table->string('koment_od')->nullable($value = true);
			$table->string('rijeseno6')->nullable($value = true);
			$table->string('koment_exp')->nullable($value = true);
			$table->string('rijeseno7')->nullable($value = true);
			$table->string('koment_pr')->nullable($value = true);
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
        Schema::dropIfExists('preparations');
    }
}
