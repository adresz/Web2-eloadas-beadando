<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VarosSeeder extends Seeder
{
    public function run(): void
    {
        // 1. KIKAPCSOLJUK A FOREIGN KEY-t
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2. TRUNCATE
        DB::table('varos')->truncate();

        // 3. ADATOK BETÖLTÉSE
        $path = storage_path('app/data/varos.txt');
        $lines = preg_split('/\r\n|\r|\n/', trim(file_get_contents($path)));
        array_shift($lines); // fejléc

        $batch = [];
        foreach ($lines as $line) {
            $data = explode("\t", $line);
            $batch[] = [
                'id' => (int)$data[0],
                'nev' => $data[1],
                'megyeid' => (int)$data[2],
                'megyeszekhely' => $data[3] == -1 ? 1 : 0,
                'megyeijogu' => $data[4] == -1 ? 1 : 0,
            ];

            if (count($batch) >= 100) {
                DB::table('varos')->insert($batch);
                $batch = [];
            }
        }
        if (!empty($batch)) {
            DB::table('varos')->insert($batch);
        }

        // 4. VISSZAKAPCSOLJUK
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}