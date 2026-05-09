@props([
    'title',
    'location',
    'date',
    'emoji',
    'banner'
])

<div class="event-card">

    <div class="event-banner {{ $banner }}">

        <div class="event-emoji">

            {{ $emoji }}

        </div>

    </div>

    <div class="event-info">

        <h3 class="event-title">

            {{ $title }}

        </h3>

        <div class="event-meta">

            📍 {{ $location }}

        </div>

        <div class="event-meta">

            📅 {{ $date }}

        </div>

        <a href="{{ route('events.show') }}" class="btn btn-primary event-btn">

            Book Event

        </a>

    </div>

</div>