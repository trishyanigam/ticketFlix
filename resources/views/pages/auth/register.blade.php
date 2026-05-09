<x-layouts.app title="Register — TicketFlix">
    <div class="auth-container">
        <div class="auth-left">
            <div class="auth-left-logo">TICKET<span>FLIX</span></div>
            <div class="auth-left-tagline">Join the World of Premium Entertainment.</div>
            <p>Create an account to unlock personalized recommendations, early access to tickets, and exclusive member-only deals.</p>
            
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
                <div class="auth-tab" onclick="window.location.href='{{ route('login') }}'">Sign In</div>
                <div class="auth-tab active">Register</div>
            </div>

            <form action="#">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-input" placeholder="Rahul Sharma">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mobile</label>
                        <input type="text" class="form-input" placeholder="+91">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-input" placeholder="name@example.com">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-input" placeholder="••••••••">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm</label>
                        <input type="password" class="form-input" placeholder="••••••••">
                    </div>
                </div>
                <p class="text-muted mb-2" style="font-size: 11px;">By registering, you agree to our <span class="text-red">Terms & Conditions</span> and <span class="text-red">Privacy Policy</span>.</p>
                <button class="btn btn-primary btn-lg w-full" type="button" onclick="window.location.href='{{ route('home') }}'">Create Account</button>
            </form>

            <div class="social-auth">
                <div class="social-divider">
                    <span>OR REGISTER WITH</span>
                </div>
                <div class="social-btns">
                    <button class="social-btn">Google</button>
                    <button class="social-btn">Facebook</button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>