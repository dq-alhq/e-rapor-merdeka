<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->per_page ?? 10;
        $projects = Project::query()->where('name', 'like', "%{$search}%")->paginate($perPage)->withQueryString();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.form', [
            'project' => new Project(),
            'action' => route('projects.store'),
            'method' => 'POST',
            'title' => 'Tambah Proyek Baru',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        Project::query()->create([
            ...$request->validated(),
            'tapel_id' => session('tapel')->id,
        ]);
        return to_route('projects.index')->with('success', 'Data proyek berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.form', [
            'project' => $project,
            'action' => route('projects.update', $project),
            'method' => 'PUT',
            'title' => 'Ubah Data Proyek',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update([
            ...$request->validated(),
            'tapel_id' => session('tapel')->id,
        ]);
        return to_route('projects.index')->with('success', 'Data proyek berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index')->with('success', 'Data proyek berhasil dihapus');
    }
}
