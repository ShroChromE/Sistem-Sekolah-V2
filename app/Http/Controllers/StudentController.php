<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return 'ini masih halaman tambah siswa';
    }

    public function show($id)
    {
        return "Menampilkan siswa dengan id: $id";
    }
}
