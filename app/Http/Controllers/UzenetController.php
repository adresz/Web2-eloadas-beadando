<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uzenet;

class UzenetController extends Controller
{
    public function index()
    {
        $uzenetek = Uzenet::orderBy('created_at', 'desc')->paginate(10); // Legújabb elöl, oldalanként 10
        return view('uzenetek', compact('uzenetek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'email' => 'required|email',
            'uzenet' => 'required|string',
        ]);

        Uzenet::create($request->all());

        return redirect()->back()->with('success', 'Üzenet elküldve!');
    }

    // Ha részletek/törlés kell később, bővítheted
}