<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MegyeSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('megye')->truncate();

        $path = storage_path('app/data/megye.txt');
        $lines = preg_split('/\r\n|\r|\n/', trim(file_get_contents($path)));
        array_shift($lines); // header

        foreach ($lines as $line) {
            $data = explode("\t", $line);
            DB::table('megye')->insert([
                'id' => (int)$data[0],
                'nev' => $data[1],
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}