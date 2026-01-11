<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MuscleGroup;

class MuscleGroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            'Pecho',
            'Espalda',
            'Piernas',
            'Brazos',
            'Hombros',
            'Abdomen',
        ];

        foreach ($groups as $group) {
            MuscleGroup::create(['name' => $group]);
        }
    }
}
