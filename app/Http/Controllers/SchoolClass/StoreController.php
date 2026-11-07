<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        return redirect()
            ->route('classes.index')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }
}