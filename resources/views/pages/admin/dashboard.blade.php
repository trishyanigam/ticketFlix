<x-layouts.app title="Admin Dashboard — TicketFlix">
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div style="padding: 0 28px 20px; font-family: var(--font-display); font-size: 24px; color: var(--white); letter-spacing: 2px;">TICKET<span>FLIX</span><br><small style="font-family: var(--font-body); font-size: 10px; color: var(--muted2); letter-spacing: 1px; text-transform: uppercase;">Admin Dashboard</small></div>

            <div class="admin-nav-label">Overview</div>
            <div class="admin-nav-item active">
                <span class="admin-nav-icon">📊</span> Dashboard
            </div>
            <div class="admin-nav-item">
                <span class="admin-nav-icon">📈</span> Analytics
            </div>

            <div class="admin-nav-label">Content</div>
            <div class="admin-nav-item">
                <span class="admin-nav-icon">🎬</span> Movies
            </div>
            <div class="admin-nav-item">
                <span class="admin-nav-icon">🎭</span> Events
            </div>
            <div class="admin-nav-item">
                <span class="admin-nav-icon">🏟️</span> Venues
            </div>

            <div class="admin-nav-label">Operations</div>
            <div class="admin-nav-item">
                <span class="admin-nav-icon">🎫</span> Bookings
            </div>
            <div class="admin-nav-item">
                <span class="admin-nav-icon">👥</span> Users
            </div>
            <div class="admin-nav-item">
                <span class="admin-nav-icon">💰</span> Revenue
            </div>

            <div class="admin-nav-label">Settings</div>
            <div class="admin-nav-item">
                <span class="admin-nav-icon">⚙️</span> Configuration
            </div>
            <div class="admin-nav-item">
                <span class="admin-nav-icon">🎁</span> Offers & Promos
            </div>
        </aside>

        <main class="admin-content" style="padding-top: 60px;">
            <header class="admin-header">
                <div>
                    <h1 class="admin-title">DASHBOARD</h1>
                    <div class="admin-date">Sunday, 26 April 2025 · Real-time data</div>
                </div>
                <div style="display: flex; gap: 16px;">
                    <button class="btn btn-ghost" style="border-radius: 8px; border: 1px solid var(--border); font-size: 13px; font-weight: 600; padding: 8px 16px; display: flex; align-items: center; gap: 8px;">
                        <span>📥</span> Export Report
                    </button>
                    <button class="btn btn-primary" style="border-radius: 8px; font-size: 13px; font-weight: 700; padding: 8px 24px;">+ Add Movie</button>
                </div>
            </header>

            <div class="admin-stats-grid">
                <div class="stat-card red">
                    <div class="stat-icon" style="background: rgba(232,25,44,0.1); color: var(--red); width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 24px;">🎟️</div>
                    <div class="stat-value" style="font-size: 32px; font-weight: 700;">12,481</div>
                    <div class="stat-label" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Total Bookings Today</div>
                    <div class="stat-change up" style="color: var(--green); font-size: 12px; margin-top: 12px;">↑ 18.4% vs yesterday</div>
                </div>
                <div class="stat-card gold">
                    <div class="stat-icon" style="background: rgba(245,200,66,0.1); color: var(--gold); width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 24px;">💰</div>
                    <div class="stat-value" style="font-size: 32px; font-weight: 700;">₹48.2L</div>
                    <div class="stat-label" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Revenue Today</div>
                    <div class="stat-change up" style="color: var(--green); font-size: 12px; margin-top: 12px;">↑ 22.1% vs yesterday</div>
                </div>
                <div class="stat-card blue">
                    <div class="stat-icon" style="background: rgba(99,179,237,0.1); color: #63B3ED; width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 24px;">👥</div>
                    <div class="stat-value" style="font-size: 32px; font-weight: 700;">3,204</div>
                    <div class="stat-label" style="font-size: 13px; color: var(--muted); margin-top: 4px;">New Users Today</div>
                    <div class="stat-change up" style="color: var(--green); font-size: 12px; margin-top: 12px;">↑ 5.7% vs yesterday</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(255,255,255,0.05); color: var(--white); width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 24px;">🎬</div>
                    <div class="stat-value" style="font-size: 32px; font-weight: 700;">142</div>
                    <div class="stat-label" style="font-size: 13px; color: var(--muted); margin-top: 4px;">Active Movies</div>
                    <div class="stat-change up" style="color: var(--green); font-size: 12px; margin-top: 12px;">↑ 8 added this week</div>
                </div>
            </div>

            <div class="charts-grid charts-grid-3" style="gap: 32px; margin-bottom: 32px;">
                <div class="chart-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 32px;">
                    <div class="chart-header">
                        <div class="chart-title" style="font-size: 18px; font-weight: 700;">Revenue by Week <small style="font-weight: 400; color: var(--muted);">(₹ Lakhs)</small></div>
                        <div style="display: flex; gap: 16px; font-size: 12px;">
                            <div style="display: flex; align-items: center; gap: 6px;"><div style="width: 10px; height: 10px; background: var(--red); border-radius: 2px;"></div> Movies</div>
                            <div style="display: flex; align-items: center; gap: 6px;"><div style="width: 10px; height: 10px; background: #63B3ED; border-radius: 2px;"></div> Events</div>
                        </div>
                    </div>
                    <div class="chart-area" style="height: 240px; margin-top: 40px;">
                        <div class="bar-chart" style="padding-bottom: 20px;">
                            @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                            <div class="bar-group">
                                <div class="bar-wrap">
                                    <div class="bar movie" style="height: {{ rand(30, 90) }}%; width: 12px; border-radius: 4px;"></div>
                                    <div class="bar event" style="height: {{ rand(20, 60) }}%; width: 12px; border-radius: 4px; background: #63B3ED;"></div>
                                </div>
                                <div class="bar-label">{{ $day }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="chart-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 32px;">
                    <div class="chart-title" style="font-size: 18px; font-weight: 700; margin-bottom: 40px;">Revenue Split</div>
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 40px;">
                        <div style="position: relative; width: 160px; height: 160px;">
                            <svg width="160" height="160" style="transform: rotate(-90deg);">
                                <circle cx="80" cy="80" r="70" fill="transparent" stroke="#18181c" stroke-width="16"/>
                                <circle cx="80" cy="80" r="70" fill="transparent" stroke="var(--red)" stroke-width="16" stroke-dasharray="280 440" stroke-linecap="round"/>
                                <circle cx="80" cy="80" r="70" fill="transparent" stroke="#63B3ED" stroke-width="16" stroke-dasharray="100 440" stroke-dashoffset="-280" stroke-linecap="round"/>
                                <circle cx="80" cy="80" r="70" fill="transparent" stroke="var(--gold)" stroke-width="16" stroke-dasharray="40 440" stroke-dashoffset="-380" stroke-linecap="round"/>
                            </svg>
                            <div style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <div style="font-size: 24px; font-weight: 700;">₹1.8CR</div>
                                <div style="font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: 1px;">This Week</div>
                            </div>
                        </div>
                        <div style="width: 100%; display: flex; flex-direction: column; gap: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13px;">
                                <div style="display: flex; align-items: center; gap: 10px;"><div style="width: 8px; height: 8px; background: var(--red); border-radius: 50%;"></div> Movies</div>
                                <div style="color: var(--white); font-weight: 600;">60%</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13px;">
                                <div style="display: flex; align-items: center; gap: 10px;"><div style="width: 8px; height: 8px; background: #63B3ED; border-radius: 50%;"></div> Events</div>
                                <div style="color: var(--white); font-weight: 600;">30%</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13px;">
                                <div style="display: flex; align-items: center; gap: 10px;"><div style="width: 8px; height: 8px; background: var(--gold); border-radius: 50%;"></div> Offers</div>
                                <div style="color: var(--white); font-weight: 600;">10%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 0; margin-bottom: 40px;">
                <div style="padding: 24px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border);">
                    <div style="font-size: 18px; font-weight: 700;">Top Performing Movies</div>
                    <button class="btn btn-ghost btn-sm" style="border: 1px solid var(--border); border-radius: 6px;">View All</button>
                </div>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th style="width: 60px; text-align: center;">#</th>
                            <th>MOVIE</th>
                            <th>GENRE</th>
                            <th>BOOKINGS</th>
                            <th>REVENUE</th>
                            <th>RATING</th>
                            <th>OCCUPANCY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center; font-weight: 700; color: var(--gold);">1</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div style="width: 32px; height: 32px; background: var(--surface3); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 16px;">🔥</div>
                                    <div style="font-weight: 600;">Blaze of Glory</div>
                                </div>
                            </td>
                            <td>Action</td>
                            <td style="font-weight: 600;">4,281</td>
                            <td style="color: var(--green); font-weight: 600;">₹18.4L</td>
                            <td><span style="color: var(--gold);">⭐</span> 8.4</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div class="progress-bar" style="flex: 1; height: 4px; background: #18181c;">
                                        <div class="progress-fill" style="width: 92%; background: var(--green);"></div>
                                    </div>
                                    <span style="font-size: 11px; color: var(--green); font-weight: 700; width: 30px;">92%</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; font-weight: 700; color: #888892;">2</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div style="width: 32px; height: 32px; background: var(--surface3); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 16px;">🌌</div>
                                    <div style="font-weight: 600;">Void Runners</div>
                                </div>
                            </td>
                            <td>Sci-Fi</td>
                            <td style="font-weight: 600;">3,840</td>
                            <td style="color: var(--green); font-weight: 600;">₹16.2L</td>
                            <td><span style="color: var(--gold);">⭐</span> 9.1</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div class="progress-bar" style="flex: 1; height: 4px; background: #18181c;">
                                        <div class="progress-fill" style="width: 87%; background: var(--green);"></div>
                                    </div>
                                    <span style="font-size: 11px; color: var(--green); font-weight: 700; width: 30px;">87%</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-container" style="background: #111113; border: 1px solid var(--border); border-radius: 24px; padding: 0; margin-bottom: 40px;">
                <div style="padding: 24px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border);">
                    <div style="font-size: 18px; font-weight: 700;">Recent Bookings</div>
                    <div style="display: flex; gap: 12px;">
                        <div style="position: relative;">
                            <input type="text" placeholder="Search..." style="background: #18181c; border: 1px solid var(--border); border-radius: 6px; padding: 6px 12px; font-size: 12px; width: 200px; color: var(--white);">
                        </div>
                        <select style="background: #18181c; border: 1px solid var(--border); border-radius: 6px; padding: 6px 12px; font-size: 12px; color: var(--white);">
                            <option>All Status</option>
                            <option>Confirmed</option>
                            <option>Pending</option>
                            <option>Cancelled</option>
                        </select>
                    </div>
                </div>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>BOOKING ID</th>
                            <th>USER</th>
                            <th>MOVIE / EVENT</th>
                            <th>SEATS</th>
                            <th>AMOUNT</th>
                            <th>STATUS</th>
                            <th style="text-align: right;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="color: var(--red); font-family: var(--font-mono); font-size: 12px;">TF2025042601</td>
                            <td>Arjun Sharma</td>
                            <td>Blaze of Glory (IMAX)</td>
                            <td style="color: var(--muted);">G7, G8, G9</td>
                            <td style="font-weight: 700;">₹1,150</td>
                            <td><span class="badge" style="background: rgba(29,185,84,0.1); color: var(--green); border: 1px solid rgba(29,185,84,0.2); font-size: 10px; text-transform: uppercase; font-weight: 700;">Confirmed</span></td>
                            <td style="text-align: right;"><button class="btn btn-ghost btn-sm" style="background: #18181c; border: 1px solid var(--border); font-size: 11px;">View</button></td>
                        </tr>
                        <tr>
                            <td style="color: var(--red); font-family: var(--font-mono); font-size: 12px;">TF2025042560</td>
                            <td>Priya Nair</td>
                            <td>Resonance Music Festival</td>
                            <td style="color: var(--muted);">Premium Zone × 2</td>
                            <td style="font-weight: 700;">₹9,998</td>
                            <td><span class="badge" style="background: rgba(29,185,84,0.1); color: var(--green); border: 1px solid rgba(29,185,84,0.2); font-size: 10px; text-transform: uppercase; font-weight: 700;">Confirmed</span></td>
                            <td style="text-align: right;"><button class="btn btn-ghost btn-sm" style="background: #18181c; border: 1px solid var(--border); font-size: 11px;">View</button></td>
                        </tr>
                        <tr>
                            <td style="color: var(--red); font-family: var(--font-mono); font-size: 12px;">TF2025042524</td>
                            <td>Rahul Gupta</td>
                            <td>Void Runners (4DX)</td>
                            <td style="color: var(--muted);">B12, B13, B14</td>
                            <td style="font-weight: 700;">₹2,100</td>
                            <td><span class="badge" style="background: rgba(245,200,66,0.1); color: var(--gold); border: 1px solid rgba(245,200,66,0.2); font-size: 10px; text-transform: uppercase; font-weight: 700;">Pending</span></td>
                            <td style="text-align: right;"><button class="btn btn-ghost btn-sm" style="background: #18181c; border: 1px solid var(--border); font-size: 11px;">View</button></td>
                        </tr>
                        <tr>
                            <td style="color: var(--red); font-family: var(--font-mono); font-size: 12px;">TF2025042499</td>
                            <td>Sneha Patil</td>
                            <td>IPL 2025: MI vs RCB</td>
                            <td style="color: var(--muted);">Stand A × 3</td>
                            <td style="font-weight: 700;">₹3,600</td>
                            <td><span class="badge" style="background: rgba(29,185,84,0.1); color: var(--green); border: 1px solid rgba(29,185,84,0.2); font-size: 10px; text-transform: uppercase; font-weight: 700;">Confirmed</span></td>
                            <td style="text-align: right;"><button class="btn btn-ghost btn-sm" style="background: #18181c; border: 1px solid var(--border); font-size: 11px;">View</button></td>
                        </tr>
                        <tr>
                            <td style="color: var(--red); font-family: var(--font-mono); font-size: 12px;">TF2025042480</td>
                            <td>Karan Mehta</td>
                            <td>Throne of Steel (IMAX)</td>
                            <td style="color: var(--muted);">F5, F6</td>
                            <td style="font-weight: 700;">₹1,040</td>
                            <td><span class="badge" style="background: rgba(232,25,44,0.1); color: var(--red); border: 1px solid rgba(232,25,44,0.2); font-size: 10px; text-transform: uppercase; font-weight: 700;">Cancelled</span></td>
                            <td style="text-align: right;"><button class="btn btn-ghost btn-sm" style="background: #18181c; border: 1px solid var(--border); font-size: 11px;">View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-layouts.app>