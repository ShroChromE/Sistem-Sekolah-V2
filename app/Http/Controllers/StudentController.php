<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Major;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::with(['major', 'schoolClass'])
            ->select(['id', 'nis', 'name', 'gender', 'major_id', 'class_id'])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->when($class, fn($query, $class) => $query->where('class_id', '=', $class))
            ->when($major, fn($query, $major) => $query->where('major_id', '=', $major))
            ->paginate(10)
            ->withQueryString();
        $schoolClasses = SchoolClass::orderBy('name')->get();
        $majors = Major::orderBy('name')->get();

        return view('students.index', [
            'title'         => $title,
            'students'      => $students,
            'schoolClasses' => $schoolClasses,
            'majors'        => $majors
        ]);
    }

    public function show(Student $student)
    {
        $title = "Sistem Sekolah - Detail Siswa";
        $student->load(['major', 'schoolClass', 'user']);

        return view('students.show', [
            'title'   => $title,
            'student' => $student,
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";

        return view('students.create', [
            'title'         => $title,
            'schoolClasses' => SchoolClass::orderBy('name')->get(),
            'majors'        => Major::orderBy('name')->get(),
        ]);
    }

    public function store(StoreRequest $request)
    {
        $validatedRequest = $request->validated();
        Student::create($validatedRequest);

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $title = "Sistem Sekolah - Edit Siswa";

        return view('students.edit', [
            'title'         => $title,
            'student'       => $student,
            'schoolClasses' => SchoolClass::orderBy('name')->get(),
            'majors'        => Major::orderBy('name')->get(),
        ]);
    }

    public function update(Student $student, UpdateRequest $request)
    {
        $validatedRequest = $request->validated();
        $student->update($validatedRequest);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}