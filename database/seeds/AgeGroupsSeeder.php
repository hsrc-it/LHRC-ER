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
            'englsih_name' => 'Child [0-12]',
            'arabic_name' => 'أطفال [0-12]',
            'created_at' => today()
          ),
          array(
            'englsih_name' => 'Adolescent [13-18]',
            'arabic_name' => 'مراهقين[13-18]',
            'created_at' => today()
          ),
          array(
            'englsih_name' => 'Adults [19-64]',
            'arabic_name' => 'بالغين [19-64]',
            'created_at' => today()
          ),
          array(
            'englsih_name' => 'Elderly [65+]',
            'arabic_name' => 'كبار السن [+65]',
            'created_at' => today()
          )
        );
          DB::table('age_groups')->insert($ageGroups);
    }
}
