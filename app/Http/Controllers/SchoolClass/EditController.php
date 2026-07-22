<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke($id)
    {
        return "Menampilkan halaman edit class dengan ID: $id";
    }
}