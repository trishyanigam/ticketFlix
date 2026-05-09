@props([
    'rating',
    'duration',
    'language',
    'certificate'
])

<div class="movie-detail-meta">

    ⭐ {{ $rating }}/10

    ·

    {{ $duration }}

    ·

    {{ $language }}

    ·

    {{ $certificate }}

</div>