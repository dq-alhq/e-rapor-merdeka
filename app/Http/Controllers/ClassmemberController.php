<?php

namespace App\Http\Controllers;

use App\Models\Classmember;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassmemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classroom = Classroom::query()->where('tapel_id', session('tapel')->id)->first();
        if ($classroom) {
            return $this->show(Classroom::query()->where('tapel_id', session('tapel')->id)->first());
        }
        return view('classmembers.index');
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
    public function show(Classroom $classroom)
    {
        $classrooms = Classroom::query()->where('tapel_id', session('tapel')->id)->orderBy('tingkat')->get();
        $students = Student::query()->whereDoesntHave('classrooms')->get();
        return view('classmembers.show', compact('classroom', 'classrooms', 'students'));
    }

    public function attach_classmember(Classroom $classroom, Student $student)
    {
        $classroom->students()->attach($student);
        return back()->with('success', 'Anggota ditambahkan');
    }

    public function detach_classmember(Classroom $classroom, Student $student)
    {
        if ($student->exculs->count() > 0) {
            return back()->with('error', 'Anggota sedang aktif diekskul');
        }
        $classroom->students()->detach($student);
        return back()->with('success', 'Anggota dihapus');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classmember $classmember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classmember $classmember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classmember $classmember)
    {
        //
    }
}
