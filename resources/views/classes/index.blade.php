@extends('layouts.app')

@section('title', $title)

@section('content')

<x-page-header
    eyebrow="Tahun Ajaran 2025/2026"
    title="Daftar Kelas"
    action-label="Tambah Kelas"
    :action-route="route('classes.create')"
/>

<div class="border border-[#E5E3DB] bg-white">
    <table class="w-full text-left text-sm">
        <thead>
            <tr class="border-b border-[#16213A] text-[11px] uppercase tracking-[0.15em] text-[#16213A]">
                <th class="w-14 px-5 py-3.5 font-semibold">No.</th>
                <th class="px-5 py-3.5 font-semibold">Nama Kelas</th>
                <th class="px-5 py-3.5 font-semibold">Tingkat</th>
                <th class="px-5 py-3.5 font-semibold">Jurusan</th>
                <th class="px-5 py-3.5 font-semibold">Wali Kelas</th>
                <th class="px-5 py-3.5 text-right font-semibold">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
            <tr class="border-b border-[#EFEDE6] hover:bg-[#FAF9F5]">
                <td class="px-5 py-4 font-display text-lg text-[#A16207]">
                    {{ $loop->iteration }}
                </td>
                <td class="px-5 py-4 font-medium text-[#16213A]">
                    {{ $class['name'] }}
                </td>
                <td class="px-5 py-4">
                    {{ $class['grade'] }}
                </td>
                <td class="px-5 py-4">
                    {{ $class['major'] }}
                </td>
                <td class="px-5 py-4 text-slate-500">
                    {{ $class['homeroom_teacher'] }}
                </td>
                <td class="px-5 py-4">
                    <div class="flex justify-end gap-4 text-xs font-medium">
                        <a href="{{ route('classes.show', $class['id']) }}" class="text-[#16213A] hover:text-[#A16207]">Lihat</a>
                        <a href="{{ route('classes.edit', $class['id']) }}" class="text-[#16213A] hover:text-[#A16207]">Ubah</a>
                        <form action="{{ route('classes.destroy', $class['id']) }}" method="POST"
                            onsubmit="return confirm('Hapus data kelas ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-700 hover:text-red-900">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection