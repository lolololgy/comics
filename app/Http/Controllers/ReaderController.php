<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index()
    {
        $users = User::withCount('comics')->get()->where('id', '!=', auth()->id());
        return view('readers.index', compact('users'));
    }

    public function show(User $user)
    {
        $comics = $user->comics()->latest()->get();
        return view('readers.show', compact('user', 'comics'));
    }
}
