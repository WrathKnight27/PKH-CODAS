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
                'quota' => 10,
                'parameter' => 0.02,
            ]
        );
        
    }
}
