<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // email, role, name
        return view('admin', compact('users')); // ← csak 'admin'
    }

    public function show($id)
    {
        $users = User::all();
        $user = User::findOrFail($id);
        return view('admin', compact('users', 'user')); // ← csak 'admin'
    }
}
