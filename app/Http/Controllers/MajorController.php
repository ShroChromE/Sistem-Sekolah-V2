<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return "Menampilkan halaman daftar major";
    }
    public function create()
    {
        return "Menampilkan halaman tambah major";
    }
    public function store(Request $request)
    {
        return "Melakukan penambahan data major";
    }
    public function show($id)
    {
        return "Menampilkan major dengan ID: $id";
    }
    public function edit($id)
    {
        return "Menampilkan halaman edit major dengan ID: $id";
    }
    public function update(Request $request, $id)
    {
        return "Melakukan perubahan data major dengan ID: $id";
    }
    public function destroy($id)
    {
        return "Menghapus data major dengan ID: $id";
    }
}