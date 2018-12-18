<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude', 9, 6);
            $table->string('notes')->default('');
            $table->unsignedInteger('bike_id');
            $table->timestamps();

            $table->foreign('bike_id')->references('id')->on('bikes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
