<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $perPage = $request->per_page ?? 9;
        $mapels = Mapel::query()->where('nama', 'like', "%{$search}%")->orWhere('code', 'like', "%{$search}%")->select('id', 'nama', 'code')->paginate($perPage)->withQueryString();
        return view('mapels.index', compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mapels.form', [
            'mapel' => new Mapel(),
            'action' => route('mapels.store'),
            'method' => 'POST',
            'title' => 'Tambah Mata Pelajaran Baru',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'code' => 'required|unique:mapels',
            'nama' => 'required',
        ]);
        Mapel::create([
            'nama' => request('nama'),
            'code' => request('code'),
        ]);
        return to_route('mapels.index')->with('success', 'Data mapel berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        return view('mapels.form', [
            'mapel' => $mapel,
            'action' => route('mapels.update', $mapel),
            'method' => 'PUT',
            'title' => 'Ubah Data Mata Pelajaran',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        request()->validate([
            'code' => 'required|unique:mapels,code,' . $mapel->id,
            'nama' => 'required',
        ]);
        $mapel->update([
            'nama' => request('nama'),
            'code' => request('code'),
        ]);
        return to_route('mapels.index')->with('success', 'Data mapel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        // Delete Mapel that belongs to this mapel
        // Delete Classroom that belongs to this mapel
        dd($mapel->nama);
    }
}
