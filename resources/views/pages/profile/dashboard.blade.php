<x-layouts.app title="My Profile — TicketFlix">
    <div class="container" style="padding: 120px 20px 60px; max-width: 1200px; margin: 0 auto;">
        
        <!-- Page Title -->
        <h1 style="font-family: var(--font-display); font-size: 48px; letter-spacing: 2px; margin-bottom: 40px; color: var(--white); text-transform: uppercase; font-weight: bold;">My Account</h1>
        
        <div class="profile-layout">
            <!-- Profile Sidebar -->
            <aside class="profile-sidebar" style="background: var(--surface2); border: 1px solid var(--border); border-radius: 24px; padding: 32px 24px; height: fit-content; position: sticky; top: 80px;">
                <div class="profile-avatar" id="sidebar-avatar" style="background: var(--red); color: var(--white); width: 96px; height: 96px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 36px; font-weight: 700; margin: 0 auto 20px; transition: var(--transition);">
                    @php
                        $nameParts = explode(' ', Auth::user()->name);
                        $initials = strtoupper(substr($nameParts[0], 0, 1));
                        if (count($nameParts) > 1) {
                            $initials .= strtoupper(substr($nameParts[1], 0, 1));
                        }
                    @endphp
                    {{ $initials }}
                </div>
                
                <div class="profile-name" id="sidebar-name" style="text-align: center; font-size: 22px; font-weight: 700; color: var(--white); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ Auth::user()->name }}</div>
                <div class="profile-email" id="sidebar-email" style="text-align: center; font-size: 14px; color: var(--muted); margin-top: 4px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-weight: 500;">{{ Auth::user()->email }}</div>
                
                <div style="display: flex; justify-content: center; margin-top: 16px; margin-bottom: 24px;">
                    <span class="badge-gold-outline">★ GOLD MEMBER</span>
                </div>

                <div class="profile-stat-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
                    <div class="profile-stat" style="background: var(--surface); border-radius: 16px; padding: 16px; text-align: center; border: 1px solid var(--border);">
                        <div class="profile-stat-val" style="font-size: 24px; font-weight: 700; color: var(--white);">{{ count($bookings) }}</div>
                        <div class="profile-stat-label" style="font-size: 12px; color: var(--muted); margin-top: 4px; font-weight: 500;">Bookings</div>
                    </div>
                    <div class="profile-stat" style="background: var(--surface); border-radius: 16px; padding: 16px; text-align: center; border: 1px solid var(--border);">
                        <div class="profile-stat-val" style="font-size: 24px; font-weight: 700; color: var(--white);">₹{{ number_format(Auth::user()->wallet_balance) }}</div>
                        <div class="profile-stat-label" style="font-size: 12px; color: var(--muted); margin-top: 4px; font-weight: 500;">Wallet</div>
                    </div>
                </div>

                <!-- Points to Platinum Progress Bar -->
                <div class="profile-progress-container" style="margin-bottom: 28px;">
                    <div class="profile-progress-bar" style="height: 6px; background: var(--surface3); border-radius: 100px; overflow: hidden; margin-bottom: 8px;">
                        <div class="profile-progress-fill" style="width: 60%; height: 100%; background: var(--gold); border-radius: 100px;"></div>
                    </div>
                    <div class="profile-progress-text" style="text-align: center; font-size: 11px; font-weight: 600; color: var(--muted);">
                        600/1000 pts to Platinum
                    </div>
                </div>

                <!-- Nav list (using div to bypass global fixed nav CSS styles) -->
                <div class="profile-nav" style="display: flex; flex-direction: column; gap: 6px;">
                    <div class="profile-nav-item active" id="tab-bookings">
                        <span style="font-size: 16px;">🎟️</span> <span class="nav-text">My Bookings</span>
                    </div>
                    <div class="profile-nav-item" id="tab-wishlist">
                        <span style="font-size: 16px;">💛</span> <span class="nav-text">Wishlist</span>
                    </div>
                    <div class="profile-nav-item" id="tab-wallet">
                        <span style="font-size: 16px;">👛</span> <span class="nav-text">Wallet & Offers</span>
                    </div>
                    <div class="profile-nav-item" id="tab-settings">
                        <span style="font-size: 16px;">⚙️</span> <span class="nav-text">Account Settings</span>
                    </div>
                    <div class="profile-nav-item" id="tab-notifications">
                        <span style="font-size: 16px;">🔔</span> <span class="nav-text">Notifications</span>
                    </div>
                    <div class="profile-nav-item" style="margin-top: 16px; color: var(--red);" id="tab-signout">
                        <span style="font-size: 16px;">🚪</span> <span class="nav-text">Sign Out</span>
                    </div>
                </div>
            </aside>

            <!-- Profile Content Area -->
            <main class="profile-content" style="background: var(--surface); flex: 1;">
                
                <!-- Bookings Section -->
                <div id="section-bookings" class="profile-section-content">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                        <h2 style="font-size: 24px; font-weight: 700; color: var(--white); font-family: var(--font-body); margin: 0;">Booking History</h2>
                        <div style="position: relative;">
                            <select id="booking-filter" class="custom-select">
                                <option value="all">All Bookings</option>
                                <option value="upcoming">Upcoming</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <span class="select-chevron">▼</span>
                        </div>
                    </div>

                    <div class="booking-list-container">
                        @forelse($bookings as $booking)
                            <div class="booking-card-item" data-status-type="{{ $booking['status_type'] }}">
                                <div class="booking-icon-box">
                                    {{ $booking['icon'] }}
                                </div>
                                <div class="booking-details-box">
                                    <h3 class="booking-card-title">{{ $booking['title'] }}</h3>
                                    <div class="booking-card-venue">
                                        {{ $booking['venue'] }} · {{ $booking['datetime'] }} · {{ $booking['seats'] }}
                                    </div>
                                    <div class="booking-card-status {{ $booking['status_type'] == 'confirmed' ? 'text-confirmed' : 'text-completed' }}">
                                        <span>✓</span> {{ $booking['status'] }} · {{ $booking['price'] }}
                                    </div>
                                </div>
                                <button class="btn-view-ticket" onclick="window.location.href='{{ $booking['ticket_url'] }}'">View Ticket</button>
                            </div>
                        @empty
                            <div style="background: var(--surface2); border: 1px solid var(--border); border-radius: 16px; padding: 40px; text-align: center; color: var(--muted);">
                                <span style="font-size: 48px; display: block; margin-bottom: 16px;">🎟️</span>
                                No bookings found.
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Wishlist Section -->
                <div id="section-wishlist" class="profile-section-content" style="display: none;">
                    <div style="display: flex; align-items: center; margin-bottom: 24px;">
                        <h2 style="font-size: 24px; font-weight: 700; color: var(--white); font-family: var(--font-body); margin: 0;">My Wishlist</h2>
                    </div>
                    
                    @if($wishlists->isEmpty())
                        <div style="background: var(--surface2); border: 1px solid var(--border); border-radius: 20px; padding: 60px 40px; text-align: center; color: var(--muted);">
                            <span style="font-size: 48px; display: block; margin-bottom: 16px;">💛</span>
                            Your wishlist is empty. Start adding movies and events you love!
                        </div>
                    @else
                        @php
                            $movies = $wishlists->where('type', 'movie');
                            $events = $wishlists->where('type', 'event');
                        @endphp
                        
                        @if($movies->isNotEmpty())
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 20px; color: var(--white); display: flex; align-items: center; gap: 10px; font-family: var(--font-body);">
                                🎬 Movies
                                <span style="font-size: 12px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.05); padding: 2px 8px; border-radius: 100px; color: var(--muted); font-weight: 600;">{{ $movies->count() }}</span>
                            </h3>
                            <div class="wishlist-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 24px; margin-bottom: 40px;">
                                @foreach($movies as $item)
                                    @php
                                        $movieUrl = route('movies.show') . '?' . http_build_query([
                                            'title' => $item->title,
                                            'rating' => $item->rating,
                                            'image' => $item->image,
                                            'poster' => $item->poster,
                                            'emoji' => $item->emoji,
                                            'genre' => $item->genre,
                                            'duration' => $item->duration,
                                            'formats' => $item->formats,
                                            'languages' => $item->languages,
                                        ]);
                                    @endphp
                                    <div class="wishlist-card movie-card-mini" style="background: var(--surface2); border: 1px solid var(--border); border-radius: 20px; overflow: hidden; position: relative; cursor: pointer; display: flex; flex-direction: column;" onclick="window.location.href='{{ $movieUrl }}'">
                                        <div style="aspect-ratio: 1/1.3; position: relative; overflow: hidden; background: var(--surface3);">
                                            <button class="wishlist-btn active" 
                                                    data-wishlist-title="{{ $item->title }}"
                                                    onclick="toggleWishlistAjax(event, 'movie', '{{ $item->title }}', { rating: '{{ $item->rating }}', genre: '{{ $item->genre }}', duration: '{{ $item->duration }}', emoji: '{{ $item->emoji }}', poster: '{{ $item->poster }}', image: '{{ $item->image }}', formats: '{{ $item->formats }}', languages: '{{ $item->languages }}' })"
                                                    style="position: absolute; top: 12px; right: 12px; z-index: 10; border: none; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(8px); width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 15px; cursor: pointer; color: var(--red); transition: all 0.3s ease;">
                                                <span class="heart-icon">❤️</span>
                                            </button>
                                            @if($item->image)
                                                <img src="{{ asset('assets/images/movies/' . $item->image) }}" alt="{{ $item->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                                            @else
                                                <div class="movie-poster-img {{ $item->poster }}" style="font-size: 50px; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">{{ $item->emoji }}</div>
                                            @endif
                                            <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%); padding: 16px 12px 10px;">
                                                <span style="background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(4px); color: var(--white); font-size: 9px; font-weight: 700; padding: 3px 6px; border-radius: 4px; text-transform: uppercase;">{{ $item->genre }}</span>
                                            </div>
                                        </div>
                                        <div style="padding: 14px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                            <div>
                                                <h4 style="font-size: 15px; font-weight: 700; color: var(--white); margin: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $item->title }}</h4>
                                                <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--muted); margin-top: 6px;">
                                                    <span style="color: var(--gold); font-weight: 700;">⭐ {{ $item->rating }}</span>
                                                    <span>·</span>
                                                    <span>{{ $item->duration }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if($events->isNotEmpty())
                            <h3 style="font-size: 18px; font-weight: 700; margin-top: 40px; margin-bottom: 20px; color: var(--white); display: flex; align-items: center; gap: 10px; font-family: var(--font-body);">
                                🎉 Events
                                <span style="font-size: 12px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.05); padding: 2px 8px; border-radius: 100px; color: var(--muted); font-weight: 600;">{{ $events->count() }}</span>
                            </h3>
                            <div class="wishlist-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
                                @foreach($events as $item)
                                    @php
                                        $eventUrl = route('events.seats') . '?' . http_build_query([
                                            'title' => $item->title,
                                            'image' => $item->image,
                                            'formats' => $item->formats,
                                            'price' => $item->price,
                                        ]);
                                    @endphp
                                    <div class="wishlist-card event-card-mini" style="background: var(--surface2); border: 1px solid var(--border); border-radius: 20px; overflow: hidden; position: relative; cursor: pointer; display: flex; flex-direction: column;" onclick="window.location.href='{{ $eventUrl }}'">
                                        <div style="height: 150px; position: relative; overflow: hidden; background: var(--surface3);">
                                            <button class="wishlist-btn active" 
                                                    data-wishlist-title="{{ $item->title }}"
                                                    onclick="toggleWishlistAjax(event, 'event', '{{ $item->title }}', { image: '{{ $item->image }}', formats: '{{ $item->formats }}', price: '{{ $item->price }}', location: '{{ $item->location }}', date_str: '{{ $item->date_str }}' })"
                                                    style="position: absolute; top: 12px; right: 12px; z-index: 10; border: none; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(8px); width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 15px; cursor: pointer; color: var(--red); transition: all 0.3s ease;">
                                                <span class="heart-icon">❤️</span>
                                            </button>
                                            <img src="{{ asset('assets/images/movies/' . $item->image) }}" alt="{{ $item->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                                            <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%); padding: 16px 12px 10px;">
                                                <span class="badge {{ $item->formats == 'Comedy' ? 'badge-gold' : ($item->formats == 'Sports' ? 'badge-green' : 'badge-red') }}" style="font-size: 9px; font-weight: 700; padding: 3px 6px; border-radius: 4px; text-transform: uppercase;">{{ $item->formats }}</span>
                                            </div>
                                        </div>
                                        <div style="padding: 16px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                            <div>
                                                <h4 style="font-size: 15px; font-weight: 700; color: var(--white); margin: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 36px; line-height: 1.3;">{{ $item->title }}</h4>
                                                <div style="font-size: 11px; color: var(--muted); display: flex; flex-direction: column; gap: 6px; margin-top: 10px;">
                                                    <div>📅 {{ $item->date_str }}</div>
                                                    <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">📍 {{ $item->location }}</div>
                                                </div>
                                            </div>
                                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 14px; padding-top: 10px; border-top: 1px solid var(--border);">
                                                <div style="font-weight: 700; font-size: 14px; color: var(--white);">₹ {{ number_format($item->price) }} <span style="font-weight: 400; font-size: 10px; color: var(--muted);">onwards</span></div>
                                                <span class="btn btn-primary btn-sm" style="font-size: 11px; padding: 4px 12px; border-radius: 6px;">Book</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>

                <!-- Wallet & Offers Section -->
                <div id="section-wallet" class="profile-section-content" style="display: none;">
                    <div style="display: flex; align-items: center; margin-bottom: 24px;">
                        <h2 style="font-size: 24px; font-weight: 700; color: var(--white); font-family: var(--font-body); margin: 0;">Wallet & Offers</h2>
                    </div>
                    
                    <!-- Wallet Card -->
                    <div style="background: linear-gradient(135deg, rgba(232,25,44,0.15) 0%, rgba(10,10,11,0.95) 100%); border: 1px solid var(--border2); border-radius: 20px; padding: 32px; margin-bottom: 32px; display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap;">
                        <div style="display: flex; align-items: center; gap: 24px;">
                            <div style="font-size: 64px; filter: drop-shadow(0 4px 10px rgba(0,0,0,0.5));">👛</div>
                            <div>
                                <div style="font-size: 13px; color: var(--muted); text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Available Balance</div>
                                <h2 style="font-size: 38px; font-weight: 800; color: var(--white); margin-top: 4px; margin-bottom: 0;">₹{{ number_format(Auth::user()->wallet_balance, 2) }}</h2>
                                <div style="font-size: 12px; color: var(--muted); margin-top: 6px;">Securely managed by TicketFlix Pay</div>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 12px; min-width: 200px;">
                            <button class="btn btn-primary" onclick="alert('Wallet top-up under maintenance.')" style="width: 100%; justify-content: center;">⚡ Top Up Wallet</button>
                            <button class="btn btn-ghost" onclick="alert('No vouchers available at the moment.')" style="width: 100%; justify-content: center;">🎁 Redeem Gift Card</button>
                        </div>
                    </div>

                    <!-- Transaction History -->
                    <div class="mb-3">
                        <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 16px; color: var(--white);">Recent Transactions</h3>
                        <div style="background: var(--surface2); border: 1px solid var(--border); border-radius: 16px; overflow: hidden;">
                            <!-- T1 -->
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 18px 24px; border-bottom: 1px solid var(--border);">
                                <div>
                                    <div style="font-size: 14px; font-weight: 600; color: var(--white);">Refund for Cancelled Event: TOXIC</div>
                                    <div style="font-size: 12px; color: var(--muted); margin-top: 4px;">Refund ID: TXN849102 | May 3, 2026</div>
                                </div>
                                <div style="font-weight: 700; color: var(--green); font-size: 15px;">+₹350.00</div>
                            </div>
                            <!-- T2 -->
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 18px 24px; border-bottom: 1px solid var(--border);">
                                <div>
                                    <div style="font-size: 14px; font-weight: 600; color: var(--white);">Booked Movie: Project Hail Mary</div>
                                    <div style="font-size: 12px; color: var(--muted); margin-top: 4px;">Ticket ID: TF-938210 | May 10, 2026</div>
                                </div>
                                <div style="font-weight: 700; color: var(--white); font-size: 15px;">-₹250.00</div>
                            </div>
                            <!-- T3 -->
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 18px 24px;">
                                <div>
                                    <div style="font-size: 14px; font-weight: 600; color: var(--white);">Promo Code HDFC150 Applied</div>
                                    <div style="font-size: 12px; color: var(--muted); margin-top: 4px;">Promo ID: PRM491024 | May 1, 2026</div>
                                </div>
                                <div style="font-weight: 700; color: var(--green); font-size: 15px;">+₹150.00</div>
                            </div>
                        </div>
                    </div>

                    <!-- Offers & Promo Codes -->
                    <div>
                        <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 16px; color: var(--white);">Exclusive Offers</h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                            <div style="background: linear-gradient(135deg, rgba(245,200,66,0.1) 0%, rgba(0,0,0,0.2) 100%); border: 1px solid rgba(245,200,66,0.3); border-radius: 16px; padding: 24px; position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; min-height: 180px;">
                                <div>
                                    <div style="font-size: 12px; color: var(--gold); text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Unlocked Offer</div>
                                    <h4 style="font-size: 18px; font-weight: 700; margin-top: 8px; color: var(--white);">₹150 OFF First Booking</h4>
                                    <div style="font-size: 13px; color: var(--muted); margin-top: 8px; line-height: 1.5;">Valid on all movie and event ticket bookings.</div>
                                </div>
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                                    <div style="font-family: var(--font-mono); font-size: 13px; background: rgba(0,0,0,0.3); padding: 6px 12px; border-radius: 6px; border: 1px dashed rgba(255,255,255,0.1); color: var(--gold);">HDFC150</div>
                                    <button class="btn btn-ghost btn-sm" onclick="navigator.clipboard.writeText('HDFC150'); alert('Promo code HDFC150 copied to clipboard!')">Copy</button>
                                </div>
                            </div>
                            <div style="background: linear-gradient(135deg, rgba(232,25,44,0.1) 0%, rgba(0,0,0,0.2) 100%); border: 1px solid rgba(232,25,44,0.3); border-radius: 16px; padding: 24px; position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; min-height: 180px;">
                                <div>
                                    <div style="font-size: 12px; color: var(--red); text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Exclusive Promo</div>
                                    <h4 style="font-size: 18px; font-weight: 700; margin-top: 8px; color: var(--white);">Free Popcorn Combo</h4>
                                    <div style="font-size: 13px; color: var(--muted); margin-top: 8px; line-height: 1.5;">Get a free medium popcorn combo at any PVR cinema.</div>
                                </div>
                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                                    <div style="font-family: var(--font-mono); font-size: 13px; background: rgba(0,0,0,0.3); padding: 6px 12px; border-radius: 6px; border: 1px dashed rgba(255,255,255,0.1); color: var(--red);">POPCORNFREE</div>
                                    <button class="btn btn-ghost btn-sm" onclick="navigator.clipboard.writeText('POPCORNFREE'); alert('Promo code POPCORNFREE copied to clipboard!')">Copy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Settings Section -->
                <div id="section-settings" class="profile-section-content" style="display: none;">
                    <div style="display: flex; align-items: center; margin-bottom: 24px;">
                        <h2 style="font-size: 24px; font-weight: 700; color: var(--white); font-family: var(--font-body); margin: 0;">Account Settings</h2>
                    </div>
                    
                    <div style="background: var(--surface2); border: 1px solid var(--border); border-radius: 20px; padding: 40px;">
                        <form id="profile-update-form" style="display: flex; flex-direction: column; gap: 24px;">
                            @csrf
                            <div class="form-row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
                                <div class="form-group" style="margin: 0;">
                                    <label class="form-label" style="font-size: 12px; font-weight: 600; color: var(--muted); letter-spacing: 0.5px; margin-bottom: 8px; display: block; text-transform: uppercase;">Full Name</label>
                                    <input type="text" name="name" id="settings-name" class="form-input" value="{{ Auth::user()->name }}" required style="width: 100%; background: var(--surface3); border: 1px solid var(--border2); border-radius: 10px; padding: 12px 16px; color: var(--white); font-size: 14px; outline: none; transition: var(--transition);">
                                </div>
                                <div class="form-group" style="margin: 0;">
                                    <label class="form-label" style="font-size: 12px; font-weight: 600; color: var(--muted); letter-spacing: 0.5px; margin-bottom: 8px; display: block; text-transform: uppercase;">Email Address</label>
                                    <input type="email" name="email" id="settings-email" class="form-input" value="{{ Auth::user()->email }}" required style="width: 100%; background: var(--surface3); border: 1px solid var(--border2); border-radius: 10px; padding: 12px 16px; color: var(--white); font-size: 14px; outline: none; transition: var(--transition);">
                                </div>
                            </div>

                            <div style="border-top: 1px solid var(--border); margin: 10px 0; padding-top: 24px;">
                                <h4 style="font-size: 15px; font-weight: 700; color: var(--white); margin-bottom: 16px; text-transform: uppercase; letter-spacing: 0.5px;">Change Password <span style="font-size: 11px; color: var(--muted); text-transform: none; font-weight: 500; margin-left: 6px;">(Leave blank to keep current)</span></h4>
                                <div class="form-row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
                                    <div class="form-group" style="margin: 0;">
                                        <label class="form-label" style="font-size: 12px; font-weight: 600; color: var(--muted); letter-spacing: 0.5px; margin-bottom: 8px; display: block; text-transform: uppercase;">New Password</label>
                                        <input type="password" name="password" id="settings-password" class="form-input" placeholder="Min. 8 characters" style="width: 100%; background: var(--surface3); border: 1px solid var(--border2); border-radius: 10px; padding: 12px 16px; color: var(--white); font-size: 14px; outline: none; transition: var(--transition);">
                                    </div>
                                    <div class="form-group" style="margin: 0;">
                                        <label class="form-label" style="font-size: 12px; font-weight: 600; color: var(--muted); letter-spacing: 0.5px; margin-bottom: 8px; display: block; text-transform: uppercase;">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" id="settings-password-confirm" class="form-input" placeholder="Repeat password" style="width: 100%; background: var(--surface3); border: 1px solid var(--border2); border-radius: 10px; padding: 12px 16px; color: var(--white); font-size: 14px; outline: none; transition: var(--transition);">
                                    </div>
                                </div>
                            </div>

                            <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
                                <button type="submit" id="save-settings-btn" class="btn btn-primary btn-lg" style="min-width: 180px; display: flex; align-items: center; justify-content: center; gap: 10px;">
                                    <span>💾 Save Changes</span>
                                    <span class="spinner" style="display: none; width: 16px; height: 16px; border: 2px solid rgba(255,255,255,0.3); border-top-color: white; border-radius: 50%; animation: spin 0.8s linear infinite;"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Notifications Section -->
                <div id="section-notifications" class="profile-section-content" style="display: none;">
                    <div style="display: flex; align-items: center; margin-bottom: 24px;">
                        <h2 style="font-size: 24px; font-weight: 700; color: var(--white); font-family: var(--font-body); margin: 0;">Notifications</h2>
                    </div>
                    
                    <div style="display: flex; flex-direction: column; gap: 16px;">
                        <!-- N1 -->
                        <div style="background: var(--surface2); border: 1px solid var(--border); border-left: 4px solid var(--red); border-radius: 12px; padding: 20px; display: flex; align-items: start; gap: 16px;">
                            <span style="font-size: 24px; line-height: 1;">🔔</span>
                            <div style="flex: 1;">
                                <h4 style="font-size: 15px; font-weight: 700; color: var(--white); margin: 0;">Show Confirmation: Blaze of Glory</h4>
                                <p style="font-size: 13px; color: var(--muted); margin-top: 4px; line-height: 1.5; margin-bottom: 0;">Your movie ticket booking is confirmed! Show starts in 1 hour at PVR ICON. Keep your digital pass ready.</p>
                                <span style="font-size: 11px; color: var(--muted2); display: block; margin-top: 8px;">Today, 12:45 PM</span>
                            </div>
                        </div>

                        <!-- N2 -->
                        <div style="background: var(--surface2); border: 1px solid var(--border); border-left: 4px solid var(--green); border-radius: 12px; padding: 20px; display: flex; align-items: start; gap: 16px;">
                            <span style="font-size: 24px; line-height: 1;">🎟</span>
                            <div style="flex: 1;">
                                <h4 style="font-size: 15px; font-weight: 700; color: var(--white); margin: 0;">Wallet Credit: Cancelled Show Refund</h4>
                                <p style="font-size: 13px; color: var(--muted); margin-top: 4px; line-height: 1.5; margin-bottom: 0;">A refund of ₹350.00 for your cancelled event ticket of Abhishek Upmanyu has been credited to your TicketFlix Wallet.</p>
                                <span style="font-size: 11px; color: var(--muted2); display: block; margin-top: 8px;">May 3, 08:30 PM</span>
                            </div>
                        </div>

                        <!-- N3 -->
                        <div style="background: var(--surface2); border: 1px solid var(--border); border-left: 4px solid var(--gold); border-radius: 12px; padding: 20px; display: flex; align-items: start; gap: 16px;">
                            <span style="font-size: 24px; line-height: 1;">⭐</span>
                            <div style="flex: 1;">
                                <h4 style="font-size: 15px; font-weight: 700; color: var(--white); margin: 0;">Gold Membership Unlocked</h4>
                                <p style="font-size: 13px; color: var(--muted); margin-top: 4px; line-height: 1.5; margin-bottom: 0;">Congratulations! You have been upgraded to the Gold Member tier. Enjoy special offers, premium ticket windows, and complimentary combos.</p>
                                <span style="font-size: 11px; color: var(--muted2); display: block; margin-top: 8px;">May 1, 10:00 AM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Interactive and Premium Styles -->
    <style>
        .profile-layout {
            display: flex !important;
            gap: 40px !important;
            align-items: start !important;
        }
        .profile-sidebar {
            width: 320px !important;
            flex-shrink: 0 !important;
        }
        .profile-content {
            flex: 1 !important;
        }
        
        /* Gold Badge style */
        .badge-gold-outline {
            border: 1px solid var(--gold);
            background: rgba(245, 200, 66, 0.05);
            color: var(--gold);
            border-radius: 100px;
            padding: 6px 16px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* Sidebar Navigation Items styling */
        .profile-nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: var(--muted);
            transition: var(--transition);
        }
        .profile-nav-item:hover {
            background: var(--surface3) !important;
            color: var(--white) !important;
        }
        .profile-nav-item.active {
            background: rgba(232, 25, 44, 0.12) !important;
            color: var(--red) !important;
        }

        /* Dropdown Chevron and Select Box styling */
        .custom-select {
            appearance: none;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px 36px 10px 16px;
            color: var(--white);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            outline: none;
            transition: var(--transition);
        }
        .custom-select:hover {
            border-color: var(--border2);
        }
        .select-chevron {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--muted);
            font-size: 10px;
        }

        /* Booking Card Layout */
        .booking-card-item {
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 16px;
            transition: var(--transition);
        }
        .booking-card-item:hover {
            border-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }
        .booking-icon-box {
            width: 56px;
            height: 56px;
            background: var(--surface3);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
            border: 1px solid var(--border);
        }
        .booking-details-box {
            flex: 1;
            min-width: 0;
        }
        .booking-card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--white);
            margin: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-family: var(--font-body);
        }
        .booking-card-venue {
            font-size: 13px;
            color: var(--muted);
            margin-top: 4px;
            font-weight: 500;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .booking-card-status {
            font-size: 13px;
            margin-top: 8px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .text-confirmed {
            color: var(--green) !important;
        }
        .text-completed {
            color: var(--muted) !important;
        }

        /* Ghost Button Styling */
        .btn-view-ticket {
            background: transparent;
            border: 1px solid var(--border2);
            color: var(--white);
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 13px;
            cursor: pointer;
            transition: var(--transition);
            margin-left: auto;
            white-space: nowrap;
        }
        .btn-view-ticket:hover {
            background: var(--white) !important;
            color: var(--black) !important;
            border-color: var(--white) !important;
        }

        @media (max-width: 768px) {
            .profile-layout {
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 24px !important;
            }
            .profile-sidebar {
                width: 100% !important;
            }
            .booking-card-item {
                flex-direction: column;
                align-items: start;
                gap: 16px;
            }
            .btn-view-ticket {
                margin-left: 0;
                width: 100%;
                text-align: center;
            }
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Wishlist Premium Card styles */
        .wishlist-card {
            transition: var(--transition) !important;
        }
        .wishlist-card:hover {
            transform: translateY(-4px) !important;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4) !important;
            border-color: rgba(255, 255, 255, 0.15) !important;
        }
        .wishlist-card img {
            transition: all 0.5s ease !important;
        }
        .wishlist-card:hover img {
            transform: scale(1.05) !important;
        }
        .wishlist-btn:hover {
            transform: scale(1.1) !important;
            background: rgba(0, 0, 0, 0.7) !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Sidebar Navigation Toggling
            const navItems = document.querySelectorAll('.profile-nav-item');
            const sections = document.querySelectorAll('.profile-section-content');

            navItems.forEach((item) => {
                item.addEventListener('click', () => {
                    // Check if it's sign out
                    if (item.id === 'tab-signout') {
                        logoutUser();
                        return;
                    }

                    // Remove active class from all nav items
                    navItems.forEach(n => n.classList.remove('active'));
                    // Add active to clicked nav item
                    item.classList.add('active');

                    // Hide all sections
                    sections.forEach(s => s.style.display = 'none');

                    // Show target section based on active ID
                    if (item.id === 'tab-bookings') {
                        document.getElementById('section-bookings').style.display = 'block';
                    } else if (item.id === 'tab-wishlist') {
                        document.getElementById('section-wishlist').style.display = 'block';
                    } else if (item.id === 'tab-wallet') {
                        document.getElementById('section-wallet').style.display = 'block';
                    } else if (item.id === 'tab-settings') {
                        document.getElementById('section-settings').style.display = 'block';
                    } else if (item.id === 'tab-notifications') {
                        document.getElementById('section-notifications').style.display = 'block';
                    }
                });
            });

            // Booking History Client-Side Filter Dropdown
            const filterDropdown = document.getElementById('booking-filter');
            const bookingItems = document.querySelectorAll('.booking-card-item');

            if (filterDropdown) {
                filterDropdown.addEventListener('change', (e) => {
                    const filterVal = e.target.value; // all, upcoming, completed, cancelled
                    bookingItems.forEach(card => {
                        const cardType = card.getAttribute('data-status-type'); // confirmed, completed, cancelled
                        
                        if (filterVal === 'all') {
                            card.style.display = 'flex';
                        } else if (filterVal === 'upcoming' && cardType === 'confirmed') {
                            card.style.display = 'flex';
                        } else if (filterVal === 'completed' && cardType === 'completed') {
                            card.style.display = 'flex';
                        } else if (filterVal === 'cancelled' && cardType === 'cancelled') {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            }

            // Sign out action
            function logoutUser() {
                if (confirm('Are you sure you want to sign out?')) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('logout') }}';
                    
                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';
                    
                    form.appendChild(csrf);
                    document.body.appendChild(form);
                    form.submit();
                }
            }

            // Profile AJAX Update
            const form = document.getElementById('profile-update-form');
            const btn = document.getElementById('save-settings-btn');
            const spinner = btn.querySelector('.spinner');

            form.addEventListener('submit', (e) => {
                e.preventDefault();

                // Validation check
                const password = document.getElementById('settings-password').value;
                const passwordConfirm = document.getElementById('settings-password-confirm').value;

                if (password && password !== passwordConfirm) {
                    showToast('Passwords do not match!', false);
                    return;
                }

                // Show spinner, disable button
                btn.disabled = true;
                spinner.style.display = 'inline-block';

                const formData = new FormData(form);

                fetch('{{ route('profile.update') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json().then(data => ({ status: response.status, body: data })))
                .then(res => {
                    btn.disabled = false;
                    spinner.style.display = 'none';

                    if (res.status === 200 && res.body.success) {
                        showToast(res.body.message, true);
                        
                        // Dynamically update sidebar profile card details
                        document.getElementById('sidebar-name').textContent = res.body.user.name;
                        document.getElementById('sidebar-email').textContent = res.body.user.email;
                        
                        // Update initials avatar
                        const nameParts = res.body.user.name.split(' ');
                        let initials = nameParts[0].charAt(0).toUpperCase();
                        if (nameParts.length > 1) {
                            initials += nameParts[1].charAt(0).toUpperCase();
                        }
                        document.getElementById('sidebar-avatar').textContent = initials;

                        // Clear password fields
                        document.getElementById('settings-password').value = '';
                        document.getElementById('settings-password-confirm').value = '';
                    } else {
                        const errorMsg = res.body.message || 'An error occurred during save.';
                        showToast(errorMsg, false);
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    spinner.style.display = 'none';
                    showToast('Failed to update profile. Please try again.', false);
                });
            });

            // Toast triggering helper function
            function showToast(message, isSuccess = true) {
                const toast = document.getElementById('toast');
                const toastText = document.getElementById('toast-text');
                const toastIcon = toast.querySelector('.toast-icon');
                
                if (toast && toastText && toastIcon) {
                    toastText.textContent = message;
                    toastIcon.textContent = isSuccess ? '✅' : '❌';
                    
                    toast.classList.add('show');
                    setTimeout(() => {
                        toast.classList.remove('show');
                    }, 3000);
                } else {
                    alert(message);
                }
            }
        });
    </script>
</x-layouts.app>