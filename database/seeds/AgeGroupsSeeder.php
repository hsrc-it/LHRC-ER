<?php

use Illuminate\Database\Seeder;

class AgeGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('age_groups')->delete();

      $ageGroups = array(
          array(
              'age_group' => 'Child [0-12]',
              'created_at' => today()
          ),
          array(
            'age_group' => 'Adolescent [13-18]',
            'created_at' => today()
          ),
          array(
            'age_group' => 'Adults [19-64]',
            'created_at' => today()
          ),
          array(
            'age_group' => 'Elderly [65+]',
            'created_at' => today()
          )
        );
          DB::table('age_groups')->insert($ageGroups);
    }
}
