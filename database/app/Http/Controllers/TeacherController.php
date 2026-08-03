<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return "Ini adalah halaman daftar guru";
    }

    public function show($id)
    {
        return "Menampilkan detail guru dengan ID: {$id}";
    }

    public function create()
    {
        return "Ini adalah halaman untuk membuat guru baru";
    }

    public function store(Request $request)
    {
        return "Menyimpan data guru baru";
    }

    public function edit($id)
    {
        return "Ini adalah halaman untuk mengedit guru dengan ID: {$id}";
    }

    public function update(Request $request, $id)
    {
        return "Memperbarui data guru dengan ID: {$id}";
    }

    public function destroy($id)
    {
        return "Menghapus data guru dengan ID: {$id}";
    }
}