<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LelekszamSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('lelekszam')->truncate();

        $path = storage_path('app/data/lelekszam.txt');
        $lines = preg_split('/\r\n|\r|\n/', trim(file_get_contents($path)));
        array_shift($lines);

        $batch = [];
        foreach ($lines as $line) {
            $data = explode("\t", $line);
            $batch[] = [
                'varosid' => (int)$data[0],
                'ev' => (int)$data[1],
                'no' => (int)$data[2],
                'osszesen' => (int)$data[3],
            ];

            if (count($batch) >= 200) {
                DB::table('lelekszam')->insert($batch);
                $batch = [];
            }
        }
        if (!empty($batch)) {
            DB::table('lelekszam')->insert($batch);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}