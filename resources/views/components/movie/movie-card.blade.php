@props([
    'title',
    'rating',
    'genre',
    'duration',
    'emoji',
    'poster',
    'full_title' => null,
    'formats' => ['2D']
])

<div class="movie-card" onclick="window.location.href='{{ route('movies.show') }}'" style="border: none; background: #18181c; border-radius: 20px; overflow: hidden;">
    <div class="movie-poster" style="aspect-ratio: 1/1.2; position: relative;">
        <div class="movie-poster-img {{ $poster }}" style="font-size: 70px;">{{ $emoji }}</div>
        <div class="movie-badge-top" style="background: rgba(0,0,0,0.3); backdrop-filter: blur(4px); color: var(--white); font-family: var(--font-body); font-size: 11px; padding: 4px 8px; border-radius: 6px;">{{ in_array($title, ['Blaze', 'Nexus', 'Deep']) ? 'UA' : (in_array($title, ['Void', 'Roots', 'Surge', 'Petal']) ? 'U' : 'A') }}</div>
        <div class="movie-overlay" style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, transparent 60%); padding: 20px; display: flex; align-items: flex-end; justify-content: center;">
             <div style="font-family: var(--font-display); font-size: 28px; letter-spacing: 2px; color: var(--white);">{{ strtoupper($title) }}</div>
        </div>
    </div>
    <div class="movie-info" style="padding: 16px;">
        <div style="font-size: 14px; font-weight: 600; color: var(--white); margin-bottom: 6px;">{{ $full_title ?? ($title . ' of Glory') }}</div>
        <div style="display: flex; align-items: center; gap: 8px; font-size: 12px; color: var(--muted); margin-bottom: 12px;">
            <span style="color: var(--gold); font-weight: 700;">⭐ {{ $rating }}</span>
            <span>{{ $genre }} · {{ $duration }}</span>
        </div>
        <div style="display: flex; gap: 6px;">
            @foreach($formats as $format)
                <span style="background: #222228; color: var(--muted); padding: 4px 10px; border-radius: 6px; font-size: 10px; font-weight: 700;">{{ $format }}</span>
            @endforeach
        </div>
    </div>
</div>