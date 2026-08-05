<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Temporary hardcoded data store.
     * TODO: replace with a real Student Eloquent model + database table.
     */
    private function students()
    {
        return [
            [
                'id' => 1,
                'nis' => '22100001',
                'name' => 'Andi',
                'gender' => 'L',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ',
            ],
            [
                'id' => 2,
                'nis' => '22100002',
                'name' => 'Budi',
                'gender' => 'L',
                'class' => 'XII AKL',
                'major' => 'AKL',
            ],
        ];
    }

    private function findStudent($id)
    {
        $student = collect($this->students())->firstWhere('id', (int) $id);

        if (! $student) {
            abort(404, 'Siswa tidak ditemukan');
        }

        return $student;
    }

    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = $this->students();

        return view('students.index', [
            'title' => $title,
            'students' => $students,
        ]);
    }

    public function show($id)
    {
        $title = "Sistem Sekolah - Detail Siswa";
        $student = $this->findStudent($id);

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";

        return view('students.create', [
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'major' => 'required|string|max:50',
            'class' => 'required|string|max:50',
        ]);

        // TODO: persist $validated to the database once a Student model exists.

        return redirect()
            ->route('students.index')
            ->with('success', 'Siswa berhasil ditambahkan ke buku induk.');
    }

    public function edit($id)
    {
        $title = "Sistem Sekolah - Edit Siswa";
        $student = $this->findStudent($id);

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = $this->findStudent($id);

        $validated = $request->validate([
            'nis' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'major' => 'required|string|max:50',
            'class' => 'required|string|max:50',
        ]);

        return redirect()
            ->route('students.show', $student['id'])
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $student = $this->findStudent($id);

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}