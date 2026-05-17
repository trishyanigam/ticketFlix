<x-layouts.app title="Checkout — TicketFlix">
@php
    $seatsParam = request()->query('seats', 'G7,G8,G9');
    $selectedSeats = explode(',', $seatsParam);
    $selectedSeatsCount = count($selectedSeats);
    
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
    
    // NO coupon code applied by default
    $discount = 0.00;
    $totalAmount = $ticketsPrice + $convenienceFee + $gstAmount - $discount;
    if ($totalAmount < 0) $totalAmount = 0;
    
    // Enforce FIRST100 rule: check if user has previous bookings
    $isFirstBooking = true;
    if (auth()->check()) {
        $isFirstBooking = !\App\Models\Booking::where('user_name', auth()->user()->name)->exists();
    }
@endphp
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
                            <input type="text" id="contact-name" class="form-input" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" id="contact-email" class="form-input" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" id="contact-phone" class="form-input" placeholder="+91 XXXXX XXXXX">
                    </div>
                </div>

                <!-- Step 2: Offers -->
                <div class="payment-section-box">
                    <div class="payment-step-title">
                        <span class="step-badge">2</span>
                        Offers & Discounts
                    </div>
                    <div style="display: flex; gap: 12px;">
                        <input type="text" id="promo-input" class="form-input" placeholder="Enter promo code" style="font-family: var(--font-mono); letter-spacing: 1px;">
                        <button class="btn btn-ghost" id="btn-apply-promo" style="padding: 0 24px;" onclick="applyPromoCode()">Apply</button>
                    </div>

                    <div class="offer-card" id="card-hdfc150" style="cursor: pointer;" onclick="selectOffer('HDFC150')">
                        <div style="font-size: 24px;">💳</div>
                        <div style="flex: 1;">
                            <div style="font-size: 13px; font-weight: 700; color: var(--gold); letter-spacing: 1px;">HDFC150</div>
                            <div style="font-size: 11px; color: var(--muted); margin-top: 2px;">Save ₹150 on HDFC Debit/Credit cards</div>
                        </div>
                        <div style="color: var(--gold); font-size: 12px; font-weight: 700;" id="status-hdfc150">Apply</div>
                    </div>
                    
                    <div class="offer-card" id="card-first100" style="cursor: {{ $isFirstBooking ? 'pointer' : 'not-allowed' }}; opacity: {{ $isFirstBooking ? '1' : '0.4' }}; background: rgba(255,255,255,0.02); border-color: var(--border);" onclick="{{ $isFirstBooking ? "selectOffer('FIRST100')" : "alert('FIRST100 promo code is only valid for your first booking.')" }}">
                        <div style="font-size: 24px;">🎁</div>
                        <div style="flex: 1;">
                            <div style="font-size: 13px; font-weight: 700; color: var(--gold); letter-spacing: 1px;">FIRST100</div>
                            <div style="font-size: 11px; color: var(--muted); margin-top: 2px;">₹100 off for first-time users</div>
                        </div>
                        <div style="color: var(--gold); font-size: 12px; font-weight: 700;" id="status-first100">
                            {{ $isFirstBooking ? 'Apply' : 'First Booking Only' }}
                        </div>
                    </div>
                </div>

                <!-- Step 3: Payment Method -->
                <div class="payment-section-box" id="payment-method-section" style="display: none; opacity: 0; transition: opacity 0.4s ease;">
                    <div class="payment-step-title">
                        <span class="step-badge">3</span>
                        Payment Method
                    </div>
                    
                    <div class="payment-method-item active" id="pm-card" onclick="selectPaymentMethod('card')" style="cursor: pointer;">
                        <div class="payment-method-icon">💳</div>
                        <div style="flex: 1;">
                            <div style="font-weight: 600; font-size: 14px;">Credit / Debit Card</div>
                            <div style="font-size: 11px; color: var(--muted);">Visa, Mastercard, RuPay, Maestro</div>
                        </div>
                        <div id="pm-card-radio" style="width: 18px; height: 18px; border: 5px solid var(--red); border-radius: 50%;"></div>
                    </div>

                    <div id="pm-card-details" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 20px;">
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

                    <div class="payment-method-item" id="pm-upi" onclick="selectPaymentMethod('upi')" style="cursor: pointer;">
                        <div class="payment-method-icon">📱</div>
                        <div style="flex: 1;">
                            <div style="font-weight: 600; font-size: 14px;">UPI Payment</div>
                            <div style="font-size: 11px; color: var(--muted);">Google Pay, PhonePe, Paytm</div>
                        </div>
                        <div id="pm-upi-radio" style="width: 18px; height: 18px; border: 1px solid var(--border); border-radius: 50%;"></div>
                    </div>
                    
                    <div id="pm-upi-details" style="display: none; background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 20px; text-align: center;">
                        <div style="margin-bottom: 16px;">
                            <img id="upi-qr-code" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=upi://pay?pa=trishyanigam@okicici&pn=Trishya%20Nigam&am={{ $totalAmount }}&cu=INR" alt="UPI QR Code" style="border-radius: 8px; border: 4px solid var(--white);">
                        </div>
                        <div style="font-size: 12px; color: var(--muted); margin-bottom: 8px;">Scan QR with any UPI app to pay to Trishya Nigam</div>
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
                        <div style="font-size: 12px; color: var(--red); font-weight: 700; margin-top: 4px;">Seats: {{ implode(', ', $selectedSeats) }}</div>
                    </div>
                </div>

                <div class="summary-row">
                    <span style="color: var(--muted);" id="summary-tickets-count">{{ $selectedSeatsCount }} × Ticket(s)</span>
                    <span style="font-weight: 600;" id="summary-tickets-price">₹ {{ number_format($ticketsPrice, 2) }}</span>
                </div>
                <div class="summary-row">
                    <span style="color: var(--muted);">Convenience Fee</span>
                    <span style="font-weight: 600;" id="summary-convenience-fee">₹ {{ number_format($convenienceFee, 2) }}</span>
                </div>
                <div class="summary-row">
                    <span style="color: var(--muted);">GST (18%)</span>
                    <span style="font-weight: 600;" id="summary-gst">₹ {{ number_format($gstAmount, 2) }}</span>
                </div>
                <div class="summary-row" style="color: var(--green); display: none;" id="summary-discount-row">
                    <span id="summary-discount-label">Discount</span>
                    <span style="font-weight: 600;" id="summary-discount-amount">−₹ 0.00</span>
                </div>

                <div class="summary-row total">
                    <span>Total Amount</span>
                    <span style="color: var(--white);" id="summary-total">₹ {{ number_format($totalAmount, 2) }}</span>
                </div>

                <button class="btn btn-primary w-full btn-lg" id="btn-pay" style="margin-top: 32px; padding: 16px; border-radius: 12px; font-size: 16px; letter-spacing: 1px;">🔒 Pay ₹ {{ number_format($totalAmount, 2) }}</button>
                
                <div style="text-align: center; margin-top: 20px; font-size: 11px; color: var(--muted2);">
                    🔒 256-bit SSL Encrypted · Secure Payment
                </div>
            </aside>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const isFirstBooking = {{ $isFirstBooking ? 'true' : 'false' }};
        const ticketsPrice = {{ $ticketsPrice }};
        const ticketGstTotal = {{ $ticketGstTotal }};
        
        let appliedCoupon = null;
        let discount = 0.00;
        
        window.selectPaymentMethod = function(method) {
            const cardItem = document.getElementById('pm-card');
            const upiItem = document.getElementById('pm-upi');
            const cardRadio = document.getElementById('pm-card-radio');
            const upiRadio = document.getElementById('pm-upi-radio');
            const cardDetails = document.getElementById('pm-card-details');
            const upiDetails = document.getElementById('pm-upi-details');
            
            if (method === 'card') {
                cardItem.classList.add('active');
                upiItem.classList.remove('active');
                cardRadio.style.border = '5px solid var(--red)';
                upiRadio.style.border = '1px solid var(--border)';
                cardDetails.style.display = 'block';
                upiDetails.style.display = 'none';
            } else if (method === 'upi') {
                upiItem.classList.add('active');
                cardItem.classList.remove('active');
                upiRadio.style.border = '5px solid var(--red)';
                cardRadio.style.border = '1px solid var(--border)';
                upiDetails.style.display = 'block';
                cardDetails.style.display = 'none';
            }
        };
        
        window.selectOffer = function(code) {
            if (code === 'FIRST100' && !isFirstBooking) {
                alert('FIRST100 promo code is only valid for your first booking.');
                return;
            }
            
            if (appliedCoupon === code) {
                // Remove coupon
                appliedCoupon = null;
                discount = 0.00;
                document.getElementById('promo-input').value = '';
            } else {
                // Apply coupon
                appliedCoupon = code;
                discount = (code === 'HDFC150') ? 150.00 : 100.00;
                document.getElementById('promo-input').value = code;
            }
            
            updateSummary();
        };
        
        window.applyPromoCode = function() {
            const input = document.getElementById('promo-input').value.trim().toUpperCase();
            if (!input) {
                // If empty, remove currently applied coupon
                appliedCoupon = null;
                discount = 0.00;
                updateSummary();
                return;
            }
            
            if (input === 'HDFC150') {
                appliedCoupon = 'HDFC150';
                discount = 150.00;
            } else if (input === 'FIRST100') {
                if (!isFirstBooking) {
                    alert('FIRST100 promo code is only valid for your first booking.');
                    return;
                }
                appliedCoupon = 'FIRST100';
                discount = 100.00;
            } else {
                alert('Invalid coupon code.');
                return;
            }
            
            updateSummary();
        };
        
        function updateSummary() {
            const subtotal = ticketsPrice;
            const convenienceFee = subtotal * 0.05;
            const convenienceFeeGst = convenienceFee * 0.18;
            const gst = ticketGstTotal + convenienceFeeGst;
            
            let total = subtotal + convenienceFee + gst - discount;
            if (total < 0) total = 0;
            
            // Update Summary Row Display
            const discountRow = document.getElementById('summary-discount-row');
            if (discount > 0) {
                discountRow.style.display = 'flex';
                document.getElementById('summary-discount-label').textContent = `Discount (${appliedCoupon})`;
                document.getElementById('summary-discount-amount').textContent = `−₹ ${discount.toFixed(2)}`;
            } else {
                discountRow.style.display = 'none';
            }
            
            document.getElementById('summary-total').textContent = '₹ ' + total.toLocaleString('en-IN', { minimumFractionDigits: 2 });
            
            // Update UPI QR Code dynamically based on final total
            const qrCodeImage = document.getElementById('upi-qr-code');
            if (qrCodeImage) {
                qrCodeImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=upi://pay?pa=trishyanigam@okicici&pn=Trishya%20Nigam&am=${total.toFixed(2)}&cu=INR`;
            }
            
            // Update Pay Button
            const payBtn = document.getElementById('btn-pay');
            const paymentSection = document.getElementById('payment-method-section');
            
            if (paymentSection.style.display === 'none' || paymentSection.style.display === '') {
                payBtn.textContent = `🔒 Proceed to Pay ₹ ${total.toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;
            } else {
                payBtn.textContent = `🔒 Complete Payment ₹ ${total.toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;
            }
            
            payBtn.onclick = function() {
                if (paymentSection.style.display === 'none' || paymentSection.style.display === '') {
                    // Reveal Payment Method section
                    paymentSection.style.display = 'block';
                    void paymentSection.offsetWidth; // trigger reflow
                    paymentSection.style.opacity = '1';
                    
                    // Smooth scroll to the payment methods
                    paymentSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    
                    // Update button text to final state
                    payBtn.textContent = `🔒 Complete Payment ₹ ${total.toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;
                } else {
                    // Final submit action
                    const nameVal = encodeURIComponent(document.getElementById('contact-name').value.trim());
                    const emailVal = encodeURIComponent(document.getElementById('contact-email').value.trim());
                    const phoneVal = encodeURIComponent(document.getElementById('contact-phone').value.trim());
                    
                    window.location.href = `{{ route('payment.success') }}?seats={{ urlencode($seatsParam) }}&discount=${discount}&coupon=${appliedCoupon || ''}&name=${nameVal}&email=${emailVal}&phone=${phoneVal}`;
                }
            };
            
            // Update Coupon Card UI highlights
            const cardHdfc = document.getElementById('card-hdfc150');
            const cardFirst = document.getElementById('card-first100');
            const statusHdfc = document.getElementById('status-hdfc150');
            const statusFirst = document.getElementById('status-first100');
            
            if (appliedCoupon === 'HDFC150') {
                cardHdfc.style.background = 'rgba(245,200,66,0.08)';
                cardHdfc.style.borderColor = 'var(--gold)';
                statusHdfc.textContent = 'Applied';
                statusHdfc.style.color = 'var(--green)';
                
                if (cardFirst) {
                    cardFirst.style.background = 'rgba(255,255,255,0.02)';
                    cardFirst.style.borderColor = 'var(--border)';
                    if (isFirstBooking) {
                        statusFirst.textContent = 'Apply';
                        statusFirst.style.color = 'var(--gold)';
                    }
                }
            } else if (appliedCoupon === 'FIRST100') {
                if (cardFirst) {
                    cardFirst.style.background = 'rgba(245,200,66,0.08)';
                    cardFirst.style.borderColor = 'var(--gold)';
                    statusFirst.textContent = 'Applied';
                    statusFirst.style.color = 'var(--green)';
                }
                
                cardHdfc.style.background = 'rgba(255,255,255,0.02)';
                cardHdfc.style.borderColor = 'var(--border)';
                statusHdfc.textContent = 'Apply';
                statusHdfc.style.color = 'var(--gold)';
            } else {
                cardHdfc.style.background = 'rgba(255,255,255,0.02)';
                cardHdfc.style.borderColor = 'var(--border)';
                statusHdfc.textContent = 'Apply';
                statusHdfc.style.color = 'var(--gold)';
                
                if (cardFirst) {
                    cardFirst.style.background = 'rgba(255,255,255,0.02)';
                    cardFirst.style.borderColor = 'var(--border)';
                    if (isFirstBooking) {
                        statusFirst.textContent = 'Apply';
                        statusFirst.style.color = 'var(--gold)';
                    }
                }
            }
            
            // Update promo input button text
            const applyBtn = document.getElementById('btn-apply-promo');
            if (appliedCoupon) {
                applyBtn.textContent = 'Remove';
                applyBtn.style.color = 'var(--red)';
            } else {
                applyBtn.textContent = 'Apply';
                applyBtn.style.color = '';
            }
        }
    });
    </script>
</x-layouts.app>