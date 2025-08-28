<?php

namespace Database\Seeders;

use App\Models\SubjectGroup;
use Illuminate\Database\Seeder;

class SubjectGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjectGroups = [
            [
                'name' => 'High School',
                'description' => 'lycée',
                'status' => 'active',
            ],
            [
                'name' => 'Middle School',
                'description' => 'collége',
                'status' => 'active',
            ],
            [
                'name' => 'Primary school',
                'description' => 'primaire',
                'status' => 'active',
            ],
        ];

        foreach ($subjectGroups as $group) {
            SubjectGroup::create($group);
        }
    }
} 