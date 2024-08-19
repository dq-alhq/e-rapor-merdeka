<?php

namespace App\Http\Controllers;

use App\Enums\Grade;
use App\Models\Classroom;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassroomController extends Controller
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
        $classrooms = Classroom::query()->where('tapel_id', session()->get('tapel')->id)->select('id', 'tapel_id', 'tingkat', 'rombel', 'wali_id')->with(['tapel', 'wali'])->paginate(10);
        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classrooms.form', [
            'classroom' => new Classroom(),
            'pilihan_tingkat' => $this->getPilihan_tingkat(),
            'action' => route('classrooms.store'),
            'method' => 'POST',
            'title' => 'Tambah Kelas',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tingkat' => 'required|in:' . implode(',', array_column($this->getPilihan_tingkat(), 'value')),
            'rombel' => 'nullable|string|max:255',
            'wali_id' => 'required|exists:teachers,id',
        ]);
        Classroom::query()->create([
            ...$validated,
            'tapel_id' => session('tapel')->id,
        ]);
        return to_route('classrooms.index')->with('success', 'Kelas berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom, Request $request)
    {
        $search = $request->search ?? '';
        $perPage = $request->per_page ?? 10;
        $students = Student::query()
            ->where('nis', 'like', "%{$search}%")
            ->whereHas('classrooms', fn($q) => $q->where('classroom_id', $classroom->id))
            ->select('id', 'nama', 'nis', 'photo')
            ->paginate($perPage)
            ->withQueryString();
        return view('classrooms.show', compact('classroom', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        return view('classrooms.form', [
            'classroom' => $classroom,
            'pilihan_tingkat' => $this->getPilihan_tingkat(),
            'action' => route('classrooms.update', $classroom),
            'method' => 'PUT',
            'title' => 'Edit Kelas',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        $validated = $request->validate([
            'tingkat' => 'required|in:' . implode(',', array_column($this->getPilihan_tingkat(), 'value')),
            'rombel' => 'nullable|string|max:255',
            'wali_id' => 'required|exists:teachers,id',
        ]);
        $classroom->update([
            ...$validated,
            'tapel_id' => session('tapel')->id,
        ]);
        return to_route('classrooms.index')->with('success', 'Kelas berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        //
    }

}
