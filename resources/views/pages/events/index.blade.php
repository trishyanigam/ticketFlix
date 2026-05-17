<x-layouts.app title="Events — TicketFlix">
    <header class="movies-page-header" style="background: transparent; padding: 100px 0 40px;">
        <div class="container">
            <h1 style="font-family: var(--font-display); font-size: 48px; letter-spacing: 2px; color: var(--white);">EVENTS <span style="color: var(--red);">IN MUMBAI</span></h1>
            <p style="color: var(--muted); font-size: 14px; margin-top: 8px;">5 events happening near you</p>
        </div>
    </header>

    <section class="container" style="padding-bottom: 80px;">
        <div class="events-layout">
            <!-- Sidebar -->
            <aside class="filters-sidebar">
                <div class="filter-header">
                    <h2>Filters</h2>
                    <a href="#" id="clear-all-filters" class="clear-all">Clear All</a>
                </div>

                <div class="filter-section">
                    <div class="filter-title">Category</div>
                    <div class="filter-list">
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="category" value="music"> Music & Concerts</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="category" value="sports"> Sports</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="category" value="comedy"> Comedy Shows</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="category" value="theatre"> Theatre & Arts</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="category" value="food"> Food Festivals</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="category" value="workshop"> Workshops</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="category" value="exhibitions"> Exhibitions</label>
                    </div>
                </div>

                <div class="filter-section">
                    <div class="filter-title">Date</div>
                    <div class="filter-list">
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="date" value="today"> Today</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="date" value="this-weekend"> This Weekend</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="date" value="this-month"> This Month</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="date" value="next-month"> Next Month</label>
                    </div>
                </div>

                <div class="filter-section">
                    <div class="filter-title" style="display: flex; justify-content: space-between; align-items: center;">
                        <span>Price Range</span>
                        <span id="price-value-display" style="color: var(--red); font-weight: 700; font-size: 13px;">Up to ₹3,000</span>
                    </div>
                    <div style="margin: 16px 0 8px;">
                        <input type="range" id="price-range-input" min="500" max="3000" step="100" value="3000" style="width: 100%; accent-color: var(--red); cursor: pointer; background: rgba(255,255,255,0.1); border-radius: 8px; height: 6px; outline: none; -webkit-appearance: none;">
                    </div>
                    <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--muted2);">
                        <span>₹500</span>
                        <span>₹1,800</span>
                        <span>₹3,000</span>
                    </div>
                </div>

                <div class="filter-section">
                    <div class="filter-title">Venue Type</div>
                    <div class="filter-list">
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="venue" value="indoor"> Indoor</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="venue" value="outdoor"> Outdoor</label>
                        <label class="filter-item"><input type="checkbox" class="filter-checkbox" data-group="venue" value="virtual"> Virtual</label>
                    </div>
                </div>

                <button id="apply-filters-btn" class="btn btn-primary w-full" style="margin-top: 10px;">Apply Filters</button>
            </aside>

            <!-- Grid Content -->
            <main>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
                    <div style="font-size: 14px; color: var(--white);">Showing <strong style="color: var(--white);">5 events</strong></div>
                    <select style="background: #18181c; border: 1px solid var(--border); color: var(--white); padding: 8px 16px; border-radius: 8px; font-size: 13px; outline: none;">
                        <option>Sort: Recommended</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Date: Soonest</option>
                    </select>
                </div>

                <div class="grid" style="grid-template-columns: 1fr 1fr; gap: 32px;">
                    <!-- Card 1 (TOXIC) -->
                    <div class="event-card-v" data-category="comedy" data-date="this-month" data-venue="indoor" data-price="1499" style="background: var(--surface2); border-radius: 24px; border: 1px solid var(--border); overflow: hidden;">
                        <div style="height: 200px; position: relative; overflow: hidden;">
                            <img src="{{ asset('assets/images/movies/event1b.jpg') }}" alt="TOXIC - Abhishek Upmanyu Live" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 100%; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);"></div>
                        </div>
                        <div style="padding: 24px; position: relative;">
                            <div class="badge badge-gold mb-1">Comedy</div>
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: var(--white);">TOXIC - Abhishek Upmanyu Live</h3>
                            <div style="font-size: 13px; color: var(--muted); display: flex; flex-direction: column; gap: 8px;">
                                <div>📅 Sun, 5 Apr onwards</div>
                                <div>📍 The Laugh Store: DLF Mall of India</div>
                                <div style="color: var(--muted);">🎙 Stand up Comedy</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
                                <div style="font-weight: 700; font-size: 18px; color: var(--white);">₹ 1,499 <small style="font-weight: 400; color: var(--muted);">onwards</small></div>
                                <button class="btn btn-primary btn-sm">Book</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 (IPL 2026 Grand Finale) -->
                    <div class="event-card-v" data-category="sports" data-date="this-weekend" data-venue="outdoor" data-price="1500" style="background: var(--surface2); border-radius: 24px; border: 1px solid var(--border); overflow: hidden;">
                        <div style="height: 200px; position: relative; overflow: hidden;">
                            <img src="{{ asset('assets/images/movies/event2.jpg') }}" alt="IPL 2026: Grand Finale" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 100%; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);"></div>
                        </div>
                        <div style="padding: 24px; position: relative;">
                            <div class="badge badge-green mb-1">Sports</div>
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: var(--white);">IPL 2026: Grand Finale</h3>
                            <div style="font-size: 13px; color: var(--muted); display: flex; flex-direction: column; gap: 8px;">
                                <div>📅 Sun, 31 May 2026, 7:30 PM</div>
                                <div>📍 Wankhede Stadium, Mumbai</div>
                                <div style="color: var(--muted);">🏟 Sports · TATA IPL</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
                                <div style="font-weight: 700; font-size: 18px; color: var(--white);">₹ 1,500 <small style="font-weight: 400; color: var(--muted);">onwards</small></div>
                                <button class="btn btn-primary btn-sm">Book</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 (Sunburn Festival 2026) -->
                    <div class="event-card-v" data-category="music" data-date="next-month" data-venue="outdoor" data-price="3000" style="background: var(--surface2); border-radius: 24px; border: 1px solid var(--border); overflow: hidden;">
                        <div style="height: 200px; position: relative; overflow: hidden;">
                            <img src="{{ asset('assets/images/movies/event3.avif') }}" alt="Sunburn Festival 2026" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 12px; right: 12px; background: var(--red); color: var(--white); font-size: 9px; font-weight: 700; padding: 3px 8px; border-radius: 4px; letter-spacing: 0.5px; z-index: 10;">PROMOTED</div>
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 100%; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);"></div>
                        </div>
                        <div style="padding: 24px; position: relative;">
                            <div class="badge badge-red mb-1">Music</div>
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: var(--white);">Sunburn Festival 2026</h3>
                            <div style="font-size: 13px; color: var(--muted); display: flex; flex-direction: column; gap: 8px;">
                                <div>📅 Fri, 18 Dec onwards</div>
                                <div>📍 Mahalaxmi Race Course, Mumbai</div>
                                <div style="color: var(--muted);">🎙 Concerts · Electronic</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
                                <div style="font-weight: 700; font-size: 18px; color: var(--white);">₹ 3,000 <small style="font-weight: 400; color: var(--muted);">onwards</small></div>
                                <button class="btn btn-primary btn-sm">Book</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 (Sunidhi Chauhan) -->
                    <div class="event-card-v" data-category="music" data-date="next-month" data-venue="indoor" data-price="999" style="background: var(--surface2); border-radius: 24px; border: 1px solid var(--border); overflow: hidden;">
                        <div style="height: 200px; position: relative; overflow: hidden;">
                            <img src="{{ asset('assets/images/movies/event5.jpg') }}" alt="Sunidhi Chauhan - I AM HOME INDIA TOUR 2025-26" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 100%; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);"></div>
                        </div>
                        <div style="padding: 24px; position: relative;">
                            <div class="badge badge-red mb-1">Music</div>
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: var(--white);">Sunidhi Chauhan - I AM HOME INDIA TOUR 2025-26</h3>
                            <div style="font-size: 13px; color: var(--muted); display: flex; flex-direction: column; gap: 8px;">
                                <div>📅 Sat, 27 Jun 2026, 7:00 PM</div>
                                <div>📍 SVPI Indoor Stadium, Mumbai</div>
                                <div style="color: var(--muted);">🎙 Concerts · Bollywood</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
                                <div style="font-weight: 700; font-size: 18px; color: var(--white);">₹ 999 <small style="font-weight: 400; color: var(--muted);">onwards</small></div>
                                <button class="btn btn-primary btn-sm">Book</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5 (Sufi Night 2.0) -->
                    <div class="event-card-v" data-category="music" data-date="this-weekend" data-venue="indoor" data-price="1899" style="background: var(--surface2); border-radius: 24px; border: 1px solid var(--border); overflow: hidden;">
                        <div style="height: 200px; position: relative; overflow: hidden;">
                            <img src="{{ asset('assets/images/movies/event4.avif') }}" alt="Sufi Night 2.0" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 100%; background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);"></div>
                        </div>
                        <div style="padding: 24px; position: relative;">
                            <div class="badge badge-red mb-1">Music</div>
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 12px; color: var(--white);">Sufi Night 2.0</h3>
                            <div style="font-size: 13px; color: var(--muted); display: flex; flex-direction: column; gap: 8px;">
                                <div>📅 Sat, 23 May 2026, 8:00 PM</div>
                                <div>📍 Cafe Crave, Sonipat</div>
                                <div style="color: var(--muted);">🎙 Club Gigs · Music Shows</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);">
                                <div style="font-weight: 700; font-size: 18px; color: var(--white);">₹ 1,899 <small style="font-weight: 400; color: var(--muted);">onwards</small></div>
                                <button class="btn btn-primary btn-sm">Book</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkboxes = document.querySelectorAll('.filter-checkbox');
        const priceInput = document.getElementById('price-range-input');
        const priceDisplay = document.getElementById('price-value-display');
        const clearAllBtn = document.getElementById('clear-all-filters');
        const applyFiltersBtn = document.getElementById('apply-filters-btn');
        const eventCards = document.querySelectorAll('.event-card-v');
        const showingCount = document.querySelector('strong'); // showing X events element

        // Update price display when slider moves
        if (priceInput && priceDisplay) {
            priceInput.addEventListener('input', (e) => {
                priceDisplay.textContent = `Up to ₹${parseInt(e.target.value).toLocaleString()}`;
                filterEvents();
            });
        }

        function filterEvents() {
            // Gather selected filters
            const activeFilters = {
                category: [],
                date: [],
                venue: []
            };

            checkboxes.forEach(cb => {
                if (cb.checked) {
                    const group = cb.dataset.group;
                    activeFilters[group].push(cb.value);
                }
            });

            const maxPrice = priceInput ? parseInt(priceInput.value) : Infinity;

            let visibleCount = 0;

            eventCards.forEach(card => {
                const category = card.dataset.category;
                const date = card.dataset.date;
                const venue = card.dataset.venue;
                const price = parseInt(card.dataset.price);

                // Filter criteria
                const matchesCategory = activeFilters.category.length === 0 || activeFilters.category.includes(category);
                const matchesDate = activeFilters.date.length === 0 || activeFilters.date.includes(date);
                const matchesVenue = activeFilters.venue.length === 0 || activeFilters.venue.includes(venue);
                const matchesPrice = price <= maxPrice;

                if (matchesCategory && matchesDate && matchesVenue && matchesPrice) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Update the visible events count text
            if (showingCount) {
                showingCount.textContent = `${visibleCount} event${visibleCount !== 1 ? 's' : ''}`;
            }
        }

        // Apply live filtering on checkbox change
        checkboxes.forEach(cb => {
            cb.addEventListener('change', filterEvents);
        });

        // Apply button click
        if (applyFiltersBtn) {
            applyFiltersBtn.addEventListener('click', (e) => {
                e.preventDefault();
                filterEvents();
            });
        }

        // Clear all filters
        if (clearAllBtn) {
            clearAllBtn.addEventListener('click', (e) => {
                e.preventDefault();
                checkboxes.forEach(cb => cb.checked = false);
                if (priceInput) {
                    priceInput.value = 3000;
                    priceDisplay.textContent = "Up to ₹3,000";
                }
                filterEvents();
            });
        }

        // Run initial filter to set starting state
        filterEvents();
    });
    </script>
</x-layouts.app>