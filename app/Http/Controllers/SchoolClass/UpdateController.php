<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|in:X,XI,XII',
            'major_id' => 'required|integer',
            'teacher_id' => 'required|integer',
        ]);

        return redirect()
            ->route('classes.show', $id)
            ->with('success', 'Data kelas berhasil diperbarui.');
    }
}