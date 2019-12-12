<?php

use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->delete();
        $designation=['Senior Developer','Mid-Level Developer','Junior Developer','Intern'];
        foreach($designation as $des){
            DB::table('designations')->insert(['designation'=>$des]);
        }
    }
}
