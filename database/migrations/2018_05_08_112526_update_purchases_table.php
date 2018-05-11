<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('purchases', function (Blueprint $table) {
            $table->date('datum1')->nullable($value = true);
			$table->date('datum2')->nullable($value = true);
			$table->date('datum3')->nullable($value = true);
			$table->date('datum4')->nullable($value = true);
			$table->date('datum5')->nullable($value = true);
			$table->date('datum6')->nullable($value = true);
			$table->date('datum7')->nullable($value = true);
			$table->string('naruceno1')->nullable($value = true);
			$table->string('naruceno2')->nullable($value = true);
			$table->string('naruceno3')->nullable($value = true);
			$table->string('naruceno4')->nullable($value = true);
			$table->string('naruceno5')->nullable($value = true);
			$table->string('naruceno6')->nullable($value = true);
			$table->string('naruceno7')->nullable($value = true);
			$table->string('koment_PLC')->nullable($value = true);
			$table->string('naruceno8')->nullable($value = true);
			$table->string('rijeseno8')->nullable($value = true);
			$table->date('datum8')->nullable($value = true);
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
