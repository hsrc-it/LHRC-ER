<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('topics')->delete();

      $topics = array(
          array(
              'english_name' => 'Physical Activity',
              'Arabic_name' => 'النشاط البدني',
              'created_at' => today()
          ),
          array(
              'english_name' => 'Sedentary Behavior ',
              'Arabic_name' => 'السلوك الخامل',
              'created_at' => today()
          ),
          array(
              'english_name' => 'Physical Fitness ',
              'Arabic_name' => 'اللياقة البدنية',
              'created_at' => today()
          ),
          array(
              'english_name' => 'Nutrition Nutrition ',
              'Arabic_name' => 'التغذية',
              'created_at' => today()
          ),
          array(
              'english_name' => 'Mental Health',
              'Arabic_name' => 'الصحة الذهنية والنفسية',
              'created_at' => today()
          ),
          array(
              'english_name' => 'Sleep and Health',
              'Arabic_name' => 'النوم والصحة',
              'created_at' => today()
          ),
          array(
              'english_name' => 'Body Composition and Weight Management ',
              'Arabic_name' => 'التكوين الجسمي والتحكم بالوزن',
              'created_at' => today()
          ),
          array(
              'english_name' => "Children's and Adolescents' Health",
              'Arabic_name' => 'صحة الأطفال والمراهقين',
              'created_at' => today()
          ),
          array(
              'english_name' => "Women's Health",
              'Arabic_name' => 'صحة المرأة',
              'created_at' => today()
          ),
          array(
              'english_name' => 'Other',
              'Arabic_name' => 'أخرى',
              'created_at' => today()
          )
        );
          DB::table('topics')->insert($topics);
    }
}
