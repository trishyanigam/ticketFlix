<x-layouts.app title="TicketFlix — Book Movies & Events">
    <section class="hero" style="padding-top: 100px; min-height: 700px; background: radial-gradient(circle at 20% 50%, rgba(232,25,44,0.05) 0%, transparent 50%);">
        <div class="hero-bg"></div>
        <div class="container" style="display: flex; gap: 80px; align-items: center; position: relative; z-index: 2;">
            <div class="hero-content-box" style="flex: 1; border-left: 2px solid var(--red-dark); padding-left: 48px;">
                <div class="hero-eyebrow" style="color: var(--red); letter-spacing: 2px; font-weight: 700; margin-bottom: 24px; font-size: 14px; text-transform: uppercase;">✦ NOW SHOWING & HAPPENING NEAR YOU</div>
                <h1 class="hero-title" style="font-size: 100px; line-height: 0.85; margin-bottom: 32px; font-family: var(--font-display); letter-spacing: 4px;">MOVIES.<br>EVENTS.<br>ONE CLICK.</h1>
                <p class="hero-desc" style="font-size: 18px; margin-bottom: 48px; opacity: 0.7; max-width: 520px; line-height: 1.6;">Book movie tickets, concerts, sports, and live events — all in one place. No queues. Instant confirmation.</p>
                
                <x-movie.movie-search />
            </div>

            <div class="hero-filmstrip-v" style="width: 380px; display: flex; flex-direction: column; gap: 12px; opacity: 0.4;">
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #4a0505, #1a0505); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #05054a, #05051a); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #054a05, #051a05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #4a4a05, #1a1a05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
                <div class="filmstrip-cell" style="height: 140px; background: linear-gradient(135deg, #4a054a, #1a051a); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; position: relative;">
                    <div style="position: absolute; top: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; top: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; left: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                    <div style="position: absolute; bottom: 12px; right: 12px; width: 8px; height: 8px; background: #000; border-radius: 2px;"></div>
                </div>
            </div>
        </div>

        <div class="container" style="position: relative; z-index: 2; margin-top: 60px;">
            <div class="offer-strip" style="background: rgba(232,25,44,0.04); border: 1px solid rgba(232,25,44,0.15); padding: 18px 28px; border-radius: 12px; display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="width: 44px; height: 44px; background: rgba(255,255,255,0.05); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 24px;">🎫</div>
                    <div style="font-size: 15px; color: var(--muted); line-height: 1.4;">
                        <strong style="color: var(--white); font-weight: 700;">HDFC Bank Offer</strong> — Get ₹150 off on your first booking using HDFC Debit/Credit card.
                    </div>
                </div>
                <div style="font-family: var(--font-mono); color: var(--gold); border: 1px dashed rgba(245,200,66,0.4); padding: 6px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; letter-spacing: 1px; background: rgba(245,200,66,0.03);">HDFC150 — COPY</div>
            </div>
        </div>
    </section>

    <section style="background: var(--surface);">
        <div class="container">
            <x-movie.category-grid />
        </div>
    </section>
    <section class="container" style="padding-top: 80px; padding-bottom: 80px;">
        <div class="section-header" style="flex-direction: column; align-items: flex-start; gap: 24px; margin-bottom: 48px;">
            <div style="display: flex; justify-content: space-between; width: 100%; align-items: center;">
                <div class="section-title" style="font-size: 40px; letter-spacing: 2px;">TRENDING <span>MOVIES</span></div>
                <a href="{{ route('movies.index') }}" class="btn btn-ghost btn-sm" style="border-radius: 100px; padding: 8px 20px; font-size: 13px;">See All ➔</a>
            </div>
            <div class="pill-tabs" style="gap: 12px;">
                <button class="pill-tab active">All</button>
                <button class="pill-tab">Action</button>
                <button class="pill-tab">Drama</button>
                <button class="pill-tab">Comedy</button>
                <button class="pill-tab">Thriller</button>
                <button class="pill-tab">Sci-Fi</button>
            </div>
        </div>
        
        <div class="movies-grid" style="grid-template-columns: repeat(5, 1fr); gap: 40px;">
            <x-movie.movie-card title="Blaze" rating="8.4" genre="Action" duration="2h 28m" emoji="🔥" poster="poster-1" />
            <x-movie.movie-card title="Void" rating="9.1" genre="Sci-Fi" duration="2h 52m" emoji="🌌" poster="poster-2" />
            <x-movie.movie-card title="Roots" rating="7.8" genre="Drama" duration="2h 10m" emoji="🌿" poster="poster-3" />
            <x-movie.movie-card title="Throne" rating="8.7" genre="Epic" duration="3h 5m" emoji="⚔️" poster="poster-4" />
            <x-movie.movie-card title="Nexus" rating="8.2" genre="Thriller" duration="2h 18m" emoji="🧬" poster="poster-5" />
        </div>
    </section>

    <section class="container" style="padding-top: 80px; padding-bottom: 80px;">
        <div class="section-header" style="margin-bottom: 48px;">
            <div class="section-title" style="font-size: 40px; letter-spacing: 2px;">UPCOMING <span>EVENTS</span></div>
            <button class="btn btn-ghost btn-sm" style="border-radius: 100px; padding: 8px 20px; font-size: 13px;">See All ➔</button>
        </div>
        <div class="grid" style="grid-template-columns: repeat(3, 1fr); gap: 40px;">
            <div class="event-card-v" style="background: var(--surface2); border-radius: 28px; border: 1px solid var(--border); overflow: hidden; transition: var(--transition); cursor: pointer;" onmouseover="this.style.borderColor='var(--border2)'" onmouseout="this.style.borderColor='var(--border)'">
                <div class="poster-1" style="height: 220px; display: flex; align-items: center; justify-content: center; font-size: 80px;">🎵</div>
                <div style="padding: 32px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 16px;">Resonance Music Festival 2025</h3>
                    <div style="font-size: 14px; color: var(--muted); display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; align-items: center; gap: 10px;">📅 28 Apr - 30 Apr, 2025</div>
                        <div style="display: flex; align-items: center; gap: 10px;">📍 MMRDA Grounds, Mumbai</div>
                        <div style="display: flex; align-items: center; gap: 10px;">👥 15 Artists · 3 Stages</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 32px;">
                        <div style="font-weight: 700; font-size: 22px; color: var(--white);">₹ 2,499 <small style="font-weight: 400; color: var(--muted); font-size: 12px;">onwards</small></div>
                        <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 28px; font-weight: 700;">Get Tickets</button>
                    </div>
                </div>
            </div>
            <div class="event-card-v" style="background: var(--surface2); border-radius: 28px; border: 1px solid var(--border); overflow: hidden; transition: var(--transition); cursor: pointer;" onmouseover="this.style.borderColor='var(--border2)'" onmouseout="this.style.borderColor='var(--border)'">
                <div class="poster-3" style="height: 220px; display: flex; align-items: center; justify-content: center; font-size: 80px;">⚽</div>
                <div style="padding: 32px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 16px;">IPL 2025: MI vs RCB Grand Final</h3>
                    <div style="font-size: 14px; color: var(--muted); display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; align-items: center; gap: 10px;">📅 5 May 2025, 7:30 PM</div>
                        <div style="display: flex; align-items: center; gap: 10px;">📍 Wankhede Stadium, Mumbai</div>
                        <div style="display: flex; align-items: center; gap: 10px;">🏟 Capacity: 32,000</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 32px;">
                        <div style="font-weight: 700; font-size: 22px; color: var(--white);">₹ 800 <small style="font-weight: 400; color: var(--muted); font-size: 12px;">onwards</small></div>
                        <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 28px; font-weight: 700;">Get Tickets</button>
                    </div>
                </div>
            </div>
            <div class="event-card-v" style="background: var(--surface2); border-radius: 28px; border: 1px solid var(--border); overflow: hidden; transition: var(--transition); cursor: pointer;" onmouseover="this.style.borderColor='var(--border2)'" onmouseout="this.style.borderColor='var(--border)'">
                <div class="poster-4" style="height: 220px; display: flex; align-items: center; justify-content: center; font-size: 80px;">🎭</div>
                <div style="padding: 32px;">
                    <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 16px;">The Comedy Gala Night — Season 4</h3>
                    <div style="font-size: 14px; color: var(--muted); display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; align-items: center; gap: 10px;">📅 12 May 2025, 8:00 PM</div>
                        <div style="display: flex; align-items: center; gap: 10px;">📍 NCPA, Mumbai</div>
                        <div style="display: flex; align-items: center; gap: 10px;">🎙 8 Comedians</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 32px;">
                        <div style="font-weight: 700; font-size: 22px; color: var(--white);">₹ 599 <small style="font-weight: 400; color: var(--muted); font-size: 12px;">onwards</small></div>
                        <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 28px; font-weight: 700;">Get Tickets</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>