@props([
    'title',
    'subtitle',
    'banner'
])

<div class="event-big-banner {{ $banner }}">

    <div class="event-big-overlay">

        <div class="event-big-content">

            <h1>

                {{ $title }}

            </h1>

            <p>

                {{ $subtitle }}

            </p>

        </div>

    </div>

</div>