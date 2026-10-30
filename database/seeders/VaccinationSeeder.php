<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;


class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'patient_name' => 'Harry Potter',
                'purok'        => 'Purok 1',
                'vaccine'      => 'BCG',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-01-15',
                'status'       => 'Done',
            ],
            [
                'patient_name' => 'Hermione Granger',
                'purok'        => 'Purok 2',
                'vaccine'      => 'Pentavalent',
                'dose'         => '2nd dose',
                'scheduled_at' => '2026-03-10',
                'status'       => 'Done',
            ],
            [
                'patient_name' => 'Ron Weasley',
                'purok'        => 'Purok 3',
                'vaccine'      => 'OPV',
                'dose'         => 'Booster',
                'scheduled_at' => '2026-05-22',
                'status'       => 'Overdue',
            ],
            [
                'patient_name' => 'Albus Dumbledore',
                'purok'        => 'Purok 1',
                'vaccine'      => 'MMR',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-08-04',
                'status'       => 'Scheduled',
            ],
            [
                'patient_name' => 'Severus Snape',
                'purok'        => 'Purok 4',
                'vaccine'      => 'Anti-Flu',
                'dose'         => 'Annual',
                'scheduled_at' => '2026-10-12',
                'status'       => 'Scheduled',
            ],
            [
                'patient_name' => 'Luna Lovegood',
                'purok'        => 'Purok 2',
                'vaccine'      => 'Hepatitis B',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-05-05', //My Birthday Date 
                'status'       => 'Scheduled',
            ],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}