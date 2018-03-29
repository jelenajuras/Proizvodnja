<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteCabinetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinets', function (Blueprint $table) {
            $table->unsignedInteger('id');
			$table->unsignedInteger('projekt_id');
			$table->string('proizvodjac');
			$table->string('naziv');
			$table->string('velicina');
			$table->string('tip');
			$table->string('model');
			$table->string('materijal');
			$table->string('izvedba');
			$table->string('napon')->nullable($value = true);
			$table->string('struja')->nullable($value = true);
			$table->string('prekidna_moc')->nullable($value = true);
			$table->string('sustav_zastite')->nullable($value = true);
			$table->string('ip_zastita')->nullable($value = true);
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
        Schema::dropIfExists('cabinets');
    }
}
