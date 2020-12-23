<?php

use Illuminate\Database\Seeder;

class VariableSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variablesets')->insert(
            [
                'name' => 'Default Set',
                'parameter' => 0.02,
                'method' => 1,
                'percentquota' => 10,
                'numberquota' => 20,
                'budgetquota' => 100000000,
                'allocatedbudget' => 0,
            ]
        );
        
    }
}
