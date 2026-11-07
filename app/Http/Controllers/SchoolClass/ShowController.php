<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $title = "Sistem Sekolah - Detail Kelas";
        $class = $this->findClass($id);

        return view('classes.show', [
            'title' => $title,
            'class' => $class,
        ]);
    }
}