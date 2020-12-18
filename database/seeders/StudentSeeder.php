<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0;$i<10;$i++){

            $f_name= $faker->firstName;
            $l_name=$faker->lastName;
            $m_names=$f_name." ".$l_name;
            $initials= $f_name[0]." ".$l_name[0];
            $full_name=$f_name." ".$m_names." ".$l_name;
            $gender=$faker->randomElement($array = array ('male', 'female'));
            $year=$faker->randomElement($array = array('2017','2018','2019','2020'));

            DB::table('students')->insert(
                array(
    
                    ['reg_no'=> 'F'. $faker->unique()->numerify('#########'),
                    'user_id'=>$faker->unique()->numerify('##'),
                    'title'=> $faker->title($gender),
                    'first_name'=> $f_name,
                    'middle_names'=> $m_names,
                    'last_name'=> $l_name,
                    'full_name'=> $full_name,
                    'initials'=> $initials,
                    'dob'=>$faker->dateTimeBetween('1980-01-01', '2000-12-31'),
                    'gender'=> $gender,
                    'citizenship'=>'Sri Lankan',
                    'nic_old'=>$faker->unique()->numerify('#########').'V',
                    'nic_new'=>$faker->unique()->numerify('############'),
                    'postal'=>'K-L'.$faker->unique()->numerify('######'),
                    'passport'=>$faker->unique()->numerify('##########'),
                    'education'=>$faker->randomElement($array = array ('Bachelor\'s Degree' ,'GCE Advanced Level', 'GCE Ordinary Level')),
                    'permanent_house'=>'No: '.$faker->buildingNumber,
                    'permanent_address_line1'=>$faker->streetName,
                    'permanent_address_line2'=>$faker->streetName,
                    'permanent_address_line3'=>$faker->streetName,
                    'permanent_address_line4'=>$faker->streetName,
                    'permanent_city'=>$faker->city,
                    'permanent_country'=>$faker->country,
                    'current_house'=>'No: '.$faker->buildingNumber,
                    'current_address_line1'=>$faker->streetName,
                    'current_address_line2'=>$faker->streetName,
                    'current_address_line3'=>$faker->streetName,
                    'current_address_line4'=>$faker->streetName,
                    'current_city'=>$faker->city,
                    'current_country'=>$faker->country,
                    'telephone'=>'0'.$faker->unique()->numerify('#########'),
                    'designation'=>$faker->jobTitle,
                    'reg_year'=>$year,
                    'created_at'=>$faker->dateTimeBetween('2020-11-01', '2020-11-30'),
                    'updated_at'=> '2020-11-30 13:14:56']
    
                )
            );
        }

    }
}
