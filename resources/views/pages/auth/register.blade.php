<x-layouts.app title="Register — TicketFlix">
    <div class="auth-container">
        <div class="auth-left">
            <div class="auth-left-logo">TICKET<span>FLIX</span></div>
            <div class="auth-left-tagline">Create an account to start booking.</div>
            <p style="color: rgba(255,255,255,0.6); line-height: 1.6;">Get access to exclusive movie premieres, early bird event tickets, and personalized recommendations based on your interests.</p>
            
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

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Arjun Sharma" required autofocus>
                    @error('name')
                        <span class="text-red" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="name@example.com" required>
                    @error('email')
                        <span class="text-red" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input @error('password') is-invalid @enderror" placeholder="••••••••" required>
                    @error('password')
                        <span class="text-red" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="••••••••" required>
                </div>
                <div class="flex items-center gap-1 mb-4">
                    <input type="checkbox" id="terms" name="terms" style="accent-color: var(--red);" required>
                    <label for="terms" class="text-muted" style="font-size: 13px;">I agree to the <a href="#" class="text-red" style="text-decoration: none;">Terms & Conditions</a></label>
                </div>
                <button class="btn btn-primary btn-lg w-full" type="submit">Create Account</button>
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