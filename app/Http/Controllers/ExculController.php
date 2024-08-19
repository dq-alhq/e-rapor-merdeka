<?php

namespace App\Http\Controllers;

use App\Models\Classmember;
use App\Models\Excul;
use Illuminate\Http\Request;

class ExculController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->per_page ?? 10;
        $exculs = Excul::query()->where('nama', 'like', "%{$search}%")->with('teacher')->paginate($perPage)->withQueryString();
        return view('exculs.index', compact('exculs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('exculs.form', [
            'excul' => new Excul(),
            'action' => route('exculs.store'),
            'method' => 'POST',
            'title' => 'Tambah Ekskul',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'code' => 'required|unique:exculs',
        ]);
        Excul::create([
            'nama' => request('nama'),
            'code' => request('code'),
        ]);
        return to_route('exculs.index')->with('success', 'Data ekstrakurikuler berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Excul $excul)
    {
        $classmembers = Classmember::query()->whereDoesntHave('exculs', fn($q) => $q->where('excul_id', $excul->id))->orderBy('classroom_id')->get();
        return view('exculs.show', compact('excul', 'classmembers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Excul $excul)
    {
        return view('exculs.form', [
            'excul' => $excul,
            'action' => route('exculs.update', $excul),
            'method' => 'PUT',
            'title' => 'Ubah Data Ekskul',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Excul $excul)
    {
        request()->validate([
            'code' => 'required|unique:exculs,code,' . $excul->id,
            'nama' => 'required',
        ]);
        $excul->update([
            'nama' => request('nama'),
            'code' => request('code'),
        ]);
        return to_route('exculs.index')->with('success', 'Data ekstrakurikuler berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Excul $excul)
    {
        //
    }

    public function pembina(Excul $excul)
    {
        request()->validate([
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        $excul->teacher_id = request('teacher_id');
        $excul->save();
        return back()->with('success', 'Pembina ekstrakurikuler ditambahkan');
    }
}
