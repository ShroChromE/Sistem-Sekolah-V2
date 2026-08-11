<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $title = "Sistem Sekolah - Daftar Kelas";

        $classes = [
            [
                'id' => 1,
                'name' => 'XII AKL 1',
                'grade' => 'XII',
                'major' => 'Akuntansi dan Keuangan Lembaga',
                'homeroom_teacher' => 'Budi Santoso',
            ],
            [
                'id' => 2,
                'name' => 'XII TKJ 1',
                'grade' => 'XII',
                'major' => 'Teknik Komputer dan Jaringan',
                'homeroom_teacher' => 'Siti Aminah',
            ],
        ];

        return view('classes.index', [
            'title' => $title,
            'classes' => $classes,
        ]);
    }
}