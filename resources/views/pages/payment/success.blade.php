<x-layouts.app title="Booking Confirmed — TicketFlix">
@php
    $seatsParam = request()->query('seats', 'G7,G8,G9');
    $formattedSeats = str_replace(',', ', ', $seatsParam);
    $selectedSeats = explode(',', $seatsParam);
    
    $email = request()->query('email');
    if (!$email) {
        $email = auth()->check() ? auth()->user()->email : 'your-email@example.com';
    }
    
    // Recalculate Payment Summary
    $ticketsPrice = 0;
    $ticketGstTotal = 0;
    foreach ($selectedSeats as $seat) {
        $row = substr($seat, 0, 1);
        $price = in_array($row, ['A', 'B']) ? 450 : 250;
        $ticketsPrice += $price;
        
        if ($price <= 100) {
            $ticketGstTotal += $price * 0.05;
        } else {
            $ticketGstTotal += $price * 0.18;
        }
    }
    
    $convenienceFee = $ticketsPrice * 0.05;
    $convenienceFeeGst = $convenienceFee * 0.18;
    $gstAmount = $ticketGstTotal + $convenienceFeeGst;
    
    $discount = (float)request()->query('discount', 0);
    $coupon = request()->query('coupon', '');
    
    $totalAmount = $ticketsPrice + $convenienceFee + $gstAmount - $discount;
    if ($totalAmount < 0) $totalAmount = 0;
@endphp
    <div class="confirm-wrapper">
        <div class="success-icon-circle">✓</div>
        <h1 style="font-size: 32px; font-weight: 700; letter-spacing: 1px;">BOOKING CONFIRMED!</h1>
        <p style="color: var(--muted); margin-top: 8px;">Your tickets have been sent to <strong>{{ $email }}</strong></p>

        <div class="ticket-card">
            <div class="ticket-top">
                <div class="ticket-poster poster-6">🗡️</div>
                <div style="flex: 1;">
                    <div class="badge badge-red mb-2">IMAX · HINDI</div>
                    <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 8px;">DHURANDHAR 2</h2>
                    <div style="font-size: 13px; color: var(--muted);">PVR Phoenix Mall | Screen 4</div>
                    <div style="font-size: 13px; color: var(--muted); margin-top: 4px;">Today, 07:15 PM</div>
                </div>
            </div>

            <div class="ticket-tear"></div>

            <div class="ticket-bottom">
                <div>
                    <div class="ticket-label">Date</div>
                    <div class="ticket-value">24 May 2026</div>
                </div>
                <div>
                    <div class="ticket-label">Time</div>
                    <div class="ticket-value">07:15 PM</div>
                </div>
                <div>
                    <div class="ticket-label">Seats</div>
                    <div class="ticket-value" style="color: var(--red);">{{ $formattedSeats }}</div>
                </div>
                <div>
                    <div class="ticket-label">Order ID</div>
                    <div class="ticket-value">#TF-98231</div>
                </div>

                <div class="qr-section">
                    <div class="qr-code-placeholder">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=TF-98231-CONFIRMED" alt="QR Code">
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 12px; font-weight: 700; letter-spacing: 2px;">TF-98231-X01</div>
                        <div style="font-size: 10px; color: var(--muted2); margin-top: 4px;">Show this QR at the entrance</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Summary Invoice -->
        <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: 16px; padding: 24px; margin-top: 24px; text-align: left;">
            <h3 style="font-size: 14px; font-weight: 700; color: var(--muted); margin-bottom: 16px; text-transform: uppercase; letter-spacing: 1px;">Payment Summary</h3>
            
            <div style="display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 12px;">
                <span style="color: var(--muted2);">Tickets Subtotal ({{ count($selectedSeats) }} Seats)</span>
                <span style="font-weight: 600;">₹ {{ number_format($ticketsPrice, 2) }}</span>
            </div>
            
            <div style="display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 12px;">
                <span style="color: var(--muted2);">Convenience Fee (5%)</span>
                <span style="font-weight: 600;">₹ {{ number_format($convenienceFee, 2) }}</span>
            </div>

            <div style="display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 12px;">
                <span style="color: var(--muted2);">Total GST (Ticket + Fee)</span>
                <span style="font-weight: 600;">₹ {{ number_format($gstAmount, 2) }}</span>
            </div>

            @if($discount > 0)
            <div style="display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 12px; color: var(--green);">
                <span>Discount ({{ $coupon }})</span>
                <span style="font-weight: 600;">−₹ {{ number_format($discount, 2) }}</span>
            </div>
            @endif

            <div style="display: flex; justify-content: space-between; font-size: 18px; margin-top: 16px; padding-top: 16px; border-top: 1px dashed var(--border);">
                <span style="font-weight: 700; color: var(--gold);">Amount Paid</span>
                <span style="font-weight: 700; color: var(--gold);">₹ {{ number_format($totalAmount, 2) }}</span>
            </div>
        </div>

        <div style="margin-top: 40px; display: flex; flex-direction: column; gap: 16px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                <button class="btn btn-ghost" style="padding: 14px; border-radius: 12px;">📥 Download PDF</button>
                <button class="btn btn-ghost" style="padding: 14px; border-radius: 12px;">🔗 Share Ticket</button>
            </div>
            <button class="btn btn-primary btn-lg" style="padding: 16px; border-radius: 12px; font-size: 16px;" onclick="window.location.href='{{ route('home') }}'">Back to Home</button>
        </div>
    </div>
</x-layouts.app>