<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $title = "Sistem Sekolah - Daftar Kelas";
        $classes = $this->getClasses();

        return view('classes.index', [
            'title' => $title,
            'classes' => $classes,
        ]);
    }
}