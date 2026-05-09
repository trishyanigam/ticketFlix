<x-layouts.app title="Login — TicketFlix">
    <div class="auth-container">
        <div class="auth-left">
            <div class="auth-left-logo">TICKET<span>FLIX</span></div>
            <div class="auth-left-tagline">Experience Entertainment Like Never Before.</div>
            <p>Join thousands of movie buffs and event seekers. Book tickets, earn rewards, and stay updated with the latest in entertainment.</p>
            
            <div class="auth-features">
                <div class="auth-feat">
                    <div class="auth-feat-icon">🎟</div>
                    <span>Fast & Secure Bookings</span>
                </div>
                <div class="auth-feat">
                    <div class="auth-feat-icon">🎁</div>
                    <span>Exclusive Rewards & Offers</span>
                </div>
                <div class="auth-feat">
                    <div class="auth-feat-icon">📱</div>
                    <span>M-Tickets on your Phone</span>
                </div>
            </div>
        </div>
        <div class="auth-right">
            <div class="auth-tabs">
                <div class="auth-tab active">Sign In</div>
                <div class="auth-tab" onclick="window.location.href='{{ route('register') }}'">Register</div>
            </div>

            <form action="#">
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-input" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-input" placeholder="••••••••">
                </div>
                <div class="flex justify-between items-center mb-3">
                    <div class="flex items-center gap-1">
                        <input type="checkbox" id="remember" style="accent-color: var(--red);">
                        <label for="remember" class="text-muted" style="font-size: 13px;">Remember me</label>
                    </div>
                    <a href="#" class="text-red" style="font-size: 13px; text-decoration: none;">Forgot Password?</a>
                </div>
                <button class="btn btn-primary btn-lg w-full" type="button" onclick="window.location.href='{{ route('home') }}'">Sign In</button>
            </form>

            <div class="social-auth">
                <div class="social-divider">
                    <span>OR CONTINUE WITH</span>
                </div>
                <div class="social-btns">
                    <button class="social-btn">Google</button>
                    <button class="social-btn">Facebook</button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>