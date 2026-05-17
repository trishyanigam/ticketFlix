@php
    $title = request()->query('title', 'TOXIC - Abhishek Upmanyu');
    $image = request()->query('image', 'event1b.jpg');
    $format = request()->query('formats', 'Comedy');
    $basePrice = request()->query('price', '1499');
    
    // Pass query string forward
    $queryString = request()->getQueryString();
    $querySuffix = $queryString ? '&' . $queryString : '';
@endphp
<x-layouts.app title="Select Tickets — TicketFlix">
    <div class="movies-page-header" style="padding-bottom: 32px; padding-top: 40px;">
        <div class="container">
            <div class="breadcrumb" style="margin-bottom: 24px;">
                <span onclick="window.location.href='{{ route('home') }}'">Home</span>
                <span class="breadcrumb-sep">/</span>
                <span onclick="window.location.href='{{ route('events.index') }}'">Events</span>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-current">{{ $title }}</span>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-current">Select Tickets</span>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <h1 class="section-title" style="font-size: 36px; letter-spacing: 2px;">SELECT TICKET TYPE</h1>
                    <div class="text-muted" style="font-size: 14px; margin-top: 4px;">{{ $format }} | {{ $title }}</div>
                </div>
            </div>
        </div>
    </div>

    <section class="container" style="padding: 60px 0 160px; max-width: 800px;">
        <div style="display: flex; flex-direction: column; gap: 24px;">
            <!-- Category 1 -->
            <div class="ticket-category-card" style="background: var(--surface2); border: 1px solid var(--border); border-radius: 16px; padding: 24px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h3 style="font-size: 18px; font-weight: 700; color: var(--white); margin-bottom: 8px;">General Admission</h3>
                    <div style="color: var(--muted); font-size: 14px;">Entry to the event area. Standard viewing.</div>
                    <div style="font-size: 20px; font-weight: 700; color: var(--gold); margin-top: 12px;">₹ {{ $basePrice }}</div>
                </div>
                <div style="display: flex; align-items: center; gap: 16px; background: rgba(0,0,0,0.3); padding: 8px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                    <button class="qty-btn minus" data-type="General" data-price="{{ $basePrice }}" style="width: 32px; height: 32px; border-radius: 8px; border: none; background: rgba(255,255,255,0.1); color: var(--white); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 18px;">-</button>
                    <span class="qty-val" id="qty-General" style="font-size: 18px; font-weight: 700; width: 24px; text-align: center;">0</span>
                    <button class="qty-btn plus" data-type="General" data-price="{{ $basePrice }}" style="width: 32px; height: 32px; border-radius: 8px; border: none; background: rgba(255,255,255,0.1); color: var(--white); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 18px;">+</button>
                </div>
            </div>

            <!-- Category 2 -->
            <div class="ticket-category-card" style="background: var(--surface2); border: 1px solid var(--border); border-radius: 16px; padding: 24px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h3 style="font-size: 18px; font-weight: 700; color: var(--white); margin-bottom: 8px;">Fan Pit (Front Row)</h3>
                    <div style="color: var(--muted); font-size: 14px;">Closest to the stage. Premium standing area.</div>
                    <div style="font-size: 20px; font-weight: 700; color: var(--gold); margin-top: 12px;">₹ {{ (float)$basePrice + 1500 }}</div>
                </div>
                <div style="display: flex; align-items: center; gap: 16px; background: rgba(0,0,0,0.3); padding: 8px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                    <button class="qty-btn minus" data-type="Fan Pit" data-price="{{ (float)$basePrice + 1500 }}" style="width: 32px; height: 32px; border-radius: 8px; border: none; background: rgba(255,255,255,0.1); color: var(--white); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 18px;">-</button>
                    <span class="qty-val" id="qty-FanPit" style="font-size: 18px; font-weight: 700; width: 24px; text-align: center;">0</span>
                    <button class="qty-btn plus" data-type="Fan Pit" data-price="{{ (float)$basePrice + 1500 }}" style="width: 32px; height: 32px; border-radius: 8px; border: none; background: rgba(255,255,255,0.1); color: var(--white); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 18px;">+</button>
                </div>
            </div>

            <!-- Category 3 -->
            <div class="ticket-category-card" style="background: var(--surface2); border: 1px solid var(--border); border-radius: 16px; padding: 24px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h3 style="font-size: 18px; font-weight: 700; color: var(--white); margin-bottom: 8px;">VIP Lounge</h3>
                    <div style="color: var(--muted); font-size: 14px;">Dedicated seating, food & beverages included.</div>
                    <div style="font-size: 20px; font-weight: 700; color: var(--gold); margin-top: 12px;">₹ {{ (float)$basePrice * 2 + 1000 }}</div>
                </div>
                <div style="display: flex; align-items: center; gap: 16px; background: rgba(0,0,0,0.3); padding: 8px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                    <button class="qty-btn minus" data-type="VIP Lounge" data-price="{{ (float)$basePrice * 2 + 1000 }}" style="width: 32px; height: 32px; border-radius: 8px; border: none; background: rgba(255,255,255,0.1); color: var(--white); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 18px;">-</button>
                    <span class="qty-val" id="qty-VIP" style="font-size: 18px; font-weight: 700; width: 24px; text-align: center;">0</span>
                    <button class="qty-btn plus" data-type="VIP Lounge" data-price="{{ (float)$basePrice * 2 + 1000 }}" style="width: 32px; height: 32px; border-radius: 8px; border: none; background: rgba(255,255,255,0.1); color: var(--white); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 18px;">+</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Bar -->
    <div class="booking-bar">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 32px;">
                <div>
                    <div style="font-size: 12px; color: var(--muted); margin-bottom: 4px; text-transform: uppercase; letter-spacing: 1px;">Tickets Selected</div>
                    <div style="font-weight: 700; font-size: 18px; color: var(--white);" id="tickets-selected">—</div>
                </div>
                <div style="width: 1px; height: 40px; background: rgba(255,255,255,0.1);"></div>
                <div>
                    <div style="font-size: 12px; color: var(--muted); margin-bottom: 4px; text-transform: uppercase; letter-spacing: 1px;">Subtotal</div>
                    <div style="font-weight: 700; font-size: 24px; color: var(--white);" id="total-price">₹ 0.00 <small style="font-size: 12px; color: var(--muted); font-weight: 400;">excl. taxes</small></div>
                </div>
            </div>
            
            <button class="btn btn-primary btn-lg" id="btn-proceed" disabled style="opacity: 0.5; cursor: not-allowed; padding: 16px 48px; border-radius: 12px; font-size: 16px;" onclick="proceedToCheckout()">Proceed to Checkout</button>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        let selectedTickets = [];
        let totalAmount = 0;
        
        const updateBookingBar = () => {
            const btn = document.getElementById('btn-proceed');
            const selectedDisplay = document.getElementById('tickets-selected');
            const totalDisplay = document.getElementById('total-price');
            
            if (selectedTickets.length > 0) {
                const count = selectedTickets.reduce((sum, item) => sum + item.qty, 0);
                selectedDisplay.textContent = `${count} Ticket(s)`;
                totalDisplay.innerHTML = `₹ ${totalAmount.toLocaleString('en-IN', { minimumFractionDigits: 2 })} <small style="font-size: 12px; color: var(--muted); font-weight: 400;">excl. taxes</small>`;
                btn.disabled = false;
                btn.style.opacity = '1';
                btn.style.cursor = 'pointer';
            } else {
                selectedDisplay.textContent = '—';
                totalDisplay.innerHTML = `₹ 0.00 <small style="font-size: 12px; color: var(--muted); font-weight: 400;">excl. taxes</small>`;
                btn.disabled = true;
                btn.style.opacity = '0.5';
                btn.style.cursor = 'not-allowed';
            }
        };

        document.querySelectorAll('.qty-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const isPlus = btn.classList.contains('plus');
                const type = btn.getAttribute('data-type');
                const price = parseFloat(btn.getAttribute('data-price'));
                const valSpan = btn.parentElement.querySelector('.qty-val');
                let currentQty = parseInt(valSpan.textContent);
                
                if (isPlus) {
                    if (currentQty >= 10) return; // max 10 per category
                    currentQty++;
                } else {
                    if (currentQty <= 0) return;
                    currentQty--;
                }
                
                valSpan.textContent = currentQty;
                
                // Update selected tickets array
                const existingIndex = selectedTickets.findIndex(t => t.type === type);
                if (existingIndex > -1) {
                    if (currentQty === 0) {
                        selectedTickets.splice(existingIndex, 1);
                    } else {
                        selectedTickets[existingIndex].qty = currentQty;
                    }
                } else if (currentQty > 0) {
                    selectedTickets.push({ type, price, qty: currentQty });
                }
                
                // Update total
                totalAmount = selectedTickets.reduce((sum, item) => sum + (item.price * item.qty), 0);
                
                updateBookingBar();
            });
        });
        
        window.proceedToCheckout = function() {
            if (selectedTickets.length === 0) return;
            
            // Format data for checkout
            const seatsList = [];
            selectedTickets.forEach(item => {
                for(let i=0; i<item.qty; i++) {
                    seatsList.push(item.type);
                }
            });
            const seatsStr = seatsList.join(',');
            
            // Calculate blended average price so checkout receives correct total
            const avgPrice = totalAmount / seatsList.length;
            
            // Build new query params
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('seats', seatsStr);
            urlParams.set('price', avgPrice);
            
            window.location.href = `{{ route('payment.checkout') }}?${urlParams.toString()}`;
        };
    });
    </script>
</x-layouts.app>
