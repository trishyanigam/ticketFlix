<x-layouts.app title="Admin Dashboard — TicketFlix">
    <div class="admin-layout" style="display: flex; min-height: 100vh; background: #070708; color: var(--white);">
        
        <!-- Sidebar Navigation -->
        <aside class="admin-sidebar" style="width: 280px; background: #0c0c0e; border-right: 1px solid var(--border); padding-top: 100px; display: flex; flex-direction: column; gap: 8px;">
            <div style="padding: 0 28px 20px; font-family: var(--font-display); font-size: 24px; color: var(--white); letter-spacing: 2px;">TICKET<span>FLIX</span><br><small style="font-family: var(--font-body); font-size: 10px; color: var(--muted2); letter-spacing: 1px; text-transform: uppercase;">Admin Dashboard</small></div>

            <div class="admin-nav-label" style="font-size: 11px; text-transform: uppercase; color: var(--muted); letter-spacing: 1px; padding: 12px 28px 4px; font-weight: 700;">Overview</div>
            <div class="admin-nav-item active" onclick="switchSection('dashboard', this)" style="display: flex; align-items: center; gap: 12px; padding: 12px 28px; cursor: pointer; color: var(--muted); font-weight: 600; transition: all 0.2s; font-size: 14px;">
                <span class="admin-nav-icon" style="font-size: 16px;">📊</span> Dashboard
            </div>
            <div class="admin-nav-item" onclick="alert('Analytics report modules are currently loaded in the dashboard overview.')" style="display: flex; align-items: center; gap: 12px; padding: 12px 28px; cursor: pointer; color: var(--muted); font-weight: 600; transition: all 0.2s; font-size: 14px;">
                <span class="admin-nav-icon" style="font-size: 16px;">📈</span> Analytics
            </div>

            <div class="admin-nav-label" style="font-size: 11px; text-transform: uppercase; color: var(--muted); letter-spacing: 1px; padding: 12px 28px 4px; font-weight: 700;">Content</div>
            <div class="admin-nav-item" onclick="switchSection('movies', this)" style="display: flex; align-items: center; gap: 12px; padding: 12px 28px; cursor: pointer; color: var(--muted); font-weight: 600; transition: all 0.2s; font-size: 14px;">
                <span class="admin-nav-icon" style="font-size: 16px;">🎬</span> Movies
            </div>
            <div class="admin-nav-item" onclick="switchSection('events', this)" style="display: flex; align-items: center; gap: 12px; padding: 12px 28px; cursor: pointer; color: var(--muted); font-weight: 600; transition: all 0.2s; font-size: 14px;">
                <span class="admin-nav-icon" style="font-size: 16px;">🎭</span> Events
            </div>

            <div class="admin-nav-label" style="font-size: 11px; text-transform: uppercase; color: var(--muted); letter-spacing: 1px; padding: 12px 28px 4px; font-weight: 700;">Operations</div>
            <div class="admin-nav-item" onclick="switchSection('bookings', this)" style="display: flex; align-items: center; gap: 12px; padding: 12px 28px; cursor: pointer; color: var(--muted); font-weight: 600; transition: all 0.2s; font-size: 14px;">
                <span class="admin-nav-icon" style="font-size: 16px;">🎫</span> Bookings
            </div>
            <div class="admin-nav-item" onclick="switchSection('users', this)" style="display: flex; align-items: center; gap: 12px; padding: 12px 28px; cursor: pointer; color: var(--muted); font-weight: 600; transition: all 0.2s; font-size: 14px;">
                <span class="admin-nav-icon" style="font-size: 16px;">👥</span> Users
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="admin-content" style="flex: 1; padding: 120px 40px 60px; overflow-y: auto;">
            
            <!-- Alert Banners -->
            @if(session('error'))
                <div class="admin-alert" style="background: rgba(232,25,44,0.1); border: 1px solid var(--red); border-radius: 12px; padding: 16px 24px; color: #fff; margin: 0 0 24px; font-weight: 600; display: flex; align-items: center; justify-content: space-between; font-size: 14px;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <span style="font-size: 20px;">⚠️</span>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button onclick="this.parentElement.style.display='none'" style="background: transparent; border: none; color: var(--muted); cursor: pointer; font-size: 16px; font-weight: bold; outline: none;">×</button>
                </div>
            @endif

            @if(session('success'))
                <div class="admin-alert" style="background: rgba(29,185,84,0.1); border: 1px solid var(--green); border-radius: 12px; padding: 16px 24px; color: #fff; margin: 0 0 24px; font-weight: 600; display: flex; align-items: center; justify-content: space-between; font-size: 14px;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <span style="font-size: 20px;">✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.style.display='none'" style="background: transparent; border: none; color: var(--muted); cursor: pointer; font-size: 16px; font-weight: bold; outline: none;">×</button>
                </div>
            @endif

            <!-- ========================================== -->
            <!-- SECTION 1: DASHBOARD OVERVIEW              -->
            <!-- ========================================== -->
            <div id="section-dashboard" class="admin-section-content">
                <header class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
                    <div>
                        <h1 class="admin-title" style="font-size: 32px; font-family: var(--font-display); letter-spacing: 2px; color: var(--white); font-weight: 700; margin: 0;">DASHBOARD</h1>
                        <div class="admin-date" style="font-size: 13px; color: var(--muted); margin-top: 4px;">{{ date('l, d F Y') }} · Real-time database metrics</div>
                    </div>
                    <div style="display: flex; gap: 16px;">
                        <button class="btn btn-ghost" onclick="window.print()" style="border-radius: 8px; border: 1px solid var(--border); font-size: 13px; font-weight: 600; padding: 8px 16px; display: flex; align-items: center; gap: 8px;">
                            <span>📥</span> Export Report
                        </button>
                        <button class="btn btn-primary" onclick="openModal('movieModal')" style="border-radius: 8px; font-size: 13px; font-weight: 700; padding: 8px 24px;">+ Add Movie</button>
                    </div>
                </header>

                <!-- Statistics Grid -->
                <div class="admin-stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px; margin-bottom: 40px;">
                    <div class="stat-card red" style="background: #0f0f11; border: 1px solid var(--border); border-radius: 20px; padding: 24px; border-left: 4px solid var(--red);">
                        <div class="stat-icon" style="background: rgba(232,25,44,0.1); color: var(--red); width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 16px;">🎟️</div>
                        <div class="stat-value" style="font-size: 32px; font-weight: 700;">{{ number_format($totalBookings) }}</div>
                        <div class="stat-label" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Total Bookings</div>
                    </div>
                    <div class="stat-card gold" style="background: #0f0f11; border: 1px solid var(--border); border-radius: 20px; padding: 24px; border-left: 4px solid var(--gold);">
                        <div class="stat-icon" style="background: rgba(245,200,66,0.1); color: var(--gold); width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 16px;">💰</div>
                        <div class="stat-value" style="font-size: 32px; font-weight: 700;">₹{{ number_format($totalRevenue) }}</div>
                        <div class="stat-label" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Total Revenue</div>
                    </div>
                    <div class="stat-card blue" style="background: #0f0f11; border: 1px solid var(--border); border-radius: 20px; padding: 24px; border-left: 4px solid #63B3ED;">
                        <div class="stat-icon" style="background: rgba(99,179,237,0.1); color: #63B3ED; width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 16px;">👥</div>
                        <div class="stat-value" style="font-size: 32px; font-weight: 700;">{{ number_format($totalUsers) }}</div>
                        <div class="stat-label" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Total Users</div>
                    </div>
                    <div class="stat-card" style="background: #0f0f11; border: 1px solid var(--border); border-radius: 20px; padding: 24px; border-left: 4px solid var(--white);">
                        <div class="stat-icon" style="background: rgba(255,255,255,0.05); color: var(--white); width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 16px;">🎬</div>
                        <div class="stat-value" style="font-size: 32px; font-weight: 700;">{{ number_format($activeMovies) }}</div>
                        <div class="stat-label" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Active Movies</div>
                    </div>
                </div>

                <!-- Charts & Stats split -->
                <div class="charts-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px; margin-bottom: 40px;">
                    <div class="chart-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 32px;">
                        <div class="chart-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="chart-title" style="font-size: 18px; font-weight: 700;">Weekly Booking Activity</div>
                            <div style="display: flex; gap: 16px; font-size: 12px;">
                                <div style="display: flex; align-items: center; gap: 6px;"><div style="width: 10px; height: 10px; background: var(--red); border-radius: 2px;"></div> Bookings</div>
                            </div>
                        </div>
                        <div class="chart-area" style="height: 200px; margin-top: 30px; display: flex; align-items: flex-end; justify-content: space-between; border-bottom: 1px solid var(--border); padding-bottom: 10px;">
                            @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                            <div style="display: flex; flex-direction: column; align-items: center; width: calc(100% / 7); height: 100%; justify-content: flex-end; gap: 8px;">
                                <div style="width: 24px; height: {{ rand(40, 95) }}%; background: linear-gradient(180deg, var(--red) 0%, rgba(232,25,44,0.2) 100%); border-radius: 6px 6px 0 0; transition: height 0.3s;"></div>
                                <span style="font-size: 12px; color: var(--muted);">{{ $day }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="chart-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 32px; display: flex; flex-direction: column; justify-content: space-between;">
                        <div class="chart-title" style="font-size: 18px; font-weight: 700;">Quick Actions</div>
                        <div style="display: flex; flex-direction: column; gap: 12px; margin-top: 20px;">
                            <button class="btn btn-ghost" onclick="openModal('movieModal')" style="justify-content: flex-start; gap: 10px; padding: 12px 16px; border-radius: 12px; font-size: 14px;">🎬 Add New Movie</button>
                            <button class="btn btn-ghost" onclick="openModal('eventModal')" style="justify-content: flex-start; gap: 10px; padding: 12px 16px; border-radius: 12px; font-size: 14px;">🎭 Add New Event</button>
                            <button class="btn btn-ghost" onclick="switchSection('users', document.querySelector('.admin-nav-item'))" style="justify-content: flex-start; gap: 10px; padding: 12px 16px; border-radius: 12px; font-size: 14px;">👥 Manage Users</button>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings Table inside Dashboard -->
                <div class="table-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 0;">
                    <div style="padding: 24px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border);">
                        <div style="font-size: 18px; font-weight: 700;">Recent Transactions</div>
                        <button class="btn btn-ghost btn-sm" onclick="switchSection('bookings', document.querySelector('.admin-nav-item'))" style="border: 1px solid var(--border); border-radius: 6px; font-size: 12px;">View All Bookings</button>
                    </div>
                    <table class="admin-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border); color: var(--muted);">
                                <th style="padding: 18px 24px;">USER</th>
                                <th style="padding: 18px 24px;">SHOWTIME / DATE</th>
                                <th style="padding: 18px 24px;">SEATS</th>
                                <th style="padding: 18px 24px;">AMOUNT</th>
                                <th style="padding: 18px 24px;">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings->take(5) as $booking)
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--white);">{{ $booking->user_name }}</td>
                                <td style="padding: 18px 24px; color: var(--muted);">{{ $booking->show_time ?: $booking->booking_date }}</td>
                                <td style="padding: 18px 24px; color: var(--red); font-family: var(--font-mono);">{{ str_replace(',', ', ', $booking->seat_numbers) }}</td>
                                <td style="padding: 18px 24px; font-weight: 700;">₹{{ number_format($booking->total_price) }}</td>
                                <td style="padding: 18px 24px;">
                                    <span class="badge" style="background: rgba(29,185,84,0.1); color: var(--green); border: 1px solid rgba(29,185,84,0.2); font-size: 11px; text-transform: uppercase; font-weight: 700; padding: 4px 8px; border-radius: 6px;">{{ $booking->payment_status }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="padding: 40px; text-align: center; color: var(--muted);">No bookings available.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SECTION 2: MOVIES MANAGEMENT               -->
            <!-- ========================================== -->
            <div id="section-movies" class="admin-section-content" style="display: none;">
                <header class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
                    <div>
                        <h1 class="admin-title" style="font-size: 32px; font-family: var(--font-display); letter-spacing: 2px; color: var(--white); font-weight: 700; margin: 0;">MOVIES</h1>
                        <div class="admin-date" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Manage dynamic movie listings</div>
                    </div>
                    <button class="btn btn-primary" onclick="openModal('movieModal')" style="border-radius: 8px; font-size: 13px; font-weight: 700; padding: 8px 24px;">+ Add Movie</button>
                </header>

                <div class="table-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 0;">
                    <table class="admin-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border); color: var(--muted);">
                                <th style="padding: 18px 24px;">POSTER / TITLE</th>
                                <th style="padding: 18px 24px;">GENRE</th>
                                <th style="padding: 18px 24px;">LANGUAGE</th>
                                <th style="padding: 18px 24px;">DURATION</th>
                                <th style="padding: 18px 24px;">RATING</th>
                                <th style="padding: 18px 24px; text-align: right;">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($movies as $movie)
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--white);">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        <div style="width: 40px; height: 40px; background: var(--surface2); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 20px;">🎬</div>
                                        <div>
                                            <div style="color: var(--white); font-weight: 600;">{{ $movie->title }}</div>
                                            <div style="font-size: 11px; color: var(--muted); margin-top: 2px;">Released: {{ $movie->release_date }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding: 18px 24px;">{{ $movie->genre }}</td>
                                <td style="padding: 18px 24px; color: var(--muted);">{{ $movie->language }}</td>
                                <td style="padding: 18px 24px;">{{ $movie->duration }}</td>
                                <td style="padding: 18px 24px; font-weight: 700; color: var(--gold);">★ {{ $movie->rating }}</td>
                                <td style="padding: 18px 24px; text-align: right;">
                                    <form action="{{ route('admin.action') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?')" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="action" value="delete_movie">
                                        <input type="hidden" name="id" value="{{ $movie->id }}">
                                        <button type="submit" class="btn btn-ghost" style="padding: 6px 12px; border-radius: 6px; font-size: 12px; color: var(--red); border: 1px solid rgba(232,25,44,0.2);">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="padding: 40px; text-align: center; color: var(--muted);">No movies seeded or created.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SECTION 3: EVENTS MANAGEMENT               -->
            <!-- ========================================== -->
            <div id="section-events" class="admin-section-content" style="display: none;">
                <header class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
                    <div>
                        <h1 class="admin-title" style="font-size: 32px; font-family: var(--font-display); letter-spacing: 2px; color: var(--white); font-weight: 700; margin: 0;">EVENTS</h1>
                        <div class="admin-date" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Manage dynamic live events</div>
                    </div>
                    <button class="btn btn-primary" onclick="openModal('eventModal')" style="border-radius: 8px; font-size: 13px; font-weight: 700; padding: 8px 24px;">+ Add Event</button>
                </header>

                <div class="table-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 0;">
                    <table class="admin-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border); color: var(--muted);">
                                <th style="padding: 18px 24px;">EVENT DETAILS</th>
                                <th style="padding: 18px 24px;">CATEGORY</th>
                                <th style="padding: 18px 24px;">LOCATION</th>
                                <th style="padding: 18px 24px;">DATE & TIME</th>
                                <th style="padding: 18px 24px;">TICKET PRICE</th>
                                <th style="padding: 18px 24px; text-align: right;">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events as $event)
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--white);">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        <div style="width: 40px; height: 40px; background: var(--surface2); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 20px;">🎭</div>
                                        <div style="color: var(--white); font-weight: 600;">{{ $event->title }}</div>
                                    </div>
                                </td>
                                <td style="padding: 18px 24px;">
                                    <span style="background: rgba(245,200,66,0.1); color: var(--gold); border: 1px solid rgba(245,200,66,0.2); font-size: 11px; text-transform: uppercase; font-weight: 700; padding: 4px 8px; border-radius: 6px;">{{ $event->category }}</span>
                                </td>
                                <td style="padding: 18px 24px; color: var(--muted);">{{ $event->location }}</td>
                                <td style="padding: 18px 24px;">{{ $event->event_date }} @ {{ $event->event_time }}</td>
                                <td style="padding: 18px 24px; font-weight: 700; color: var(--green);">₹{{ number_format($event->price) }}</td>
                                <td style="padding: 18px 24px; text-align: right;">
                                    <form action="{{ route('admin.action') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="action" value="delete_event">
                                        <input type="hidden" name="id" value="{{ $event->id }}">
                                        <button type="submit" class="btn btn-ghost" style="padding: 6px 12px; border-radius: 6px; font-size: 12px; color: var(--red); border: 1px solid rgba(232,25,44,0.2);">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="padding: 40px; text-align: center; color: var(--muted);">No live events available.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SECTION 4: BOOKINGS MANAGEMENT             -->
            <!-- ========================================== -->
            <div id="section-bookings" class="admin-section-content" style="display: none;">
                <header class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
                    <div>
                        <h1 class="admin-title" style="font-size: 32px; font-family: var(--font-display); letter-spacing: 2px; color: var(--white); font-weight: 700; margin: 0;">BOOKINGS</h1>
                        <div class="admin-date" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Monitor and cancel transaction records</div>
                    </div>
                </header>

                <div style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 24px 32px; margin-bottom: 24px; display: flex; gap: 16px; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 250px;">
                        <input type="text" id="booking-search" onkeyup="filterBookings()" placeholder="Search by user or seat..." style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 16px; color: var(--white); outline: none;">
                    </div>
                    <div>
                        <select id="booking-status-filter" onchange="filterBookings()" style="background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 16px; color: var(--white); outline: none;">
                            <option value="">All Statuses</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="table-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 0;">
                    <table class="admin-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border); color: var(--muted);">
                                <th style="padding: 18px 24px;">USER NAME</th>
                                <th style="padding: 18px 24px;">SHOW TIME</th>
                                <th style="padding: 18px 24px;">SEATS</th>
                                <th style="padding: 18px 24px;">BOOKING DATE</th>
                                <th style="padding: 18px 24px;">AMOUNT</th>
                                <th style="padding: 18px 24px;">STATUS</th>
                                <th style="padding: 18px 24px; text-align: right;">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="bookings-tbody">
                            @forelse($bookings as $booking)
                            <tr class="booking-row" data-user="{{ strtolower($booking->user_name) }}" data-seats="{{ strtolower($booking->seat_numbers) }}" data-status="{{ strtolower($booking->payment_status) }}" style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--white);">{{ $booking->user_name }}</td>
                                <td style="padding: 18px 24px;">{{ $booking->show_time ?: 'N/A' }}</td>
                                <td style="padding: 18px 24px; color: var(--red); font-family: var(--font-mono);">{{ str_replace(',', ', ', $booking->seat_numbers) }}</td>
                                <td style="padding: 18px 24px; color: var(--muted);">{{ $booking->booking_date }}</td>
                                <td style="padding: 18px 24px; font-weight: 700;">₹{{ number_format($booking->total_price) }}</td>
                                <td style="padding: 18px 24px;">
                                    <span class="badge" style="background: rgba(29,185,84,0.1); color: var(--green); border: 1px solid rgba(29,185,84,0.2); font-size: 11px; text-transform: uppercase; font-weight: 700; padding: 4px 8px; border-radius: 6px;">{{ $booking->payment_status }}</span>
                                </td>
                                <td style="padding: 18px 24px; text-align: right;">
                                    <form action="{{ route('admin.action') }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel/delete this booking?')" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="action" value="delete_booking">
                                        <input type="hidden" name="id" value="{{ $booking->id }}">
                                        <button type="submit" class="btn btn-ghost" style="padding: 6px 12px; border-radius: 6px; font-size: 12px; color: var(--red); border: 1px solid rgba(232,25,44,0.2);">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" style="padding: 40px; text-align: center; color: var(--muted);">No booking transactions logged yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SECTION 5: USERS DIRECTORY                 -->
            <!-- ========================================== -->
            <div id="section-users" class="admin-section-content" style="display: none;">
                <header class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
                    <div>
                        <h1 class="admin-title" style="font-size: 32px; font-family: var(--font-display); letter-spacing: 2px; color: var(--white); font-weight: 700; margin: 0;">USERS</h1>
                        <div class="admin-date" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Oversee registered user credentials</div>
                    </div>
                </header>

                <div class="table-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 0;">
                    <table class="admin-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border); color: var(--muted);">
                                <th style="padding: 18px 24px;">USER NAME</th>
                                <th style="padding: 18px 24px;">EMAIL ADDRESS</th>
                                <th style="padding: 18px 24px;">WALLET BALANCE</th>
                                <th style="padding: 18px 24px;">ACCOUNT CREATED</th>
                                <th style="padding: 18px 24px; text-align: right;">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $usr)
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 18px 24px; font-weight: 600; color: var(--white);">{{ $usr->name }}</td>
                                <td style="padding: 18px 24px; color: var(--muted);">{{ $usr->email }}</td>
                                <td style="padding: 18px 24px; font-weight: 700; color: var(--gold);">₹{{ number_format($usr->wallet_balance, 2) }}</td>
                                <td style="padding: 18px 24px; color: var(--muted2);">{{ $usr->created_at->format('d M Y') }}</td>
                                <td style="padding: 18px 24px; text-align: right;">
                                    @if($usr->email !== 'admin@ticketflix.com')
                                    <form action="{{ route('admin.action') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="action" value="delete_user">
                                        <input type="hidden" name="id" value="{{ $usr->id }}">
                                        <button type="submit" class="btn btn-ghost" style="padding: 6px 12px; border-radius: 6px; font-size: 12px; color: var(--red); border: 1px solid rgba(232,25,44,0.2);">Delete</button>
                                    </form>
                                    @else
                                    <span style="font-size: 11px; color: var(--muted); font-weight: 600;">System Protected</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="padding: 40px; text-align: center; color: var(--muted);">No users registered in the database.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <!-- ========================================== -->
    <!-- CRU MODAL 1: ADD MOVIE FORM OVERLAY         -->
    <!-- ========================================== -->
    <div id="movieModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.85); backdrop-filter: blur(10px); z-index: 2000; align-items: center; justify-content: center;">
        <div style="background: #111113; border: 1px solid var(--border); border-radius: 24px; width: 500px; max-width: 90%; padding: 32px; box-shadow: 0 20px 50px rgba(0,0,0,0.5);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <h3 style="font-size: 20px; font-weight: 700; color: var(--white);">🎬 Add New Movie</h3>
                <span onclick="closeModal('movieModal')" style="cursor: pointer; font-size: 24px; color: var(--muted); font-weight: 700;">&times;</span>
            </div>
            
            <form action="{{ route('admin.action') }}" method="POST">
                @csrf
                <input type="hidden" name="action" value="add_movie">
                
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Movie Title</label>
                    <input type="text" name="title" required placeholder="e.g., Dhurandhar 3" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                </div>

                <div style="margin-bottom: 16px; display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Genre</label>
                        <input type="text" name="genre" required placeholder="e.g., Action/Sci-Fi" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Duration</label>
                        <input type="text" name="duration" required placeholder="e.g., 2h 30m" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                    </div>
                </div>

                <div style="margin-bottom: 16px; display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Language</label>
                        <input type="text" name="language" required placeholder="e.g., Hindi" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Rating</label>
                        <input type="text" name="rating" required placeholder="e.g., 8.8" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                    </div>
                </div>

                <div style="margin-bottom: 24px;">
                    <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Release Date</label>
                    <input type="date" name="release_date" required style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                </div>

                <div style="display: flex; gap: 16px; margin-top: 8px;">
                    <button type="button" onclick="closeModal('movieModal')" class="btn btn-ghost" style="flex: 1; justify-content: center; padding: 12px; border-radius: 8px;">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="flex: 1; justify-content: center; padding: 12px; border-radius: 8px;">Add Movie</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- CRU MODAL 2: ADD EVENT FORM OVERLAY         -->
    <!-- ========================================== -->
    <div id="eventModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.85); backdrop-filter: blur(10px); z-index: 2000; align-items: center; justify-content: center;">
        <div style="background: #111113; border: 1px solid var(--border); border-radius: 24px; width: 500px; max-width: 90%; padding: 32px; box-shadow: 0 20px 50px rgba(0,0,0,0.5);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <h3 style="font-size: 20px; font-weight: 700; color: var(--white);">🎭 Add New Event</h3>
                <span onclick="closeModal('eventModal')" style="cursor: pointer; font-size: 24px; color: var(--muted); font-weight: 700;">&times;</span>
            </div>
            
            <form action="{{ route('admin.action') }}" method="POST">
                @csrf
                <input type="hidden" name="action" value="add_event">
                
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Event Name</label>
                    <input type="text" name="title" required placeholder="e.g., Retro Nights Music concert" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                </div>

                <div style="margin-bottom: 16px; display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Category</label>
                        <select name="category" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                            <option value="Concert">Concert</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Sports">Sports</option>
                            <option value="Theater">Theater</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Ticket Price (INR)</label>
                        <input type="number" name="price" required placeholder="e.g., 1499" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                    </div>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Venue Location</label>
                    <input type="text" name="location" required placeholder="e.g., MMRDA Grounds, Bandra Kurla Complex" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                </div>

                <div style="margin-bottom: 24px; display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Event Date</label>
                        <input type="date" name="event_date" required style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; color: var(--muted); margin-bottom: 8px; font-weight: 600;">Event Time</label>
                        <input type="text" name="event_time" required placeholder="e.g., 7:00 PM" style="width: 100%; background: #18181c; border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--white); outline: none;">
                    </div>
                </div>

                <div style="display: flex; gap: 16px; margin-top: 8px;">
                    <button type="button" onclick="closeModal('eventModal')" class="btn btn-ghost" style="flex: 1; justify-content: center; padding: 12px; border-radius: 8px;">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="flex: 1; justify-content: center; padding: 12px; border-radius: 8px;">Add Event</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Styles and Interactive Scripts -->
    <style>
        .admin-nav-item:hover {
            color: var(--white) !important;
            background: rgba(255,255,255,0.02);
        }
        .admin-nav-item.active {
            color: var(--white) !important;
            background: rgba(232,25,44,0.08) !important;
            border-left: 4px solid var(--red);
        }
        .admin-table th, .admin-table td {
            border-bottom: 1px solid var(--border);
        }
        .admin-table tr:hover {
            background: rgba(255,255,255,0.01);
        }
    </style>

    <script>
        function switchSection(sectionId, element) {
            // Hide all sections
            document.querySelectorAll('.admin-section-content').forEach(el => {
                el.style.display = 'none';
            });
            // Show target section
            document.getElementById('section-' + sectionId).style.display = 'block';
            
            // Remove active class from all nav items
            document.querySelectorAll('.admin-nav-item').forEach(el => {
                el.classList.remove('active');
            });
            // Add active class to clicked item
            if (element) {
                element.classList.add('active');
            }
        }

        function openModal(modalId) {
            const el = document.getElementById(modalId);
            if (el) {
                el.style.display = 'flex';
            }
        }

        function closeModal(modalId) {
            const el = document.getElementById(modalId);
            if (el) {
                el.style.display = 'none';
            }
        }

        function filterBookings() {
            const query = document.getElementById('booking-search').value.toLowerCase();
            const status = document.getElementById('booking-status-filter').value.toLowerCase();
            
            document.querySelectorAll('.booking-row').forEach(row => {
                const user = row.getAttribute('data-user');
                const seats = row.getAttribute('data-seats');
                const rowStatus = row.getAttribute('data-status');
                
                const matchesQuery = user.includes(query) || seats.includes(query);
                const matchesStatus = status === '' || rowStatus === status;
                
                if (matchesQuery && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</x-layouts.app>