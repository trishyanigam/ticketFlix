@props([
    'title',
    'rating',
    'genre',
    'duration',
    'emoji',
    'poster',
    'image' => null,
    'full_title' => null,
    'formats' => ['2D'],
    'languages' => ['Hindi']
])

<div class="movie-card" onclick="window.location.href='{{ route('movies.show') }}?title={{ urlencode($full_title ?? $title) }}&rating={{ urlencode($rating) }}&image={{ urlencode($image ?? '') }}&poster={{ urlencode($poster ?? '') }}&emoji={{ urlencode($emoji ?? '') }}&genre={{ urlencode($genre) }}&duration={{ urlencode($duration) }}&formats={{ urlencode(implode(', ', $formats)) }}&languages={{ urlencode(implode(', ', $languages)) }}'" 
     data-formats="{{ implode(' ', $formats) }}"
     data-genres="{{ strtolower($genre) }}"
     data-languages="{{ implode(' ', array_map('strtolower', $languages)) }}"
     data-rating="{{ $rating }}"
     data-new="{{ in_array($title, ['Bhooth', 'Top', 'Chardikala', 'Raja']) ? 'true' : 'false' }}"
     data-premiere="{{ in_array($title, ['Dhurandhar', 'Project', 'Raja']) ? 'true' : 'false' }}"
     style="border: none; background: #18181c; border-radius: 20px; overflow: hidden; cursor: pointer;">
    <div class="movie-poster" style="aspect-ratio: 1/1.4; position: relative;">
        <!-- Wishlist Button -->
        <button class="wishlist-btn" 
                data-wishlist-title="{{ $full_title ?? $title }}"
                onclick="toggleWishlistAjax(event, 'movie', '{{ $full_title ?? $title }}', { rating: '{{ $rating }}', genre: '{{ $genre }}', duration: '{{ $duration }}', emoji: '{{ $emoji }}', poster: '{{ $poster }}', image: '{{ $image }}', formats: '{{ implode(', ', $formats) }}', languages: '{{ implode(', ', $languages) }}' })"
                style="position: absolute; top: 12px; left: 12px; z-index: 10; border: none; background: rgba(0, 0, 0, 0.4); backdrop-filter: blur(8px); width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px; cursor: pointer; color: var(--muted); transition: all 0.3s ease;">
            @php
                $isWishlisted = false;
                if(auth()->check()) {
                    $isWishlisted = \App\Models\Wishlist::where('user_id', auth()->id())->where('type', 'movie')->where('title', $full_title ?? $title)->exists();
                }
            @endphp
            <span class="heart-icon">{{ $isWishlisted ? '❤️' : '🤍' }}</span>
        </button>
        @if($image)
            <img src="{{ asset('assets/images/movies/' . $image) }}" alt="{{ $title }}" style="width: 100%; height: 100%; object-fit: cover;">
        @else
            <div class="movie-poster-img {{ $poster }}" style="font-size: 70px; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">{{ $emoji }}</div>
        @endif
        <div class="movie-badge-top" style="background: rgba(0,0,0,0.3); backdrop-filter: blur(4px); color: var(--white); font-family: var(--font-body); font-size: 11px; padding: 4px 8px; border-radius: 6px;">{{ in_array($title, ['Blaze', 'Nexus', 'Deep', 'Aakhri', 'Project', 'Pati', 'Michael', 'Top', 'Bhooth', 'Raja']) ? 'UA' : (in_array($title, ['Void', 'Roots', 'Surge', 'Petal', 'Krishna', 'Chardikala']) ? 'U' : 'A') }}</div>
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