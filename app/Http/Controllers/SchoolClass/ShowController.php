<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    private function classes()
    {
        return [
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
    }

    public function __invoke(Request $request, $id)
    {
        $title = "Sistem Sekolah - Detail Kelas";

        $class = collect($this->classes())->firstWhere('id', (int) $id);

        if (! $class) {
            abort(404, 'Kelas tidak ditemukan');
        }

        return view('classes.show', [
            'title' => $title,
            'class' => $class,
        ]);
    }
}