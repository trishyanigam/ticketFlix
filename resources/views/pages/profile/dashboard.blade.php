<x-layouts.app title="My Profile — TicketFlix">
    <div class="container" style="padding: 60px 0;">
        <div class="profile-layout">
            <aside class="profile-sidebar">
                <div class="profile-avatar">TN</div>
                <div class="profile-name">Trishya Nigam</div>
                <div class="profile-email">trishya@example.com</div>
                
                <div class="profile-stat-row">
                    <div class="profile-stat">
                        <div class="profile-stat-val">24</div>
                        <div class="profile-stat-label">Bookings</div>
                    </div>
                    <div class="profile-stat">
                        <div class="profile-stat-val">3</div>
                        <div class="profile-stat-label">Rewards</div>
                    </div>
                </div>

                <nav class="profile-nav">
                    <div class="profile-nav-item active">🎫 My Bookings</div>
                    <div class="profile-nav-item">❤️ Wishlist</div>
                    <div class="profile-nav-item">🎁 Rewards</div>
                    <div class="profile-nav-item">💳 Saved Payments</div>
                    <div class="profile-nav-item" style="margin-top: 20px; color: var(--red);">🚪 Sign Out</div>
                </nav>
            </aside>

            <main class="profile-content">
                <div class="section-header">
                    <div class="section-title">My <span>Bookings</span></div>
                    <div class="pill-tabs">
                        <button class="pill-tab active">Upcoming</button>
                        <button class="pill-tab">Completed</button>
                        <button class="pill-tab">Cancelled</button>
                    </div>
                </div>

                <div class="booking-history">
                    <div class="booking-history-item">
                        <div class="booking-thumb poster-1">🔥</div>
                        <div class="booking-info">
                            <div class="booking-title">Blaze of Glory</div>
                            <div class="booking-meta">PVR: ICON, Lower Parel | Today, 01:45 PM</div>
                            <div class="booking-status text-green">● Confirmed</div>
                        </div>
                        <button class="btn btn-ghost btn-sm" onclick="window.location.href='{{ route('payment.success') }}'">View Ticket</button>
                    </div>

                    <div class="booking-history-item">
                        <div class="booking-thumb poster-2">🎸</div>
                        <div class="booking-info">
                            <div class="booking-title">Rock On: Live Concert</div>
                            <div class="booking-meta">Stadium Arena | 24 May, 07:00 PM</div>
                            <div class="booking-status text-gold">● Waiting for Payment</div>
                        </div>
                        <button class="btn btn-primary btn-sm">Complete Payment</button>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layouts.app>