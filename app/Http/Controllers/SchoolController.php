<?php

namespace App\Http\Controllers;

use App\Enums\Level;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school = School::query()->latest()->first();

        return view('school.index', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenjang' => 'required|in:' . implode(',', array_column(Level::cases(), 'value')),
            'npsn' => 'required|numeric',
            'nss' => 'nullable|string|max:255',
            'nds' => 'nullable|string|max:255',
            'nis' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:255',
            'village_id' => 'required|exists:villages,id',
            'kode_pos' => 'required|numeric',
            'telepon' => 'required|string|max:255',
            'kepsek_id' => 'required|exists:teachers,id',
            'logo' => 'nullable|image|max:2048|mimes:png,jpg,jpeg',
        ]);
        if ($request->hasFile('logo')) {
            if ($school->logo) {
                unlink(storage_path('app/public/' . $school->logo));
            }
            $filename = 'images/' . $validated['npsn'] . '.' . $request->file('logo')->extension();
            $request->file('logo')->storeAs('public', $filename);
            $validated['logo'] = $filename;
        }
        $school->update($validated);

        return redirect()->route('school.index')->with('success', 'Data sekolah berhasil diperbarui');
    }
}
