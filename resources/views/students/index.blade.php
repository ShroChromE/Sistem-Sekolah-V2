@extends('layouts.app')

@section('title', $title)

@section('content')

<x-page-header
    eyebrow="Tahun Ajaran 2025/2026"
    title="Daftar Siswa"
    action-label="Catat Siswa Baru"
    :action-route="route('students.create')"
/>

<div class="border border-[#E5E3DB] bg-white"> 
    <table class="w-full text-left text-sm">
        <thead>
            <tr class="border-b border-[#16213A] text-[11px] uppercase tracking-[0.15em] text-[#16213A]">
                <th class="w-14 px-5 py-3.5 font-semibold">No.</th>
                <th class="px-5 py-3.5 font-semibold">NIS</th>
                <th class="px-5 py-3.5 font-semibold">Nama Siswa</th>
                <th class="px-5 py-3.5 font-semibold">Kelas</th>
                <th class="px-5 py-3.5 font-semibold">Jurusan</th>
                <th class="px-5 py-3.5 text-right font-semibold">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student )
            <tr class="border-b border-[#EFEDE6] hover:bg-[#FAF9F5]">
                <td class="px-5 py-4 font-display text-lg text-[#A16207]">
                    {{ $loop->iteration }}
                </td>
                <td class="px-5 py-4 font-mono text-xs text-slate-500">
                    {{ $student->nis }}
                </td>
                <td class="px-5 py-4 font-medium text-[#16213A]">
                    {{ $student->name }}
                </td>
                <td class="px-5 py-4">
                    {{ $student->class }}
                </td>
                <td class="px-5 py-4">
                    {{ $student->major }}
                </td>
                <td class="px-5 py-4">
                    <div class="flex justify-end gap-4 text-xs font-medium">
                        <a href="{{ route('students.show', ['student' => $student->id]) }}" class="text-[#16213A] hover:text-[#A16207]">Lihat</a>
                        <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="text-[#16213A] hover:text-[#A16207]">Ubah</a>
                        <form action="{{ route('students.destroy', ['student' => $student->id]) }}" method="POST"
                        onsubmit="return confirm('Hapus data siswa ini dari buku induk?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-700 hover:text-red-900">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center p-4">Data siswa tidak tersedia</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection