<?php

namespace App\Http\Controllers;

use App\Models\Megye;
use Illuminate\Http\Request;

class VarosokController extends Controller
{
    public function index(Request $request)
    {
        // Összes megye + települések száma (varosok tábla)
        $megyek = Megye::withCount('varosok')->get();

        $kivalasztottMegye = null;
        $varosok = collect();

        if ($request->filled('megyeid')) {
            $kivalasztottMegye = Megye::findOrFail($request->megyeid);

            // MINDENKI a varosok táblából + legutóbbi népesség
            $varosok = $kivalasztottMegye->varosok()
                ->with('legutolsoLelekszam')
                ->get();
        }

        return view('adatbazis', compact('megyek', 'kivalasztottMegye', 'varosok'));
    }
}