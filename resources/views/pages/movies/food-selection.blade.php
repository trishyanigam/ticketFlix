<x-layouts.app title="Food & Beverages — TicketFlix">
@php
    $title = request()->query('title', 'Dhurandhar 2');
    $rating = request()->query('rating', '8.8');
    $image = request()->query('image', '');
    $poster = request()->query('poster', 'poster-6');
    $emoji = request()->query('emoji', '🗡️');
    $genre = request()->query('genre', 'Action/Thriller');
    $duration = request()->query('duration', '2h 37m');
    $formats = request()->query('formats', 'IMAX 2D, 2D');
    $languages = request()->query('languages', 'Hindi');
    $seatsParam = request()->query('seats', 'G7,G8');
    $selectedSeats = explode(',', $seatsParam);
    $selectedSeatsCount = count($selectedSeats);
    
    $queryString = request()->getQueryString();
    $querySuffix = $queryString ? '?' . $queryString : '';
    
    // Dynamic Ticket Price calculation based on seat rows
    $ticketsPrice = 0;
    foreach ($selectedSeats as $seat) {
        $row = substr($seat, 0, 1);
        if (in_array($row, ['A', 'B', 'C', 'D', 'E'])) {
            $price = 250;
        } elseif (in_array($row, ['F', 'G'])) {
            $price = 450;
        } elseif ($row === 'H') {
            $price = 650;
        } else {
            $price = 250;
        }
        $ticketsPrice += $price;
    }
@endphp

