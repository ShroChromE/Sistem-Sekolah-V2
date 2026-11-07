<?php

namespace App\Http\Controllers;

use App\Models\Student;

abstract class Controller
{
    public function getClasses()
    {
        $classes = [
                [
                    'id' => 1,
                    'name' => 'XII AKL 1',
                    'grade' => 'XII',
                    'major' => 'AKL',
                    'homeroom_teacher' => 'Budi Santoso'
                ],
                [
                    'id' => 2,
                    'name' => 'XII TKJ 1',
                    'grade' => 'XII',
                    'major' => 'TKJ',
                    'homeroom_teacher' => 'Siti Aminah'
                ]
        ];
        return $classes;
    }

    public function getMajors()
    {
        $majors = [
                [
                    'id' => 1,
                    'code' => 'AKL',
                    'name' => 'Akuntansi dan Keuangan Lembaga',
                    'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
                ],
                [
                    'id' => 2,
                    'code' => 'TKJ',
                    'name' => 'Teknik Komputer dan Jaringan',
                    'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
                ],
                [
                    'id' => 3,
                    'code' => 'BD',
                    'name' => 'Bisnis Digital',
                    'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
                ],
        ];
        return $majors;
    }

    public function getTeachers()
    {
        $teachers = [
                [
                    'id' => 1,
                    'nip' => '198501012024',
                    'name' => 'Budi Santoso',
                    'gender' => 'Laki-Laki',
                    'subject' => 'Akuntansi Dasar',
                    'phone_number' => '081234560001',
                    'status' => 'Aktif',
                ],
                [
                    'id' => 2,
                    'nip' => '198703152024',
                    'name' => 'Siti Aminah',
                    'gender' => 'Perempuan',
                    'subject' => 'Jaringan Komputer',
                    'phone_number' => '081234560002',
                    'status' => 'Aktif',
                ]
        ];
        return $teachers;
    }

    public function findTeacher($id)
    {
        $teacher = collect($this->getTeachers())->firstWhere('id', (int) $id);

        if (! $teacher) {
            abort(404, 'Guru tidak ditemukan');
        }

        return $teacher;
    }

    public function findMajor($id)
    {
        $major = collect($this->getMajors())->firstWhere('id', (int) $id);

        if (! $major) {
            abort(404, 'Jurusan tidak ditemukan');
        }

        return $major;
    }

    public function findClass($id)
    {
        $class = collect($this->getClasses())->firstWhere('id', (int) $id);

        if (! $class) {
            abort(404, 'Kelas tidak ditemukan');
        }

        return $class;
    }
}