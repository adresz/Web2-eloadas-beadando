<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function topvarosok()
    {
          $aggregated = DB::table('lelekszam')
        ->where('ev', 2019)
        ->select('varosid', DB::raw('SUM(osszesen) as total_population'))
        ->groupBy('varosid');

        $data = DB::table('varos')
    ->joinSub($aggregated, 'agg', function($join){
        $join->on('varos.id', '=', 'agg.varosid');
    })
    ->select(
        DB::raw("CASE WHEN varos.megyeid = 10 THEN 'Budapest' ELSE varos.nev END as city"),
        DB::raw("SUM(agg.total_population) as population")
    )
    ->groupBy('city')
    ->orderByDesc('population')
    ->limit(10)
    ->get();

// 1️⃣ Labels és values készítése a Chart.js-hez
$labels = $data->pluck('city');       // városnevek
$values = $data->pluck('population'); // lakosság

        return view('diagram', compact('labels', 'values'));
    }
}
