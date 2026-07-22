<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke($id)
    {
        return "Menghapus data class dengan ID: $id";
    }
}