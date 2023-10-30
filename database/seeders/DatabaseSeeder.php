<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cup;
use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $primaryDevice = new Device();
        // $primaryDevice->uuid = \Illuminate\Support\Str::uuid();
        $primaryDevice->uuid='12345678';
        $primaryDevice->location = "Traverse: Protozone";
        $primaryDevice->capacity=2;
        $primaryDevice->cup_count=1;
        $primaryDevice->save();
        $firstCup = new Cup();
        $firstCup->identifier = '1';
        $firstCup->save();
        $secondCup = new Cup();
        $secondCup->identifier = '2';
        $secondCup->save();

        $firstUser= new User();
        $firstUser->name='Dana';
        $firstUser->university_id=1;
        $firstUser->credit=3;
        $firstUser->save();
        
        
        


    }
}
