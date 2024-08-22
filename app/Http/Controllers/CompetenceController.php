<?php

namespace App\Http\Controllers;

use App\Enums\Grade;
use App\Models\Classroom;
use App\Models\Competence;
use App\Models\Mapel;
use App\Models\School;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * @return array
     */
    public function getPilihan_tingkat(): array
    {
        $jenjang = School::query()->select('jenjang')->first()->jenjang->value;
        return match ($jenjang) {
            'D' => [Grade::VII, Grade::VIII, Grade::IX],
            'F', 'E' => [Grade::X, Grade::XI, Grade::XII],
            default => [Grade::I, Grade::II, Grade::III, Grade::IV, Grade::V, Grade::VI],
        };
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tingkat = $this->getPilihan_tingkat();
        $mapels = Mapel::query()->count();
        if($mapels > 0) {
            return $this->show($tingkat[0]->value);
        }
        return view('lessons.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competences.form', [
            'mapel' => Mapel::find(request()->keys()[0]),
            'grade' => Grade::from(request()->keys()[1]),
            'competence' => new Competence(),
            'action' => route('competences.store'),
            'method' => 'POST',
            'title' => 'Tambah Materi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mapel_id' => 'required|exists:mapels,id',
            'tingkat' => 'required|in:' . implode(',', array_column($this->getPilihan_tingkat(), 'value')),
            'materi' => 'required|string|max:255',
            'semester' => 'required|in:1,2',
            'code' => 'required|string|max:255',
        ]);
        Competence::query()->create([
            'mapel_id' => $request->mapel_id,
            'tingkat' => $request->tingkat,
            'semester' => $request->semester,
            'materi' => $request->materi,
            'code' => $request->code,
        ]);
        return to_route('competences.show', [$request->tingkat,$request->mapel_id])->with('success', 'Materi ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $grade = null)
    {
        $mapel_id = request()?->keys()[0] ?? null;
        $mapel = Mapel::query()->find($mapel_id) ?? null;
        $tingkat = $this->getPilihan_tingkat();
        $competences = Competence::query()->where('tingkat', $grade)->get();
        return view('competences.show', compact('tingkat', 'grade', 'competences', 'mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competence $competence)
    {
        return view('competences.form', [
            'mapel' => $competence->mapel,
            'grade' => $competence->tingkat,
            'competence' => $competence,
            'action' => route('competences.update', $competence),
            'method' => 'PUT',
            'title' => 'Edit Materi',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competence $competence)
    {
        $request->validate([
            'materi' => 'required|string|max:255',
            'semester' => 'required|in:1,2',
            'code' => 'required|string|max:255',
        ]);
        $competence->update([
            'semester' => $request->semester,
            'materi' => $request->materi,
            'code' => $request->code,
        ]);
        return to_route('competences.show', [$competence->tingkat,$competence->mapel_id])->with('success', 'Materi diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();
        return back()->with('success', 'Materi dihapus');
    }
}
