<?php

namespace App\Http\Controllers;

use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? '';
        $perPage = $request->input('per-page') ?? 9;
        $tapels = Tapel::query()->where('tapel', 'like', "%{$search}%")->select('id', 'tapel', 'semester', 'tempat_rapor', 'tanggal_rapor')->paginate($perPage)->withQueryString();
        return view('tapels.index', compact('tapels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tapels.form', [
            'tapel' => new Tapel(),
            'action' => route('tapels.store'),
            'method' => 'POST',
            'title' => 'Tambah Tapel',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tapel' => ['required', 'digits:4', Rule::unique('tapels', 'tapel')->where('semester', $request->semester)],
            'semester' => 'required|in:1,2',
            'tempat_rapor' => 'required',
            'tanggal_rapor' => 'required|date',
        ]);

        Tapel::query()->create($validated);
        return to_route('tapels.index')->with('success', "Tahun pelajaran berhasil dibuat");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tapel $tapel)
    {
        if (session('tapel')->id === $tapel->id) abort(403);
        return view('tapels.form', [
            'tapel' => $tapel,
            'action' => route('tapels.update', $tapel),
            'method' => 'PUT',
            'title' => 'Edit Tapel',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tapel $tapel)
    {
        if (session('tapel')->id === $tapel->id) abort(403);
        $validated = $request->validate([
            'tapel' => ['required', 'digits:4', Rule::unique('tapels', 'tapel')->where('semester', $request->semester)->ignore($tapel->id)],
            'semester' => 'required|in:1,2',
            'tempat_rapor' => 'required',
            'tanggal_rapor' => 'required|date',
        ]);

        $tapel->update($validated);
        return to_route('tapels.index')->with('success', "Tahun pelajaran berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tapel $tapel)
    {
        if (session('tapel')->id === $tapel->id) abort(403);
        dd($tapel);
//        $tapel->delete();
//        return to_route('tapels.index')->with('success', "Tahun pelajaran berhasil dihapus");
    }
}
