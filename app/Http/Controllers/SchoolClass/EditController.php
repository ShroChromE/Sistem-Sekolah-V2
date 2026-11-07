<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $title = "Sistem Sekolah - Edit Kelas";
        $class = $this->findClass($id);
        $majors = $this->getMajors();
        $teachers = $this->getTeachers();

        return view('classes.edit', [
            'title' => $title,
            'class' => $class,
            'majors' => $majors,
            'teachers' => $teachers,
        ]);
    }
}