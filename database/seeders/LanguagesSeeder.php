<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'Arabic',
                'description' => 'Arabic is a Semitic language spoken by over 420 million people worldwide.',
                'status' => 'active',
            ],
            [
                'name' => 'French',
                'description' => 'French is a Romance language spoken by over 300 million people worldwide.',
                'status' => 'active',
            ],
            [
                'name' => 'English',
                'description' => 'English is a West Germanic language spoken by over 1.5 billion people worldwide.',
                'status' => 'active',
            ],
            [
                'name' => 'Spanish',
                'description' => 'Spanish is a Romance language spoken by over 500 million people worldwide.',
                'status' => 'active',
            ],
            [
                'name' => 'German',
                'description' => 'German is a West Germanic language spoken by over 100 million people worldwide.',
                'status' => 'active',
            ],
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
} 