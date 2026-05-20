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

            <!-- Session Status -->
            @if(session('status'))
                <div class="mb-4 text-green" style="font-size: 14px;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                    @error('email')
                        <span class="text-red" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div style="position: relative; display: flex; align-items: center;">
                        <input type="password" id="password" name="password" class="form-input @error('password') is-invalid @enderror" placeholder="••••••••" required autocomplete="current-password" style="padding-right: 48px; width: 100%;">
                        <button type="button" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 16px; background: none; border: none; color: var(--muted); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 16px; z-index: 10; outline: none; padding: 4px; transition: color 0.2s;" onmouseover="this.style.color='var(--white)'" onmouseout="this.style.color='var(--muted)'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px;">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-red" style="font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-between items-center mb-3">
                    <div class="flex items-center gap-1">
                        <input type="checkbox" id="remember_me" name="remember" style="accent-color: var(--red);">
                        <label for="remember_me" class="text-muted" style="font-size: 13px;">Remember me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-red" style="font-size: 13px; text-decoration: none;">Forgot Password?</a>
                    @endif
                </div>
                <button class="btn btn-primary btn-lg w-full" type="submit">Sign In</button>
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

    <script>
    function togglePasswordVisibility(inputId, btnEl) {
        const input = document.getElementById(inputId);
        const eyeSvg = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        `;
        const eyeSlashSvg = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
            </svg>
        `;
        
        if (input.type === 'password') {
            input.type = 'text';
            btnEl.innerHTML = eyeSlashSvg;
        } else {
            input.type = 'password';
            btnEl.innerHTML = eyeSvg;
        }
    }
    </script>
</x-layouts.app>