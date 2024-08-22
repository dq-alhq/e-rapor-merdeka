<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'competence_id' => 'required|exists:competences,id',
            'capaian' => 'required|string|max:255',
        ]);
        if ($request->objective_id) {
            Objective::query()->find($request->objective_id)->update([
                'capaian' => $request->capaian,
            ]);
        } else {
            Objective::query()->create([
                'competence_id' => $request->competence_id,
                'capaian' => $request->capaian,
            ]);
        }
        return back()->with('success', 'Tujuan Pembelajaran diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function show(Objective $objective)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Objective $objective)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Objective $objective)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Objective $objective)
    {
        $objective->delete();
        return back()->with('success', 'Tujuan Pembelajaran dihapus');
    }
}
