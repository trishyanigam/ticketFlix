<x-layouts.app title="Events — TicketFlix">
    <header class="movies-page-header" style="background: transparent; padding: 100px 0 40px;">
        <div class="container">
            <h1 style="font-family: var(--font-display); font-size: 48px; letter-spacing: 2px; color: var(--white);">EVENTS <span style="color: var(--red);">IN MUMBAI</span></h1>
            <p style="color: var(--muted); font-size: 14px; margin-top: 8px;">93 events happening near you</p>
        </div>
    </header>

    <section class="container" style="padding-bottom: 80px;">
        <div class="events-layout">
            <!-- Sidebar -->
            <aside class="filters-sidebar">
                <div class="filter-header">
                    <h2>Filters</h2>
                    <a href="#" class="clear-all">Clear All</a>
                </div>

                <div class="filter-section">
                    <div class="filter-title">Category</div>
                    <div class="filter-list">
                        <label class="filter-item"><input type="checkbox" checked> Music & Concerts</label>
                        <label class="filter-item"><input type="checkbox"> Sports</label>
                        <label class="filter-item"><input type="checkbox"> Comedy Shows</label>
                        <label class="filter-item"><input type="checkbox"> Theatre & Arts</label>
                        <label class="filter-item"><input type="checkbox"> Food Festivals</label>
                        <label class="filter-item"><input type="checkbox"> Workshops</label>
                        <label class="filter-item"><input type="checkbox"> Exhibitions</label>
                    </div>
                </div>

                <div class="filter-section">
                    <div class="filter-title">Date</div>
                    <div class="filter-list">
                        <label class="filter-item"><input type="checkbox" checked> Today</label>
                        <label class="filter-item"><input type="checkbox" checked> This Weekend</label>
                        <label class="filter-item"><input type="checkbox"> This Month</label>
                        <label class="filter-item"><input type="checkbox"> Next Month</label>
                    </div>
                </div>

                <div class="filter-section">
                    <div class="filter-title">Price Range</div>
                    <div class="price-slider">
                        <div class="price-progress"></div>
                        <div class="price-handle"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--muted2);">
                        <span>Free</span>
                        <span>₹5,000</span>
                        <span>₹10,000+</span>
                    </div>
                </div>

                <div class="filter-section">
                    <div class="filter-title">Venue Type</div>
                    <div class="filter-list">
                        <label class="filter-item"><input type="checkbox"> Indoor</label>
                        <label class="filter-item"><input type="checkbox"> Outdoor</label>
                        <label class="filter-item"><input type="checkbox"> Virtual</label>
                    </div>
                </div>

                <button class="btn btn-primary w-full" style="margin-top: 10px;">Apply Filters</button>
            </aside>

            <!-- Grid Content -->
            <main>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
                    <div style="font-size: 14px; color: var(--white);">Showing <strong style="color: var(--white);">93 events</strong></div>
                    <select style="background: #18181c; border: 1px solid var(--border); color: var(--white); padding: 8px 16px; border-radius: 8px; font-size: 13px; outline: none;">
                        <option>Sort: Recommended</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Date: Soonest</option>
                    </select>
                </div>

                <div class="grid" style="grid-template-columns: 1fr 1fr; gap: 32px;">
                    <!-- Card 1 -->
                    <div class="event-card-v" style="background: var(--surface2); border-radius: 24px; border: 1px solid var(--border); overflow: hidden;">
                        <div class="poster-1" style="height: 200px; display: flex; align-items: center; justify-content: center; font-size: 64px; position: relative;">
                            🎵
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 100%; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);"></div>
                        </div>
                        <div style="padding: 24px; position: relative;">
                            <div class="badge badge-red mb-1">Music</div>
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: var(--white);">Resonance Music Festival 2025</h3>
                            <div style="font-size: 13px; color: var(--muted); display: flex; flex-direction: column; gap: 8px;">
                                <div>📅 28 Apr - 30 Apr, 2025</div>
                                <div>📍 MMRDA Grounds, Mumbai</div>
                                <div style="color: var(--muted);">👥 15,000 attending</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
                                <div style="font-weight: 700; font-size: 18px; color: var(--white);">₹ 2,499 <small style="font-weight: 400; color: var(--muted);">onwards</small></div>
                                <button class="btn btn-primary btn-sm">Book</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="event-card-v" style="background: var(--surface2); border-radius: 24px; border: 1px solid var(--border); overflow: hidden;">
                        <div class="poster-3" style="height: 200px; display: flex; align-items: center; justify-content: center; font-size: 64px; position: relative;">
                            ⚽
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 100%; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);"></div>
                        </div>
                        <div style="padding: 24px; position: relative;">
                            <div class="badge badge-green mb-1">Sports</div>
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: var(--white);">IPL 2025: MI vs RCB Grand Final</h3>
                            <div style="font-size: 13px; color: var(--muted); display: flex; flex-direction: column; gap: 8px;">
                                <div>📅 5 May 2025, 7:30 PM</div>
                                <div>📍 Wankhede Stadium, Mumbai</div>
                                <div style="color: var(--red); font-weight: 600;">🎟 Only 2,400 tickets left!</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
                                <div style="font-weight: 700; font-size: 18px; color: var(--white);">₹ 800 <small style="font-weight: 400; color: var(--muted);">onwards</small></div>
                                <button class="btn btn-primary btn-sm">Book</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="event-card-v" style="background: var(--surface2); border-radius: 24px; border: 1px solid var(--border); overflow: hidden;">
                        <div class="poster-4" style="height: 200px; display: flex; align-items: center; justify-content: center; font-size: 64px; position: relative;">
                            🎭
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 100%; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);"></div>
                        </div>
                        <div style="padding: 24px; position: relative;">
                            <div class="badge badge-gold mb-1">Comedy</div>
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: var(--white);">The Comedy Gala Night — Season 4</h3>
                            <div style="font-size: 13px; color: var(--muted); display: flex; flex-direction: column; gap: 8px;">
                                <div>📅 12 May 2025, 8:00 PM</div>
                                <div>📍 NCPA, Mumbai</div>
                                <div style="color: var(--muted);">🎤 8 Top Comedians</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
                                <div style="font-weight: 700; font-size: 18px; color: var(--white);">₹ 599 <small style="font-weight: 400; color: var(--muted);">onwards</small></div>
                                <button class="btn btn-primary btn-sm">Book</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="event-card-v" style="background: var(--surface2); border-radius: 24px; border: 1px solid var(--border); overflow: hidden;">
                        <div class="poster-5" style="height: 200px; display: flex; align-items: center; justify-content: center; font-size: 64px; position: relative;">
                            🎨
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 100%; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);"></div>
                        </div>
                        <div style="padding: 24px; position: relative;">
                            <div class="badge badge-blue mb-1">Exhibition</div>
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: var(--white);">Digital Art & Culture Expo</h3>
                            <div style="font-size: 13px; color: var(--muted); display: flex; flex-direction: column; gap: 8px;">
                                <div>📅 18-25 May 2025</div>
                                <div>📍 BKC, Mumbai</div>
                                <div style="color: var(--muted);">🖼 200+ Artists</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
                                <div style="font-weight: 700; font-size: 18px; color: var(--white);">₹ 299 <small style="font-weight: 400; color: var(--muted);">onwards</small></div>
                                <button class="btn btn-primary btn-sm">Book</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>
</x-layouts.app>