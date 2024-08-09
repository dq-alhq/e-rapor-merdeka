<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\Mapel;
use App\Models\Teacher;
use Illuminate\Http\Request;

class LessonController extends Controller
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
        return view('lessons.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function attach_mapel(Classroom $classroom, Mapel $mapel)
    {
        $mapel->classrooms()->attach([$classroom->id]);
        return back()->with('success', 'Mapel ditambahkan');
    }

    public function detach_mapel(Classroom $classroom, Mapel $mapel)
    {
        $mapel->classrooms()->detach([$classroom->id]);
        return back()->with('success', 'Mapel dihapus');
    }

    public function attach_teacher(Classroom $classroom, Mapel $mapel)
    {
        request()->validate([
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $lesson = Lesson::where('classroom_id', $classroom->id)->where('mapel_id', $mapel->id)->first();
        $lesson->teacher_id = request('teacher_id');
        $lesson->save();
        return back()->with('success', 'Guru ditambahkan');
    }

    public function detach_teacher(Classroom $classroom, Mapel $mapel, Teacher $teacher)
    {
        $lesson = Lesson::where('classroom_id', $classroom->id)->where('mapel_id', $mapel->id)->first();
        $lesson->teacher_id = null;
        $lesson->save();
        return back()->with('success', 'Guru dihapus');
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
        $classrooms = Classroom::query()->where('tapel_id', session('tapel')->id)->get();
        $mapels = Mapel::query()->whereDoesntHave('classrooms', fn($q) => $q->where('classroom_id', $classroom->id))->select('id', 'nama')->orderBy('id')->get();
        return view('lessons.show', compact('classroom', 'classrooms', 'mapels'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
