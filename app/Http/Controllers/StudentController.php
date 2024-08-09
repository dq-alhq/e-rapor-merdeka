<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $perPage = $request->per_page ?? 10;
        $students = Student::query()->where('nama', 'like', "%{$search}%")->select('id', 'nama', 'nis', 'photo')->paginate($perPage)->withQueryString();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.form', [
            'student' => new Student(),
            'action' => route('students.store'),
            'method' => 'POST',
            'title' => 'Tambah Siswa Baru',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        if ($request->hasFile('photo')) {
            $filename = 'images/' . $request->nis . '.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('public', $filename);
        }
        Student::query()->create([
            ...$request->validated(),
            'aktif' => true,
            'photo' => $filename ?? null,
        ]);
        return to_route('students.index')->with('success', 'Data siswa berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.form', [
            'student' => $student,
            'action' => route('students.update', $student),
            'method' => 'PUT',
            'title' => 'Ubah Data Siswa',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        if ($request->hasFile('photo')) {
            if (file_exists(storage_path('app/public/' . $student->photo))) {
                unlink(storage_path('app/public/' . $student->photo));
            }
            $filename = 'images/' . $request->nis . '.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('public', $filename);
        }
        $student->update([
            ...$request->validated(),
            'aktif' => $request->has('aktif'),
            'photo' => $filename ?? $student->photo
        ]);
        return to_route('students.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        dd($student->nama);
    }
}
