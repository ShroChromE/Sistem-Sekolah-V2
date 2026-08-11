<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private function teachers()
    {
        return [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone_number' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone_number' => '081234560002',
                'status' => 'Aktif',
            ],
        ];
    }

    private function findTeacher($id)
    {
        $teacher = collect($this->teachers())->firstWhere('id', (int) $id);

        if (! $teacher) {
            abort(404, 'Guru tidak ditemukan');
        }

        return $teacher;
    }

    public function index()
    {
        $title = "Sistem Sekolah - Daftar Guru";
        $teachers = $this->teachers();

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
        $validated = $request->validate([
            'nip' => 'required|string|max:30',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'subject' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Guru berhasil ditambahkan.');
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

        $validated = $request->validate([
            'nip' => 'required|string|max:30',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'subject' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

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