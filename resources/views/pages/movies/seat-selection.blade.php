<x-layouts.app title="Select Seats — TicketFlix">
    <div class="movies-page-header" style="padding-bottom: 32px; padding-top: 40px;">
        <div class="container">
            <div class="breadcrumb" style="margin-bottom: 24px;">
                <span onclick="window.location.href='{{ route('home') }}'">Home</span>
                <span class="breadcrumb-sep">/</span>
                <span onclick="window.location.href='{{ route('movies.index') }}'">Movies</span>
                <span class="breadcrumb-sep">/</span>
                <span onclick="window.location.href='{{ route('movies.show') }}'">Dhurandhar 2</span>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-current">Seat Selection</span>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <h1 class="section-title" style="font-size: 36px; letter-spacing: 2px;">SELECT YOUR SEATS</h1>
                    <div class="text-muted" style="font-size: 14px; margin-top: 4px;">PVR Phoenix Mall | IMAX | Today, 07:15 PM | Dhurandhar 2</div>
                </div>
                <div style="text-align: right;">
                    <div style="font-size: 12px; color: var(--muted); text-transform: uppercase; letter-spacing: 1px;">Show fills up in</div>
                    <div style="font-family: var(--font-mono); font-size: 24px; color: var(--red); font-weight: 700;">14:32</div>
                </div>
            </div>
        </div>
    </div>

    <section class="container" style="padding: 60px 0 160px;">
        <!-- Screen indicator -->
        <div class="seat-screen">
            ▬▬▬▬▬▬▬▬▬▬▬▬ SCREEN ▬▬▬▬▬▬▬▬▬▬▬▬
        </div>
        
        <!-- Legend -->
        <div class="seat-legend">
            <div class="legend-item"><div class="legend-seat ls-available"></div> Available</div>
            <div class="legend-item"><div class="legend-seat ls-selected"></div> Selected</div>
            <div class="legend-item"><div class="legend-seat ls-booked"></div> Booked</div>
            <div class="legend-item"><div class="legend-seat ls-premium"></div> Premium</div>
        </div>

        <!-- Premium Section -->
        <div class="seat-section-label">Premium — ₹ 450</div>
        @foreach(['A', 'B'] as $row)
        <div class="seat-row">
            <div class="seat-row-label">{{ $row }}</div>
            @for($s = 1; $s <= 12; $s++)
                @if($s == 4 || $s == 10) <div class="seat-gap"></div> @endif
                <div class="seat premium {{ ($row == 'A' && ($s == 5 || $s == 6)) ? 'booked' : '' }} {{ ($row == 'B' && ($s == 7 || $s == 8)) ? 'selected' : '' }}">{{ $s }}</div>
            @endfor
            <div class="seat-row-label" style="margin-left: 8px;">{{ $row }}</div>
        </div>
        @endforeach

        <!-- Executive Section -->
        <div class="seat-section-label" style="margin-top: 60px;">Executive — ₹ 250</div>
        @foreach(['C', 'D', 'E', 'F', 'G'] as $row)
        <div class="seat-row">
            <div class="seat-row-label">{{ $row }}</div>
            @for($s = 1; $s <= 14; $s++)
                @if($s == 4 || $s == 12) <div class="seat-gap"></div> @endif
                <div class="seat {{ ($row == 'D' && $s == 6) ? 'booked' : '' }} {{ ($row == 'G' && ($s == 7 || $s == 8 || $s == 9)) ? 'selected' : '' }}">{{ $s }}</div>
            @endfor
            <div class="seat-row-label" style="margin-left: 8px;">{{ $row }}</div>
        </div>
        @endforeach
    </section>

    <!-- Booking Bar -->
    <div class="booking-bar">
        <div class="booking-bar-info">
            <div class="booking-seats-selected" style="color: var(--white); opacity: 0.6; font-size: 13px;">Selected Seats</div>
            <div class="booking-seats-selected" style="color: var(--red); font-size: 18px; letter-spacing: 1px;">G7, G8, G9</div>
        </div>
        <div style="display: flex; align-items: center; gap: 40px;">
            <div class="booking-bar-info" style="text-align: right;">
                <div style="font-size: 12px; color: var(--muted); text-transform: uppercase;">Total Amount</div>
                <div class="booking-total">₹ 1,150.00 <small>incl. taxes</small></div>
            </div>
            <div style="display: flex; gap: 12px;">
                <button class="btn btn-ghost" onclick="window.location.href='{{ route('movies.show') }}'">Cancel</button>
                <button class="btn btn-primary btn-lg" style="padding: 14px 40px; border-radius: 12px;" onclick="window.location.href='{{ route('payment.checkout') }}'">Confirm Selection →</button>
            </div>
        </div>
    </div>
</x-layouts.app>