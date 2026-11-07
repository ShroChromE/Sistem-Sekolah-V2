<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $title = "Sistem Sekolah - Tambah Kelas";
        $majors = $this->getMajors();
        $teachers = $this->getTeachers();

        return view('classes.create', [
            'title' => $title,
            'majors' => $majors,
            'teachers' => $teachers,
        ]);
    }
}