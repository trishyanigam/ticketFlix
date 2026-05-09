@props([
    'title',
    'icon'
])

<div class="movie-category">

    <div class="category-icon">

        {{ $icon }}

    </div>

    <div class="category-title">

        {{ $title }}

    </div>

</div>