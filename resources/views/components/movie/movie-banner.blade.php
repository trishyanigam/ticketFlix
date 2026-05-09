@props([
    'emoji',
    'title',
    'poster'
])

<div class="movie-banner {{ $poster }}">

    <div class="movie-banner-overlay">

        <div class="movie-banner-content">

            <div class="movie-banner-emoji">

                {{ $emoji }}

            </div>

            <h1 class="movie-banner-title">

                {{ $title }}

            </h1>

        </div>

    </div>

</div>