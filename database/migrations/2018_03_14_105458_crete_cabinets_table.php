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
            $table->increments('id');
			$table->unsignedInteger('brOrmara');
			$table->unsignedInteger('projektirao_id');
			$table->unsignedInteger('odobrio_id');
			$table->unsignedInteger('projekt_id');
			$table->date('datum_isporuke');
			$table->string('proizvodjac');
			$table->string('proizvodjacOpr')->nullable($value = true);
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
			$table->string('ulaz_kabela')->nullable($value = true);
			$table->string('oznake')->nullable($value = true);
			$table->string('logo')->nullable($value = true);
			$table->string('napomena')->nullable($value = true);
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
