<?php

use Illuminate\Database\Seeder;

class AllData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'PHP'],
            ['name' => 'JAVA'],
            ['name' => 'C++'],
            ['name' => 'C'],
            ['name' => 'GoLang'],
            ['name' => 'Ruby'],
            ['name' => 'Javascript'],
            ['name' => 'Angular'],
            ['name' => 'AngularJS'],
            ['name' => 'NodeJS'],
        ]);
    }
}
