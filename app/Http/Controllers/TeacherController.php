<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Guru";
        $teachers = $this->getTeachers();

        return view('teachers.index', [
            'title' => $title,
            'teachers' => $teachers,
        ]);
    }

    public function show($id)
    {
        $title = "Sistem Sekolah - Detail Guru";
        $teacher = $this->findTeacher($id);

        return view('teachers.show', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Guru";

        return view('teachers.create', [
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        return redirect()
            ->route('teachers.index')
            ->with('success', 'Guru berhasil ditambahkan ke buku induk.');
    }

    public function edit($id)
    {
        $title = "Sistem Sekolah - Edit Guru";
        $teacher = $this->findTeacher($id);

        return view('teachers.edit', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function update(Request $request, $id)
    {
        $teacher = $this->findTeacher($id);

        return redirect()
            ->route('teachers.show', $teacher['id'])
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $teacher = $this->findTeacher($id);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}