<div class="container" style="padding-top: 40px; padding-bottom: 80px;">
    <!-- Progress Indicator -->
    <div style="display: flex; justify-content: center; gap: 40px; margin-bottom: 40px; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px;">
        <span style="color: var(--muted); cursor: pointer;" onclick="history.back()">1. Seats Selected</span>
        <span style="color: var(--red); border-bottom: 2px solid var(--red); padding-bottom: 6px;">2. Food & Drinks</span>
        <span style="color: var(--muted); opacity: 0.5;">3. Checkout</span>
    </div>

    <!-- Page Header -->
    <div class="section-header" style="margin-bottom: 32px; border-bottom: 1px solid var(--border); padding-bottom: 20px;">
        <div>
            <h1 class="section-title" style="font-size: 32px; margin-bottom: 8px;">Grab some <span>Snacks</span></h1>
            <p style="color: var(--muted2); font-size: 14px; margin-top: 4px;">Skip the queues! Pre-book delicious meals and save up to 20%</p>
        </div>
        <div style="text-align: right; background: rgba(255,255,255,0.02); padding: 12px 20px; border-radius: 12px; border: 1px solid var(--border);">
            <div style="font-size: 11px; color: var(--muted); font-weight: 700; text-transform: uppercase;">Selected Movie</div>
            <div style="font-size: 16px; font-weight: 800; color: var(--white); margin: 2px 0;">{{ $emoji }} {{ strtoupper($title) }}</div>
            <div style="font-size: 12px; color: var(--red); font-weight: 700;">Seats: {{ implode(', ', $selectedSeats) }}</div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 360px; gap: 32px; align-items: start;">
        <!-- Left Side: Food Menu -->
        <div>
            <!-- Categories -->
            <div style="display: flex; gap: 12px; margin-bottom: 24px; overflow-x: auto; padding-bottom: 4px;">
                <button class="menu-tab active" onclick="filterMenu('all')" style="padding: 10px 20px; border-radius: 12px; border: 1px solid var(--red); background: var(--red); color: white; font-weight: 700; font-size: 13px; cursor: pointer;">✨ All items</button>
                <button class="menu-tab" onclick="filterMenu('combo')" style="padding: 10px 20px; border-radius: 12px; border: 1px solid var(--border); background: rgba(255,255,255,0.02); color: var(--muted); font-weight: 700; font-size: 13px; cursor: pointer;">🍿 Combos</button>
                <button class="menu-tab" onclick="filterMenu('popcorn')" style="padding: 10px 20px; border-radius: 12px; border: 1px solid var(--border); background: rgba(255,255,255,0.02); color: var(--muted); font-weight: 700; font-size: 13px; cursor: pointer;">🍿 Popcorn</button>
                <button class="menu-tab" onclick="filterMenu('snack')" style="padding: 10px 20px; border-radius: 12px; border: 1px solid var(--border); background: rgba(255,255,255,0.02); color: var(--muted); font-weight: 700; font-size: 13px; cursor: pointer;">🍔 Snacks</button>
                <button class="menu-tab" onclick="filterMenu('drink')" style="padding: 10px 20px; border-radius: 12px; border: 1px solid var(--border); background: rgba(255,255,255,0.02); color: var(--muted); font-weight: 700; font-size: 13px; cursor: pointer;">🥤 Beverages</button>
            </div>

            <!-- Food Grid -->
            @php
                $foodItems = [
                    [
                        'id' => 'combo-royal',
                        'category' => 'combo',
                        'emoji' => '👩‍❤️‍👨',
                        'image' => 'assets/images/movies/food1.avif',
                        'name' => 'Royal Couple Combo',
                        'desc' => '1 Large Cheese Popcorn + 2 Large Pepsi + 1 Nachos (Perfect for two)',
                        'price' => 490
                    ],
                    [
                        'id' => 'combo-solo',
                        'category' => 'combo',
                        'emoji' => '🎬',
                        'image' => 'assets/images/movies/food6.jpg',
                        'name' => 'Solo Blockbuster Combo',
                        'desc' => '1 Medium Classic Popcorn + 1 Ice Cold Pepsi (Solo Treat)',
                        'price' => 280
                    ],
                    [
                        'id' => 'popcorn-salted',
                        'category' => 'popcorn',
                        'emoji' => '🍿',
                        'image' => 'assets/images/movies/food2.webp',
                        'name' => 'Classic Salted Popcorn',
                        'desc' => 'Freshly popped theater salted popcorn (Large Size)',
                        'price' => 240
                    ],
                    [
                        'id' => 'popcorn-cheese',
                        'category' => 'popcorn',
                        'emoji' => '🧀',
                        'image' => 'assets/images/movies/food7.jpg',
                        'name' => 'Cheese Popcorn XL',
                        'desc' => 'Crunchy popcorn coated with Cheddar Cheese dust',
                        'price' => 280
                    ],
                    [
                        'id' => 'popcorn-caramel',
                        'category' => 'popcorn',
                        'emoji' => '🍯',
                        'image' => 'assets/images/movies/food3.jpg',
                        'name' => 'Caramel Popcorn XL',
                        'desc' => 'Sweet caramelized popcorn with rich buttery aroma',
                        'price' => 300
                    ],
                    [
                        'id' => 'snack-nachos',
                        'category' => 'snack',
                        'emoji' => '🌮',
                        'image' => 'assets/images/movies/food8.jpg',
                        'name' => 'Crispy Cheese Nachos',
                        'desc' => 'Crispy tortilla chips served with hot cheddar cheese dip',
                        'price' => 190
                    ],
                    [
                        'id' => 'snack-nuggets',
                        'category' => 'snack',
                        'emoji' => '🍗',
                        'image' => 'assets/images/movies/food4.jpg',
                        'name' => 'Crispy Chicken Nuggets',
                        'desc' => 'Tender and golden-brown nuggets served with dip (8 Pcs)',
                        'price' => 220
                    ],
                    [
                        'id' => 'snack-fries',
                        'category' => 'snack',
                        'emoji' => '🍟',
                        'image' => 'assets/images/movies/food9.webp',
                        'name' => 'Loaded Cheesy Fries',
                        'desc' => 'Golden french fries loaded with cheese and herbs',
                        'price' => 170
                    ],
                    [
                        'id' => 'drink-pepsi',
                        'category' => 'drink',
                        'emoji' => '🥤',
                        'image' => 'assets/images/movies/food5.jpg',
                        'name' => 'Chilled Pepsi Large',
                        'desc' => 'Ice-cold bubbly Pepsi cola carbonated drink (600ml)',
                        'price' => 120
                    ],
                    [
                        'id' => 'drink-coffee',
                        'category' => 'drink',
                        'emoji' => '☕',
                        'image' => 'assets/images/movies/food10.jpg',
                        'name' => 'Premium Cold Coffee',
                        'desc' => 'Rich creamy cold coffee topped with sweet chocolate syrup',
                        'price' => 160
                    ]
                ];
            @endphp

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;" id="food-grid">
                @foreach($foodItems as $item)
                    <div class="food-card {{ $item['category'] }}" data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}" data-price="{{ $item['price'] }}"
                         style="background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: 16px; padding: 20px; display: flex; gap: 16px; transition: all 0.3s ease;">
                        <div style="width: 68px; height: 68px; border-radius: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; border: 1px solid rgba(255,255,255,0.05); overflow: hidden; background: rgba(255,255,255,0.03);">
                            @if(isset($item['image']) && $item['image'])
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <span style="font-size: 36px;">{{ $item['emoji'] }}</span>
                            @endif
                        </div>
                        <div style="flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <h3 style="font-size: 15px; font-weight: 700; color: var(--white); margin: 0 0 4px 0;">{{ $item['name'] }}</h3>
                                <p style="font-size: 12px; color: var(--muted); margin: 0; line-height: 1.4;">{{ $item['desc'] }}</p>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 14px;">
                                <span style="font-size: 16px; font-weight: 800; color: var(--gold);">₹ {{ $item['price'] }}</span>
                                <div style="display: flex; align-items: center; gap: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06); padding: 4px 8px; border-radius: 10px;">
                                    <button onclick="changeQuantity('{{ $item['id'] }}', -1)" style="background: none; border: none; color: var(--muted2); font-size: 18px; font-weight: 800; cursor: pointer; padding: 0 6px; transition: color 0.2s;">-</button>
                                    <span id="qty-{{ $item['id'] }}" style="font-size: 14px; font-weight: 700; color: var(--white); min-width: 14px; text-align: center;">0</span>
                                    <button onclick="changeQuantity('{{ $item['id'] }}', 1)" style="background: none; border: none; color: var(--red); font-size: 18px; font-weight: 800; cursor: pointer; padding: 0 6px; transition: color 0.2s;">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Side: Order Invoice Details -->
        <div>
            <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: 20px; padding: 24px; position: sticky; top: 100px;">
                <h3 style="font-size: 15px; font-weight: 800; color: var(--white); text-transform: uppercase; letter-spacing: 1.5px; border-bottom: 1px solid var(--border); padding-bottom: 14px; margin: 0 0 16px 0;">Booking Summary</h3>
                
                <!-- Ticket Subtotal -->
                <div style="display: flex; justify-content: space-between; font-size: 13px; margin-bottom: 12px;">
                    <span style="color: var(--muted);">Tickets Subtotal</span>
                    <span style="font-weight: 600; color: var(--white);">₹ {{ number_format($ticketsPrice, 2) }}</span>
                </div>

                <!-- Food Added -->
                <div id="food-summary-list" style="border-top: 1px dashed var(--border); padding-top: 14px; margin-top: 14px; display: none;">
                    <div style="font-size: 11px; font-weight: 700; color: var(--muted); text-transform: uppercase; margin-bottom: 10px; letter-spacing: 0.5px;">Food & Beverages</div>
                    <div id="food-items-container" style="display: flex; flex-direction: column; gap: 8px;">
                        <!-- JS Inserted list -->
                    </div>
                </div>

                <!-- Grand Total -->
                <div style="border-top: 1px solid var(--border); padding-top: 16px; margin-top: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: baseline;">
                        <span style="font-size: 14px; font-weight: 800; color: var(--gold);">Final Amount</span>
                        <span id="grand-total-display" style="font-size: 24px; font-weight: 900; color: var(--gold);">₹ {{ number_format($ticketsPrice, 2) }}</span>
                    </div>
                    <div style="font-size: 11px; color: var(--muted2); margin-top: 4px; text-align: right;">Convenience Fee & GST added at checkout</div>
                </div>

                <!-- Action buttons -->
                <div style="display: flex; flex-direction: column; gap: 12px; margin-top: 28px;">
                    <button class="btn btn-primary btn-lg" onclick="checkoutWithFood()" style="padding: 16px; border-radius: 12px; font-size: 15px; font-weight: 800; cursor: pointer; text-align: center; border: none; width: 100%;">
                        Proceed to Payment
                    </button>
                    <button class="btn btn-ghost" onclick="skipFood()" style="padding: 14px; border-radius: 12px; font-size: 13px; font-weight: 700; color: var(--muted); cursor: pointer; background: transparent; border: 1px solid rgba(255,255,255,0.05); width: 100%;">
                        Skip Food
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const orderItems = {};
    const baseTicketsPrice = {{ $ticketsPrice }};

    function filterMenu(category) {
        // Update menu tabs UI
        const tabs = document.querySelectorAll('.menu-tab');
        tabs.forEach(tab => {
            tab.style.background = 'rgba(255,255,255,0.02)';
            tab.style.color = 'var(--muted)';
            tab.style.borderColor = 'var(--border)';
        });
        
        const activeTab = Array.from(tabs).find(tab => tab.getAttribute('onclick').includes(category));
        if (activeTab) {
            if (category === 'all') {
                activeTab.style.background = 'var(--red)';
                activeTab.style.color = 'white';
                activeTab.style.borderColor = 'var(--red)';
            } else {
                activeTab.style.background = 'rgba(239, 79, 95, 0.1)';
                activeTab.style.color = 'var(--red)';
                activeTab.style.borderColor = 'var(--red)';
            }
        }

        // Filter cards
        const cards = document.querySelectorAll('.food-card');
        cards.forEach(card => {
            if (category === 'all' || card.classList.contains(category)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function changeQuantity(itemId, amount) {
        const card = document.querySelector(`.food-card[data-id="${itemId}"]`);
        const name = card.getAttribute('data-name');
        const price = parseFloat(card.getAttribute('data-price'));

        if (!orderItems[itemId]) {
            orderItems[itemId] = { name: name, price: price, qty: 0 };
        }

        orderItems[itemId].qty += amount;
        if (orderItems[itemId].qty <= 0) {
            delete orderItems[itemId];
            document.getElementById(`qty-${itemId}`).textContent = '0';
        } else {
            document.getElementById(`qty-${itemId}`).textContent = orderItems[itemId].qty;
        }

        updateInvoice();
    }

    function updateInvoice() {
        const container = document.getElementById('food-items-container');
        const wrapper = document.getElementById('food-summary-list');
        container.innerHTML = '';

        let foodSubtotal = 0;
        let hasItems = false;

        for (const [id, item] of Object.entries(orderItems)) {
            if (item.qty > 0) {
                hasItems = true;
                const rowTotal = item.price * item.qty;
                foodSubtotal += rowTotal;

                const itemRow = document.createElement('div');
                itemRow.style.display = 'flex';
                itemRow.style.justify = 'space-between';
                itemRow.style.fontSize = '13px';
                itemRow.innerHTML = `
                    <span style="color: var(--white);">${item.name} <strong style="color: var(--red); font-size: 11px; margin-left: 4px;">x${item.qty}</strong></span>
                    <span style="font-weight: 600; color: var(--white);">₹ ${rowTotal.toFixed(2)}</span>
                `;
                container.appendChild(itemRow);
            }
        }

        if (hasItems) {
            wrapper.style.display = 'block';
        } else {
            wrapper.style.display = 'none';
        }

        const grandTotal = baseTicketsPrice + foodSubtotal;
        document.getElementById('grand-total-display').textContent = `₹ ${grandTotal.toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;
    }

    function getFoodParams() {
        let foodStr = '';
        let foodPrice = 0;
        
        for (const [id, item] of Object.entries(orderItems)) {
            if (item.qty > 0) {
                if (foodStr) foodStr += ', ';
                foodStr += `${item.name} x${item.qty}`;
                foodPrice += item.price * item.qty;
            }
        }
        
        return {
            food_items: foodStr,
            food_price: foodPrice
        };
    }

    function checkoutWithFood() {
        const { food_items, food_price } = getFoodParams();
        let url = `{{ route('payment.checkout') }}{!! $querySuffix !!}&seats=${encodeURIComponent('{{ $seatsParam }}')}`;
        if (food_price > 0) {
            url += `&food_items=${encodeURIComponent(food_items)}&food_price=${food_price}`;
        }
        window.location.href = url;
    }

    function skipFood() {
        window.location.href = `{{ route('payment.checkout') }}{!! $querySuffix !!}&seats=${encodeURIComponent('{{ $seatsParam }}')}`;
    }
</script>
</x-layouts.app>
