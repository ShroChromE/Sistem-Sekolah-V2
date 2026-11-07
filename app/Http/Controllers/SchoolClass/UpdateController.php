<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $class = $this->findClass($id);

        return redirect()
            ->route('classes.show', $class['id'])
            ->with('success', 'Data kelas berhasil diperbarui.');
    }
}