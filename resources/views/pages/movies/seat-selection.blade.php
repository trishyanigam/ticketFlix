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
                <div class="seat premium {{ ($row == 'A' && ($s == 5 || $s == 6)) ? 'booked' : '' }}" data-seat-id="{{ $row }}{{ $s }}" data-price="450">{{ $s }}</div>
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
                <div class="seat {{ ($row == 'D' && $s == 6) ? 'booked' : '' }}" data-seat-id="{{ $row }}{{ $s }}" data-price="250">{{ $s }}</div>
            @endfor
            <div class="seat-row-label" style="margin-left: 8px;">{{ $row }}</div>
        </div>
        @endforeach
    </section>

    <!-- Booking Bar -->
    <div class="booking-bar">
        <div class="booking-bar-info">
            <div class="booking-seats-selected" style="color: var(--white); opacity: 0.6; font-size: 13px;">Selected Seats</div>
            <div class="booking-seats-selected" style="color: var(--red); font-size: 18px; letter-spacing: 1px;">—</div>
        </div>
        <div style="display: flex; align-items: center; gap: 40px;">
            <div class="booking-bar-info" style="text-align: right; position: relative;">
                <div style="font-size: 12px; color: var(--muted); text-transform: uppercase;">Total Amount</div>
                <div class="booking-total">₹ 0.00 <small>incl. taxes</small></div>
                <div id="view-breakup-btn" style="font-size: 11px; color: var(--gold); cursor: pointer; text-decoration: underline; margin-top: 4px; display: none;" onclick="toggleBreakup(event)">View Breakup</div>
                
                <!-- Price Breakup Popup -->
                <div id="price-breakup-popup" style="display: none; position: absolute; bottom: 100%; right: 0; background: var(--surface); border: 1px solid var(--border); padding: 16px; border-radius: 8px; width: 260px; margin-bottom: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.8); z-index: 100; text-align: left;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 13px;">
                        <span style="color: var(--muted);">Tickets Subtotal</span>
                        <span style="color: var(--white); font-weight: 600;" id="breakup-subtotal">₹ 0.00</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 13px;">
                        <span style="color: var(--muted);">Tickets GST</span>
                        <span style="color: var(--white); font-weight: 600;" id="breakup-ticket-gst">₹ 0.00</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 13px;">
                        <span style="color: var(--muted);">Convenience Fee (5%)</span>
                        <span style="color: var(--white); font-weight: 600;" id="breakup-fee">₹ 0.00</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 13px;">
                        <span style="color: var(--muted);">Fee GST (18%)</span>
                        <span style="color: var(--white); font-weight: 600;" id="breakup-fee-gst">₹ 0.00</span>
                    </div>
                    <div style="border-top: 1px dashed var(--border); padding-top: 12px; display: flex; justify-content: space-between; font-size: 14px;">
                        <span style="color: var(--gold); font-weight: 700;">Total</span>
                        <span style="color: var(--gold); font-weight: 700;" id="breakup-total">₹ 0.00</span>
                    </div>
                </div>
            </div>
            <div style="display: flex; gap: 12px;">
                <button class="btn btn-ghost" onclick="window.location.href='{{ route('movies.show') }}'">Cancel</button>
                <button class="btn btn-primary btn-lg" style="padding: 14px 40px; border-radius: 12px;" id="btn-confirm-selection" onclick="proceedToCheckout()">Confirm Selection →</button>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const seats = document.querySelectorAll('.seat:not(.booked)');
        
        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                seat.classList.toggle('selected');
                updateBookingBar();
            });
        });
        
        function updateBookingBar() {
            const selectedSeats = [];
            let ticketSubtotal = 0;
            let ticketGstTotal = 0;
            
            document.querySelectorAll('.seat.selected').forEach(seat => {
                const seatId = seat.getAttribute('data-seat-id');
                const price = parseInt(seat.getAttribute('data-price'), 10);
                selectedSeats.push(seatId);
                ticketSubtotal += price;
                
                // Ticket GST calculation based on ticket tier
                if (price <= 100) {
                    ticketGstTotal += price * 0.05;
                } else {
                    ticketGstTotal += price * 0.18;
                }
            });
            
            // Sort seats nicely (by row then number)
            selectedSeats.sort((a, b) => {
                const rowA = a.charAt(0);
                const rowB = b.charAt(0);
                const numA = parseInt(a.slice(1), 10);
                const numB = parseInt(b.slice(1), 10);
                if (rowA !== rowB) return rowA.localeCompare(rowB);
                return numA - numB;
            });
            
            const seatsDisplay = document.querySelector('.booking-seats-selected:nth-child(2)');
            const totalDisplay = document.querySelector('.booking-total');
            const viewBreakupBtn = document.getElementById('view-breakup-btn');
            const confirmBtn = document.getElementById('btn-confirm-selection');
            
            if (selectedSeats.length > 0) {
                seatsDisplay.textContent = selectedSeats.join(', ');
                
                // Calculate dynamic total including percentages
                const convenienceFee = ticketSubtotal * 0.05;
                const convenienceFeeGst = convenienceFee * 0.18;
                const total = ticketSubtotal + ticketGstTotal + convenienceFee + convenienceFeeGst;
                
                // Update DOM Breakup
                document.getElementById('breakup-subtotal').textContent = `₹ ${ticketSubtotal.toFixed(2)}`;
                document.getElementById('breakup-ticket-gst').textContent = `₹ ${ticketGstTotal.toFixed(2)}`;
                document.getElementById('breakup-fee').textContent = `₹ ${convenienceFee.toFixed(2)}`;
                document.getElementById('breakup-fee-gst').textContent = `₹ ${convenienceFeeGst.toFixed(2)}`;
                document.getElementById('breakup-total').textContent = `₹ ${total.toFixed(2)}`;
                
                totalDisplay.innerHTML = `₹ ${total.toLocaleString('en-IN', { minimumFractionDigits: 2 })} <small>incl. taxes</small>`;
                viewBreakupBtn.style.display = 'block';
                confirmBtn.disabled = false;
                confirmBtn.style.opacity = '1';
                confirmBtn.style.cursor = 'pointer';
            } else {
                seatsDisplay.textContent = '—';
                totalDisplay.innerHTML = `₹ 0.00 <small>incl. taxes</small>`;
                viewBreakupBtn.style.display = 'none';
                document.getElementById('price-breakup-popup').style.display = 'none';
                confirmBtn.disabled = true;
                confirmBtn.style.opacity = '0.5';
                confirmBtn.style.cursor = 'not-allowed';
            }
        }
        
        window.toggleBreakup = function(event) {
            if (event) event.stopPropagation();
            const popup = document.getElementById('price-breakup-popup');
            popup.style.display = (popup.style.display === 'none' || popup.style.display === '') ? 'block' : 'none';
        };
        
        // Close popup when clicking outside
        document.addEventListener('click', function(event) {
            const popup = document.getElementById('price-breakup-popup');
            const btn = document.getElementById('view-breakup-btn');
            if (popup && popup.style.display === 'block') {
                if (!popup.contains(event.target) && event.target !== btn) {
                    popup.style.display = 'none';
                }
            }
        });
        
        window.proceedToCheckout = function() {
            const selectedSeats = Array.from(document.querySelectorAll('.seat.selected')).map(el => el.getAttribute('data-seat-id'));
            if (selectedSeats.length === 0) {
                alert('Please select at least one seat.');
                return;
            }
            const seatsStr = selectedSeats.join(',');
            window.location.href = `{{ route('payment.checkout') }}?seats=${encodeURIComponent(seatsStr)}`;
        };
        
        // Initialize booking bar on page load
        updateBookingBar();
    });
    </script>
</x-layouts.app>