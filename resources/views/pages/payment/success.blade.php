<x-layouts.app title="Booking Confirmed — TicketFlix">
    <div class="confirm-wrapper">
        <div class="success-icon">✅</div>
        <h1 class="confirm-title">BOOKING CONFIRMED!</h1>
        <p class="confirm-sub">Your tickets have been sent to trishya@example.com</p>

        <div class="ticket-card">
            <div class="ticket-top">
                <div class="ticket-thumb poster-1">🔥</div>
                <div class="ticket-info">
                    <div class="badge badge-red mb-1">Hindi 2D</div>
                    <div class="ticket-title">BLAZE OF GLORY</div>
                    <div class="ticket-meta">
                        <span>PVR: ICON, Phoenix Palladium</span>
                        <span>Today, 24 May | 01:45 PM</span>
                    </div>
                </div>
            </div>
            <div class="ticket-tear"></div>
            <div class="ticket-bottom">
                <div class="ticket-details-grid">
                    <div class="ticket-detail">
                        <div class="ticket-detail-label">Seats</div>
                        <div class="ticket-detail-val">A8, A9</div>
                    </div>
                    <div class="ticket-detail">
                        <div class="ticket-detail-label">Quantity</div>
                        <div class="ticket-detail-val">2 Tickets</div>
                    </div>
                    <div class="ticket-detail">
                        <div class="ticket-detail-label">Order ID</div>
                        <div class="ticket-detail-val">#TF-98231</div>
                    </div>
                    <div class="ticket-detail">
                        <div class="ticket-detail-label">Total</div>
                        <div class="ticket-detail-val">₹ 900.00</div>
                    </div>
                </div>
                <div class="qr-code"></div>
            </div>
        </div>

        <div class="booking-id">TF-98231-X01</div>

        <div class="share-row">
            <button class="share-btn">📥 Download PDF</button>
            <button class="share-btn">🔗 Share Ticket</button>
        </div>

        <button class="btn btn-ghost mt-2" onclick="window.location.href='{{ route('home') }}'">Back to Home</button>
    </div>
</x-layouts.app>