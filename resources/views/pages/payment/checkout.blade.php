<x-layouts.app title="Checkout — TicketFlix">
    <div class="container" style="padding-top: 40px; padding-bottom: 80px;">
        <div class="breadcrumb">
            <span onclick="window.location.href='{{ route('home') }}'">Home</span>
            <span class="breadcrumb-sep">/</span>
            <span onclick="window.location.href='{{ route('movies.index') }}'">Movies</span>
            <span class="breadcrumb-sep">/</span>
            <span onclick="window.location.href='{{ route('movies.show') }}'">Dhurandhar 2</span>
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-current">Payment</span>
        </div>

        <h1 class="admin-title" style="margin-top: 24px; margin-bottom: 32px; font-size: 40px;">COMPLETE BOOKING</h1>

        <div class="payment-layout">
            <!-- Left: Payment Steps -->
            <div class="payment-left">
                <!-- Step 1: Contact -->
                <div class="payment-section-box">
                    <div class="payment-step-title">
                        <span class="step-badge">1</span>
                        Contact Information
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-input" value="Arjun Sharma" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-input" value="arjun@email.com" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-input" value="+91 98765 43210" placeholder="+91 XXXXX XXXXX">
                    </div>
                </div>

                <!-- Step 2: Offers -->
                <div class="payment-section-box">
                    <div class="payment-step-title">
                        <span class="step-badge">2</span>
                        Offers & Discounts
                    </div>
                    <div style="display: flex; gap: 12px;">
                        <input type="text" class="form-input" placeholder="Enter promo code" style="font-family: var(--font-mono); letter-spacing: 1px;">
                        <button class="btn btn-ghost" style="padding: 0 24px;">Apply</button>
                    </div>

                    <div class="offer-card">
                        <div style="font-size: 24px;">💳</div>
                        <div style="flex: 1;">
                            <div style="font-size: 13px; font-weight: 700; color: var(--gold); letter-spacing: 1px;">HDFC150</div>
                            <div style="font-size: 11px; color: var(--muted); margin-top: 2px;">Save ₹150 on HDFC Debit/Credit cards</div>
                        </div>
                        <div style="color: var(--green); font-size: 12px; font-weight: 700;">Save ₹150</div>
                    </div>
                    <div class="offer-card" style="background: rgba(255,255,255,0.02); border-color: var(--border);">
                        <div style="font-size: 24px;">🎁</div>
                        <div style="flex: 1;">
                            <div style="font-size: 13px; font-weight: 700; color: var(--muted2); letter-spacing: 1px;">FIRST100</div>
                            <div style="font-size: 11px; color: var(--muted2); margin-top: 2px;">₹100 off for first-time users</div>
                        </div>
                        <div style="color: var(--muted2); font-size: 12px; font-weight: 700;">Applied</div>
                    </div>
                </div>

                <!-- Step 3: Payment Method -->
                <div class="payment-section-box">
                    <div class="payment-step-title">
                        <span class="step-badge">3</span>
                        Payment Method
                    </div>
                    
                    <div class="payment-method-item active">
                        <div class="payment-method-icon">💳</div>
                        <div style="flex: 1;">
                            <div style="font-weight: 600; font-size: 14px;">Credit / Debit Card</div>
                            <div style="font-size: 11px; color: var(--muted);">Visa, Mastercard, RuPay, Maestro</div>
                        </div>
                        <div style="width: 18px; height: 18px; border: 5px solid var(--red); border-radius: 50%;"></div>
                    </div>

                    <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 20px;">
                        <div class="form-group" style="margin-bottom: 16px;">
                            <label class="form-label">Card Number</label>
                            <input type="text" class="form-input" placeholder="XXXX XXXX XXXX XXXX" style="background: var(--surface2);">
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div class="form-group">
                                <label class="form-label">Expiry Date</label>
                                <input type="text" class="form-input" placeholder="MM / YY" style="background: var(--surface2);">
                            </div>
                            <div class="form-group">
                                <label class="form-label">CVV</label>
                                <input type="password" class="form-input" placeholder="•••" style="background: var(--surface2);">
                            </div>
                        </div>
                    </div>

                    <div class="payment-method-item">
                        <div class="payment-method-icon">📱</div>
                        <div style="flex: 1;">
                            <div style="font-weight: 600; font-size: 14px;">UPI Payment</div>
                            <div style="font-size: 11px; color: var(--muted);">Google Pay, PhonePe, Paytm</div>
                        </div>
                        <div style="width: 18px; height: 18px; border: 1px solid var(--border); border-radius: 50%;"></div>
                    </div>

                    <div class="payment-method-item">
                        <div class="payment-method-icon">🏦</div>
                        <div style="flex: 1;">
                            <div style="font-weight: 600; font-size: 14px;">Net Banking</div>
                            <div style="font-size: 11px; color: var(--muted);">All major Indian banks supported</div>
                        </div>
                        <div style="width: 18px; height: 18px; border: 1px solid var(--border); border-radius: 50%;"></div>
                    </div>
                </div>
            </div>

            <!-- Right: Summary -->
            <aside class="summary-sidebar">
                <h3 style="font-size: 16px; font-weight: 700; margin-bottom: 24px; letter-spacing: 1px; text-transform: uppercase; color: var(--muted2);">Booking Summary</h3>
                
                <div style="display: flex; gap: 16px; margin-bottom: 24px;">
                    <div class="poster-6" style="width: 60px; height: 90px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 28px; flex-shrink: 0;">🗡️</div>
                    <div>
                        <div style="font-weight: 700; font-size: 15px;">Dhurandhar 2</div>
                        <div style="font-size: 12px; color: var(--muted); margin-top: 4px;">IMAX · Today, 07:15 PM</div>
                        <div style="font-size: 12px; color: var(--muted);">PVR Phoenix Mall</div>
                        <div style="font-size: 12px; color: var(--red); font-weight: 700; margin-top: 4px;">Seats: G7, G8, G9</div>
                    </div>
                </div>

                <div class="summary-row">
                    <span style="color: var(--muted);">3 × Ticket(s)</span>
                    <span style="font-weight: 600;">₹ 1,050.00</span>
                </div>
                <div class="summary-row">
                    <span style="color: var(--muted);">Convenience Fee</span>
                    <span style="font-weight: 600;">₹ 52.00</span>
                </div>
                <div class="summary-row">
                    <span style="color: var(--muted);">GST (18%)</span>
                    <span style="font-weight: 600;">₹ 198.00</span>
                </div>
                <div class="summary-row" style="color: var(--green);">
                    <span>Discount (HDFC150)</span>
                    <span style="font-weight: 600;">−₹ 150.00</span>
                </div>

                <div class="summary-row total">
                    <span>Total Amount</span>
                    <span style="color: var(--white);">₹ 1,150.00</span>
                </div>

                <button class="btn btn-primary w-full btn-lg" style="margin-top: 32px; padding: 16px; border-radius: 12px; font-size: 16px; letter-spacing: 1px;" onclick="window.location.href='{{ route('confirm') }}'">🔒 Pay ₹ 1,150.00</button>
                
                <div style="text-align: center; margin-top: 20px; font-size: 11px; color: var(--muted2);">
                    🔒 256-bit SSL Encrypted · Secure Payment
                </div>
            </aside>
        </div>
    </div>
</x-layouts.app>