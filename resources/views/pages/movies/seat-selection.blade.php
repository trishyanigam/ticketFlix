<x-layouts.app title="Select Seats — TicketFlix">
    <div class="movies-page-header" style="padding-bottom: 24px;">
        <div class="container">
            <div class="breadcrumb">
                <span onclick="window.location.href='{{ route('home') }}'">Home</span>
                <span class="breadcrumb-sep">/</span>
                <span onclick="window.location.href='{{ route('movies.show') }}'">Movie Detail</span>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-current">Select Seats</span>
            </div>
            <h1 class="section-title">BLAZE OF GLORY <span>IMAX</span></h1>
            <div class="text-muted" style="font-size: 14px; margin-top: 4px;">PVR: ICON, Phoenix Palladium | Today, 01:45 PM</div>
        </div>
    </div>

    <section class="container" style="padding: 60px 0 120px;">
        <div class="seat-screen">SCREEN THIS WAY</div>
        
        <div class="seat-legend">
            <div class="legend-item"><div class="legend-seat ls-available"></div> Available</div>
            <div class="legend-item"><div class="legend-seat ls-selected"></div> Selected</div>
            <div class="legend-item"><div class="legend-seat ls-booked"></div> Booked</div>
            <div class="legend-item"><div class="legend-seat ls-premium"></div> Premium</div>
        </div>

        <div class="seat-section-label">Premium — ₹ 450</div>
        @for($r = 0; $r < 2; $r++)
        <div class="seat-row">
            <div class="seat-row-label">{{ chr(65 + $r) }}</div>
            @for($s = 1; $s <= 12; $s++)
                @if($s == 4 || $s == 10) <div class="seat-gap"></div> @endif
                <div class="seat premium {{ ($r == 0 && $s == 5) ? 'booked' : '' }} {{ ($r == 1 && $s == 7) ? 'selected' : '' }}">{{ $s }}</div>
            @endfor
        </div>
        @endfor

        <div class="seat-section-label">Executive — ₹ 250</div>
        @for($r = 2; $r < 6; $r++)
        <div class="seat-row">
            <div class="seat-row-label">{{ chr(65 + $r) }}</div>
            @for($s = 1; $s <= 14; $s++)
                @if($s == 4 || $s == 12) <div class="seat-gap"></div> @endif
                <div class="seat {{ ($r == 3 && $s == 6) ? 'booked' : '' }}">{{ $s }}</div>
            @endfor
        </div>
        @endfor
    </section>

    <div class="booking-bar">
        <div class="booking-bar-info">
            <div class="booking-seats-selected text-red">A8, A9</div>
            <div class="booking-total">₹ 900.00 <small>+ taxes</small></div>
        </div>
        <button class="btn btn-ghost" onclick="window.location.href='{{ route('movies.show') }}'">Cancel</button>
        <button class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('payment.checkout') }}'">Proceed to Pay</button>
    </div>
</x-layouts.app>