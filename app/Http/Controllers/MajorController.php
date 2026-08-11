<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{

    private function majors()
    {
        return [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang mempelajari pencatatan, pengelolaan, dan pelaporan keuangan lembaga atau perusahaan.',
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang mempelajari perakitan komputer, administrasi jaringan, dan keamanan sistem.',
            ],
        ];
    }

    private function findMajor($id)
    {
        $major = collect($this->majors())->firstWhere('id', (int) $id);

        if (! $major) {
            abort(404, 'Jurusan tidak ditemukan');
        }

        return $major;
    }

    public function index()
    {
        $title = "Sistem Sekolah - Daftar Jurusan";
        $majors = $this->majors();

        return view('majors.index', [
            'title' => $title,
            'majors' => $majors,
        ]);
    }

    public function show($id)
    {
        $title = "Sistem Sekolah - Detail Jurusan";
        $major = $this->findMajor($id);

        return view('majors.show', [
            'title' => $title,
            'major' => $major,
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Jurusan";

        return view('majors.create', [
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return redirect()
            ->route('majors.index')
            ->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = "Sistem Sekolah - Edit Jurusan";
        $major = $this->findMajor($id);

        return view('majors.edit', [
            'title' => $title,
            'major' => $major,
        ]);
    }

    public function update(Request $request, $id)
    {
        $major = $this->findMajor($id);

        $validated = $request->validate([
            'code' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return redirect()
            ->route('majors.show', $major['id'])
            ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $major = $this->findMajor($id);

        return redirect()
            ->route('majors.index')
            ->with('success', 'Data jurusan berhasil dihapus.');
    }
}