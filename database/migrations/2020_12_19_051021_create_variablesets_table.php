<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariablesetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variablesets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Default Set');
            $table->integer('quota')->default('10');
            $table->decimal('parameter',10,3)->default('0.02');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variablesets');
    }
}
