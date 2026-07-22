<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return "Menampilkan halaman daftar siswa";
    }
    public function show($id)
    {
        return "Menampilkan siswa dengan ID: $id";
    }
    public function create()
    {
        return "Menampilkan halaman tambah siswa";
    }
    public function store(Request $request)
    {
        return "Melakukan penambahan data siswa";
    }
    public function edit($id)
    {
        return "Menampilkan halaman edit siswa";
    }
    public function update(Request $request, $id)
    {
        return "Melakukan perubahan data siswa";
    }
    public function destroy($id)
    {
        return "Menghapus data siswa";
    }
}
