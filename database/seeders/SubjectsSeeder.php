<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [ 'name' => 'Arabic Language', 'description' => 'Langue Arabe', 'status' => 'active' ],
            [ 'name' => 'Islamic Education', 'description' => 'Instruction Islamique', 'status' => 'active' ],
            [ 'name' => 'French Language', 'description' => 'Langue Française', 'status' => 'active' ],
            [ 'name' => 'English Language', 'description' => 'Langue Anglaise', 'status' => 'active' ],
            [ 'name' => 'Espagnol Language', 'description' => 'Langue Espagnole', 'status' => 'active' ],
            [ 'name' => 'Allemand Language', 'description' => 'Langue Allmand', 'status' => 'active' ],
            [ 'name' => 'History & Geography', 'description' => 'Histoire-Géographie', 'status' => 'active' ],
            [ 'name' => 'Philosophy', 'description' => 'Philosophie', 'status' => 'active' ],
            [ 'name' => 'Mathematics', 'description' => 'Mathématiques', 'status' => 'active' ],
            [ 'name' => 'Physics-Chemistry', 'description' => 'Physique-Chimie', 'status' => 'active' ],
            [ 'name' => 'Life & Earth Sciences', 'description' => 'Sciences de la Vie et de la Terre', 'status' => 'active' ],
            [ 'name' => 'Economics & Statistics', 'description' => 'Économie et Statistique', 'status' => 'active' ],
            [ 'name' => 'Accounting', 'description' => 'Comptabilité', 'status' => 'active' ],
            [ 'name' => 'Law / Management', 'description' => 'Droit / Gestion', 'status' => 'active' ],
            [ 'name' => 'Informatics / Technology', 'description' => 'Informatique / Technologie', 'status' => 'active' ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
} 