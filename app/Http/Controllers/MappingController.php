<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Mapping;
use Illuminate\Http\Request;

class MappingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapped_mapels = Mapel::query()->whereHas('mapping')->select(['id', 'nama', 'code'])->get();
        $unmapped_mapels = Mapel::query()->whereDoesntHave('mapping')->select(['id', 'nama', 'code'])->get();
        return view('mappings.index', compact('mapped_mapels', 'unmapped_mapels'));
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
        $order = 1;
        while (Mapping::query()->where('kelompok', $request->kelompok)->where('order', $order)->exists()) {
            $order++;
        }
        Mapping::query()->create([
            'mapel_id' => $request->mapel_id,
            'kelompok' => $request->kelompok,
            'order' => $order,
        ]);
        return back()->with('success', 'Mapel ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapping $mapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapping $mapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapping $mapping)
    {
        $order = $request->order;
        if($order === 'increase') {
            Mapping::query()->where('kelompok', $mapping->kelompok)->where('order', $mapping->order + 1)->update(['order' => $mapping->order]);
            $mapping->update(['order' => $mapping->order + 1]);
        } else {
            Mapping::query()->where('kelompok', $mapping->kelompok)->where('order', $mapping->order - 1)->update(['order' => $mapping->order]);
            $mapping->update(['order' => $mapping->order - 1]);
        }
        return back()->with('success', 'Mapel diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapping $mapping)
    {
        $mapping->delete();
        return back()->with('success', 'Mapel dihapus');
    }
}
