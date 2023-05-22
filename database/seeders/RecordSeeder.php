<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Record::truncate();
        for($i = 0; $i < 10; $i++) {
            $newRecord = new Record();
            $newRecord->title = $faker->sentence(3);
            $newRecord->slug = Str::slug($newRecord->title, '-');
            $newRecord->creation_date = $faker->dateTime();
            $newRecord->record_description = $faker->text(500);
            $newRecord->completed = $faker->boolean();
            
            $newRecord->save();
        }
    }
}
