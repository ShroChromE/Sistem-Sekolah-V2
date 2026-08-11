@props([
    'eyebrow' => null,
    'title',
    'actionLabel' => null,
    'actionRoute' => null,
])

<div class="mb-8 flex items-end justify-between border-b border-[#E5E3DB] pb-5">
    <div>
        @if ($eyebrow)
        <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">{{ $eyebrow }}</p>
        @endif
        <h1 class="font-display text-3xl font-semibold text-[#16213A]">{{ $title }}</h1>
    </div>

    @if ($actionLabel && $actionRoute)
    <a href="{{ $actionRoute }}" class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">
        {{ $actionLabel }}
    </a>
    @endif
</div>