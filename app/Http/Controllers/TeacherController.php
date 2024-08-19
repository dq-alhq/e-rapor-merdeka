<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $perPage = $request->per_page ?? 9;
        $teachers = Teacher::query()->where('nama', 'like', "%{$search}%")->select('id', 'nama', 'nuptk', 'photo')->paginate($perPage)->withQueryString();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.form', [
            'teacher' => new Teacher(),
            'action' => route('teachers.store'),
            'method' => 'POST',
            'title' => 'Tambah Guru',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        if ($request->hasFile('photo')) {
            $filename = 'images/' . $request->nuptk . '.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('public', $filename);
        }
        Teacher::create([
            ...$request->validated(),
            'photo' => $filename ?? null,
        ]);
        return to_route('teachers.index')->with('success', 'Data guru berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.form', [
            'teacher' => $teacher,
            'action' => route('teachers.update', $teacher),
            'method' => 'PUT',
            'title' => 'Ubah Data Guru',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        if ($request->hasFile('photo')) {
            if ($teacher->photo) {
                unlink(storage_path('app/public/' . $teacher->photo));
            }
            $filename = 'images/' . $request->nuptk . '.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('public', $filename);
        }
        $teacher->update([
            ...$request->validated(),
            'photo' => $filename ?? $teacher->photo
        ]);
        return to_route('teachers.index')->with('success', 'Data guru berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        // Delete Mapel that belongs to this teacher
        // Delete Classroom that belongs to this teacher
        dd($teacher->nama);
    }
}
