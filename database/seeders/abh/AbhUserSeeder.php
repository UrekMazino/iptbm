<?php

namespace Database\Seeders\abh;

use App\Models\AbhUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AbhUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        AbhUser::create([
            'abh_profiles_id'=>'1',
            'name' => 'Andy Mark Servania',
            'component' => 'ABH',
            'email' => 'rdesystem@capsu.edu.ph',
            'password' =>Hash::make('Staff12345'),
        ]);
    }
}
