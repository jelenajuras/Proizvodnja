<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('ormar_id');
			$table->date('datum')->nullable($value = true);
			$table->string('rijeseno1')->nullable($value = true);
			$table->string('koment_mp')->nullable($value = true);
			$table->string('rijeseno2')->nullable($value = true);
			$table->string('koment_orm')->nullable($value = true);
			$table->string('rijeseno3')->nullable($value = true);
			$table->string('koment_vod')->nullable($value = true);
			$table->string('rijeseno4')->nullable($value = true);
			$table->string('koment_ozn')->nullable($value = true);
			$table->string('rijeseno5')->nullable($value = true);
			$table->string('koment_slMp')->nullable($value = true);
			$table->string('rijeseno6')->nullable($value = true);
			$table->string('koment_oznMp')->nullable($value = true);
			$table->string('rijeseno7')->nullable($value = true);
			$table->string('koment_ozic')->nullable($value = true);
			$table->string('rijeseno8')->nullable($value = true);
			$table->string('koment_dok')->nullable($value = true);
			$table->string('rijeseno9')->nullable($value = true);
			$table->string('koment_isp')->nullable($value = true);
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
       Schema::dropIfExists('productions');
    }
}
