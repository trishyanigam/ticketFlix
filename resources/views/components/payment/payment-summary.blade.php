@props([
    'movie',
    'seats',
    'date',
    'total'
])

<div class="booking-summary">

    <h2>

        Booking Summary

    </h2>

    <div class="summary-item">

        <span>Movie</span>

        <span>{{ $movie }}</span>

    </div>

    <div class="summary-item">

        <span>Seats</span>

        <span>{{ $seats }}</span>

    </div>

    <div class="summary-item">

        <span>Date</span>

        <span>{{ $date }}</span>

    </div>

    <div class="summary-item total">

        <span>Total</span>

        <span>₹ {{ $total }}</span>

    </div>

</div>