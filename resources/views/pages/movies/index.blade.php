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
                <select id="filter-format" class="filter-select" style="background: #18181c; border-color: var(--border2); padding: 8px 16px; font-size: 12px; border-radius: 8px; color: var(--white); outline: none;">
                    <option value="all">All Formats</option>
                    <option value="2d">2D</option>
                    <option value="3d">3D</option>
                    <option value="imax">IMAX</option>
                    <option value="4dx">4DX</option>
                </select>
                <select id="filter-genre" class="filter-select" style="background: #18181c; border-color: var(--border2); padding: 8px 16px; font-size: 12px; border-radius: 8px; color: var(--white); outline: none;">
                    <option value="all">All Genres</option>
                    <option value="action">Action</option>
                    <option value="thriller">Thriller</option>
                    <option value="sci-fi">Sci-Fi</option>
                    <option value="adventure">Adventure</option>
                    <option value="devotional">Devotional</option>
                    <option value="drama">Drama</option>
                    <option value="comedy">Comedy</option>
                    <option value="romantic">Romantic</option>
                    <option value="horror">Horror</option>
                    <option value="historical">Historical</option>
                </select>
                <select id="filter-language" class="filter-select" style="background: #18181c; border-color: var(--border2); padding: 8px 16px; font-size: 12px; border-radius: 8px; color: var(--white); outline: none;">
                    <option value="all">All Languages</option>
                    <option value="hindi">Hindi</option>
                    <option value="english">English</option>
                    <option value="punjabi">Punjabi</option>
                    <option value="marathi">Marathi</option>
                    <option value="tamil">Tamil</option>
                    <option value="telugu">Telugu</option>
                </select>
                <select id="filter-day" class="filter-select" style="background: #18181c; border-color: var(--border2); padding: 8px 16px; font-size: 12px; border-radius: 8px; color: var(--white); outline: none;">
                    <option value="all">All Days</option>
                    <option value="today">Today</option>
                    <option value="tomorrow">Tomorrow</option>
                </select>
            </div>
            <div style="display: flex; gap: 8px;">
                <button class="pill-tab filter-tab active" data-tab="all" style="padding: 6px 16px; border-radius: 100px; cursor: pointer; transition: all 0.2s ease;">All</button>
                <button class="pill-tab filter-tab" data-tab="top" style="padding: 6px 16px; border-radius: 100px; display: flex; align-items: center; gap: 6px; border-color: var(--border); cursor: pointer; transition: all 0.2s ease;"><span>⭐</span> Top Rated</button>
                <button class="pill-tab filter-tab" data-tab="new" style="padding: 6px 16px; border-radius: 100px; display: flex; align-items: center; gap: 6px; border-color: var(--border); cursor: pointer; transition: all 0.2s ease;"><span>🔥</span> New</button>
                <button class="pill-tab filter-tab" data-tab="premiere" style="padding: 6px 16px; border-radius: 100px; display: flex; align-items: center; gap: 6px; border-color: var(--border); cursor: pointer; transition: all 0.2s ease;"><span>🎬</span> Premieres</button>
            </div>
        </div>
    </div>

    <section class="container" style="padding-top: 60px; padding-bottom: 60px;">
        <div class="movies-grid-4" style="grid-template-columns: repeat(4, 1fr); gap: 32px;">
            <x-movie.movie-card 
                title="Dhurandhar" full_title="Dhurandhar 2" rating="8.8" genre="Action/Thriller" duration="2h 37m" emoji="🗡️" poster="poster-6" 
                image="dhurandhar2.jpg"
                :formats="['IMAX', '2D']" 
                :languages="['Hindi']"
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
                :languages="['English', 'Hindi', 'Tamil', 'Telugu']"
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
                :languages="['Hindi']"
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
                :languages="['Hindi', 'English']"
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
                :languages="['English', 'Hindi', 'Tamil', 'Telugu']"
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
                :languages="['Hindi']"
            />
            <x-movie.movie-card 
                title="Top" 
                full_title="Top Cop"
                rating="8.6" 
                genre="Action/Thriller" 
                duration="2h 25m" 
                emoji="👮" 
                poster="poster-5" 
                image="top_cop.jpg"
                :formats="['2D']" 
                :languages="['Hindi', 'Punjabi']"
            />
            <x-movie.movie-card 
                title="Bhooth" 
                full_title="Bhooth Bangla"
                rating="7.5" 
                genre="Comedy/Horror/Thriller" 
                duration="2h 45m" 
                emoji="🐈‍⬛" 
                poster="poster-6" 
                image="bhooth_bangla.jpg"
                :formats="['2D']" 
                :languages="['Hindi']"
            />
            <x-movie.movie-card 
                title="Chardikala" 
                full_title="Chardikala"
                rating="8.2" 
                genre="Drama" 
                duration="2h 15m" 
                emoji="🌾" 
                poster="poster-2" 
                image="chardikala.jpg"
                :formats="['2D']" 
                :languages="['Hindi', 'Punjabi']"
            />
            <x-movie.movie-card 
                title="Raja" 
                full_title="Raja Shivaji"
                rating="8.9" 
                genre="Action/Drama/Historical" 
                duration="3h 7m" 
                emoji="👑" 
                poster="poster-4" 
                image="raja_shivaji.jpg"
                :formats="['2D', '4DX']" 
                :languages="['Marathi', 'Hindi']"
            />
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const formatSelect = document.getElementById('filter-format');
        const genreSelect = document.getElementById('filter-genre');
        const languageSelect = document.getElementById('filter-language');
        const daySelect = document.getElementById('filter-day');
        const tabButtons = document.querySelectorAll('.filter-tab');
        const movieCards = document.querySelectorAll('.movie-card');

        let activeTab = 'all';

        // Tab buttons event listeners
        tabButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                tabButtons.forEach(b => {
                    b.classList.remove('active');
                    b.style.background = 'transparent';
                    b.style.borderColor = 'var(--border)';
                    b.style.color = 'var(--muted)';
                });
                
                btn.classList.add('active');
                btn.style.background = 'var(--primary)';
                btn.style.borderColor = 'var(--primary)';
                btn.style.color = 'var(--white)';
                
                activeTab = btn.getAttribute('data-tab');
                filterMovies();
            });
        });

        // Select dropdowns event listeners
        [formatSelect, genreSelect, languageSelect, daySelect].forEach(select => {
            select.addEventListener('change', filterMovies);
        });

        function filterMovies() {
            const formatVal = formatSelect.value.toLowerCase();
            const genreVal = genreSelect.value.toLowerCase();
            const languageVal = languageSelect.value.toLowerCase();
            
            movieCards.forEach(card => {
                const cardFormats = card.getAttribute('data-formats').toLowerCase();
                const cardGenres = card.getAttribute('data-genres').toLowerCase();
                const cardLanguages = card.getAttribute('data-languages').toLowerCase();
                const cardRating = parseFloat(card.getAttribute('data-rating') || '0');
                const isNew = card.getAttribute('data-new') === 'true';
                const isPremiere = card.getAttribute('data-premiere') === 'true';

                // Match format
                const matchesFormat = (formatVal === 'all' || cardFormats.includes(formatVal));
                
                // Match genre
                const matchesGenre = (genreVal === 'all' || cardGenres.includes(genreVal));

                // Match language
                const matchesLanguage = (languageVal === 'all' || cardLanguages.includes(languageVal));

                // Match active tab (All, Top Rated, New, Premieres)
                let matchesTab = true;
                if (activeTab === 'top') {
                    matchesTab = (cardRating >= 8.5);
                } else if (activeTab === 'new') {
                    matchesTab = isNew;
                } else if (activeTab === 'premiere') {
                    matchesTab = isPremiere;
                }

                // Combine all filter checks
                if (matchesFormat && matchesGenre && matchesLanguage && matchesTab) {
                    card.style.display = 'block';
                    // Force a reflow for transition
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    card.style.display = 'none';
                }
            });
        }

        // Initialize active tab styling
        const activeBtn = document.querySelector('.filter-tab.active');
        if (activeBtn) {
            activeBtn.style.background = 'var(--primary)';
            activeBtn.style.borderColor = 'var(--primary)';
            activeBtn.style.color = 'var(--white)';
        }

        // Initial run
        filterMovies();
    });
    </script>
</x-layouts.app>