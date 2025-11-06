<?php

namespace App\Http\Controllers;

use App\Models\Lelekszam;
use Illuminate\Http\Request;

class LelekszamController extends Controller
{
    public function index(Request $request)
    {
        $query = Lelekszam::query()
            ->select('*')
            ->selectRaw('osszesen - no AS ferfi'); // virtuális férfi mező

        // === KERESÉS ===
        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('varosid', 'like', "%{$search}%")
                ->orWhere('ev', 'like', "%{$search}%")
                ->orWhere('no', 'like', "%{$search}%")
                ->orWhere('osszesen', 'like', "%{$search}%")
                ->orWhereRaw('(osszesen - no) LIKE ?', ["%{$search}%"]);
            });
        }

        // === RENDEZÉS ===
        $sort = $request->query('sort');
        $dir = $request->query('dir', 'asc') === 'desc' ? 'desc' : 'asc';

        $allowedSorts = ['varosid', 'ev', 'no', 'ferfi', 'osszesen'];

        if ($sort && in_array($sort, $allowedSorts)) {
            if ($sort === 'ferfi') {
                $query->orderByRaw("(osszesen - no) " . ($dir === 'desc' ? 'DESC' : 'ASC'));
            } else {
                $query->orderBy($sort, $dir);
            }
        } else {
            $query->orderBy('varosid', 'asc')->orderBy('ev', 'asc');
        }

        // === LAPOZÁS + query string megőrzése ===
        $adatok = $query->paginate(15)->withQueryString();

        // FONTOS: add át a $sort és $dir változókat a nézetnek!
        return view('lelekszam.crud', compact('adatok'))
            ->with('sort', $sort ?? 'varosid')
            ->with('dir', $dir);
    }

    public function create()
    {
        return view('lelekszam.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'varosid' => 'required|integer|exists:varos,id', // <-- idegen kulcs validálás
            'ev' => 'required|integer|between:1900,2100',
            'no' => 'required|integer|min:0',
            'osszesen' => 'required|integer|min:0|gte:no',
        ]);

        Lelekszam::create($request->all());

        return redirect()
            ->route('lelekszam.index')
            ->with('success', 'Lélekszám adat sikeresen hozzáadva!');
    }

    public function edit(Lelekszam $lelekszam)
    {
        return view('lelekszam.edit', compact('lelekszam'));
    }

    public function update(Request $request, Lelekszam $lelekszam)
    {
        $request->validate([
            'varosid' => 'required|integer|min:1',
            'ev' => 'required|integer|between:1900,2100',
            'no' => 'required|integer|min:0',
            'osszesen' => 'required|integer|min:0|gte:no',
        ]);

        $lelekszam->update($request->all());

        return redirect()
            ->route('lelekszam.index')
            ->with('success', 'Adat sikeresen frissítve!');
    }

    public function destroy(Lelekszam $lelekszam)
    {
        $lelekszam->delete();

        return redirect()
            ->route('lelekszam.index')
            ->with('success', 'Adat törölve!');
    }
}
