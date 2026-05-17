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
                title="Dhurandhar" full_title="Dhurandhar 2" rating="8.8" genre="Action/Thriller" duration="2h 37m" emoji="🗡️" poster="poster-6" 
                image="dhurandhar2.jpg"
                :formats="['IMAX', '2D']" 
            />
            <x-movie.movie-card 
                title="Krishna" 
                full_title="Krishnavataram Part 1: The Heart"
                rating="9.1" 
                genre="Adventure/Devotional/Drama" 
                duration="2h 45m" 
                emoji="🕉️" 
                poster="poster-1" 
                image="Krishnavataram_Part_1_The_Heart.jpg"
                :formats="['2D', '3D']" 
            />
            <x-movie.movie-card 
                title="Aakhri" 
                full_title="Aakhri Sawal"
                rating="9.3" 
                genre="Drama" 
                duration="2h 15m" 
                emoji="⚖️" 
                poster="poster-3" 
                image="akhiri_sawaal.jpg"
                :formats="['2D']" 
            />
            <x-movie.movie-card 
                title="Michael" 
                full_title="Michael"
                rating="8.5" 
                genre="Action/Thriller" 
                duration="2h 30m" 
                emoji="🕶️" 
                poster="poster-2" 
                image="michael.jpg"
                :formats="['2D', 'IMAX']" 
            />
            <x-movie.movie-card 
                title="Project" 
                full_title="Project Hail Mary"
                rating="9.0" 
                genre="Sci-Fi/Adventure" 
                duration="2h 20m" 
                emoji="🚀" 
                poster="poster-4" 
                image="project_hail_marry.jpg"
                :formats="['2D', 'IMAX 3D']" 
            />
            <x-movie.movie-card 
                title="Pati" 
                full_title="Pati Patni Aur Woh Do"
                rating="8.9" 
                genre="Comedy/Romantic" 
                duration="2h 10m" 
                emoji="👩‍❤️‍👨" 
                poster="poster-1" 
                image="pati_patni_aur_wo_do.jpg"
                :formats="['2D']" 
            />
        </div>
    </section>
</x-layouts.app>