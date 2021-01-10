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
            $table->decimal('parameter',10,3)->default('0.02');
            $table->integer('method')->default('1');
            $table->integer('percentquota')->default('10');
            $table->integer('numberquota')->default('20');
            $table->biginteger('budgetquota')->default('100000000');
            $table->integer('allocatedbudget')->default('0');
            $table->decimal('sr',20,7)->nullable()->default(NULL);
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
