@props([
    'title',
    'value',
    'icon'
])

<div class="admin-card">

    <div class="admin-icon">

        {{ $icon }}

    </div>

    <h2 class="admin-value">

        {{ $value }}

    </h2>

    <p class="admin-title">

        {{ $title }}

    </p>

</div>