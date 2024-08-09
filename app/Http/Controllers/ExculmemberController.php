<?php

namespace App\Http\Controllers;

use App\Models\Classmember;
use App\Models\Excul;
use App\Models\Exculmember;
use Illuminate\Http\Request;

class ExculmemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $excul = Excul::query()->first();
        if ($excul) {
            return $this->show($excul);
        }
        return view('exculmembers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Excul $excul)
    {
        $exculs = Excul::query()->get();
        $classmembers = Classmember::query()->whereDoesntHave('exculs', fn($q) => $q->where('excul_id', $excul->id))->orderBy('classroom_id')->get();
        return view('exculmembers.show', compact('excul', 'exculs', 'classmembers'));
    }

    public function attach_excul_member(Excul $excul, Classmember $classmember)
    {
        $classmember->exculs()->attach($excul->id);
        return back()->with('success', 'Anggota ditambahkan');
    }

    public function detach_excul_member(Excul $excul, Classmember $classmember)
    {
        $classmember->exculs()->detach($excul->id);
        return back()->with('success', 'Anggota dihapus');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exculmember $exculmember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exculmember $exculmember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exculmember $exculmember)
    {
        //
    }
}
