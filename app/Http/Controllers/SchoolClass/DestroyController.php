<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        return redirect()
            ->route('classes.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}