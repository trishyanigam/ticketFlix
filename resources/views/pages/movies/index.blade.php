<x-layouts.app title="Movies — TicketFlix">
    <header class="movies-page-header" style="background: transparent; padding: 100px 0 40px;">
        <div class="container">
            <h1 style="font-family: var(--font-display); font-size: 48px; letter-spacing: 2px; color: var(--white);">NOW SHOWING <span style="color: var(--red);">IN MUMBAI</span></h1>
            <p style="color: var(--muted); font-size: 14px; margin-top: 8px;">142 movies across 320 theatres</p>
        </div>
    </header>

    <div class="filters-bar" style="background: rgba(255,255,255,0.02); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 16px 0; sticky: top; top: 64px; z-index: 100; backdrop-filter: blur(12px);">
        <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 16px;">
                <span style="font-size: 11px; font-weight: 700; color: var(--muted2); letter-spacing: 1px;">FILTER:</span>
                <select class="filter-select" style="background: #18181c; border-color: var(--border2); padding: 8px 16px; font-size: 12px; border-radius: 8px;">
                    <option>All Formats</option>
                    <option>2D</option>
                    <option>3D</option>
                    <option>IMAX</option>
                </select>
                <select class="filter-select" style="background: #18181c; border-color: var(--border2); padding: 8px 16px; font-size: 12px; border-radius: 8px;">
                    <option>All Genres</option>
                    <option>Action</option>
                    <option>Comedy</option>
                </select>
                <select class="filter-select" style="background: #18181c; border-color: var(--border2); padding: 8px 16px; font-size: 12px; border-radius: 8px;">
                    <option>All Languages</option>
                    <option>Hindi</option>
                    <option>English</option>
                </select>
                <select class="filter-select" style="background: #18181c; border-color: var(--border2); padding: 8px 16px; font-size: 12px; border-radius: 8px;">
                    <option>Today</option>
                    <option>Tomorrow</option>
                </select>
            </div>
            <div style="display: flex; gap: 8px;">
                <button class="pill-tab active" style="padding: 6px 16px; border-radius: 100px;">All</button>
                <button class="pill-tab" style="padding: 6px 16px; border-radius: 100px; display: flex; align-items: center; gap: 6px; border-color: var(--border);">⭐ Top Rated</button>
                <button class="pill-tab" style="padding: 6px 16px; border-radius: 100px; display: flex; align-items: center; gap: 6px; border-color: var(--border);">🔥 New</button>
                <button class="pill-tab" style="padding: 6px 16px; border-radius: 100px; display: flex; align-items: center; gap: 6px; border-color: var(--border);">🎬 Premieres</button>
            </div>
        </div>
    </div>

    <section class="container" style="padding-top: 60px; padding-bottom: 60px;">
        <div class="movies-grid-4" style="grid-template-columns: repeat(4, 1fr); gap: 32px;">
            <x-movie.movie-card 
                title="Blaze" full_title="Blaze of Glory" rating="8.4" genre="Action" duration="2h 28m" emoji="🔥" poster="poster-1" 
                :formats="['IMAX', '3D', '2D']" 
            />
            <x-movie.movie-card 
                title="Void" full_title="Void Runners" rating="9.1" genre="Sci-Fi" duration="2h 52m" emoji="🌌" poster="poster-2" 
                :formats="['IMAX', '4DX']" 
            />
            <x-movie.movie-card 
                title="Roots" full_title="Roots & Ruins" rating="7.8" genre="Drama" duration="2h 10m" emoji="🌿" poster="poster-3" 
                :formats="['2D']" 
            />
            <x-movie.movie-card 
                title="Throne" full_title="Throne of Steel" rating="8.7" genre="Epic" duration="3h 5m" emoji="⚔️" poster="poster-4" 
                :formats="['IMAX', '3D']" 
            />
            
            <x-movie.movie-card 
                title="Nexus" full_title="Nexus Protocol" rating="8.2" genre="Thriller" duration="2h 18m" emoji="🧬" poster="poster-5" 
                :formats="['2D', '3D']" 
            />
            <x-movie.movie-card 
                title="Surge" full_title="Surge: Reloaded" rating="7.5" genre="Action" duration="1h 58m" emoji="⚡" poster="poster-4" 
                :formats="['2D']" 
            />
            <x-movie.movie-card 
                title="Deep" full_title="Deep Blue Fear" rating="7.2" genre="Horror" duration="1h 50m" emoji="🌊" poster="poster-2" 
                :formats="['IMAX', '3D']" 
            />
            <x-movie.movie-card 
                title="Petal" full_title="Last Petal" rating="8.0" genre="Romance" duration="2h 5m" emoji="🌹" poster="poster-1" 
                :formats="['2D']" 
            />
        </div>
    </section>
</x-layouts.app>