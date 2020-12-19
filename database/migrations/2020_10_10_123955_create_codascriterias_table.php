<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodascriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codascriterias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('weight');
            $table->decimal('weightnormal',20,3);
            $table->boolean('active');
            $table->boolean('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codascriterias');
    }
}
