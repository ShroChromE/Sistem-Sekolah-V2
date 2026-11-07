<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
        public function index()
    {
        $title = "Sistem Sekolah - Daftar Jurusan";
        $majors = $this->getMajors();

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

        return redirect()
            ->route('majors.index')
            ->with('success', 'Jurusan berhasil ditambahkan ke buku induk.');
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