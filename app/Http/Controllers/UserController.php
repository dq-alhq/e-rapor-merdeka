<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->per_page ?? 10;
        $users = User::query()->where('name', 'like', "%{$search}%")->orWhere('username', 'like', "%{$search}%")->paginate($perPage)->withQueryString();

        return view('users.index', compact('users'));
    }

    public function reset_password(User $user)
    {
        $user->update([
            'password' => bcrypt('password'),
        ]);

        return back()->with('success', 'Password berhasil di reset');
    }
}
