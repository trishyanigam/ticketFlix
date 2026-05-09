<x-layouts.app title="Blaze of Glory — TicketFlix">
    <div class="movie-detail-hero">
        <div class="movie-detail-bg poster-1">🔥</div>
        <div class="movie-detail-gradient"></div>
        <div class="movie-detail-content">
            <div class="movie-detail-poster">🔥</div>
            <div class="movie-detail-info">
                <div class="breadcrumb">
                    <span onclick="window.location.href='{{ route('home') }}'">Home</span>
                    <span class="breadcrumb-sep">/</span>
                    <span onclick="window.location.href='{{ route('movies.index') }}'">Movies</span>
                    <span class="breadcrumb-sep">/</span>
                    <span class="breadcrumb-current">Blaze of Glory</span>
                </div>
                <h1 class="movie-detail-title">BLAZE OF GLORY</h1>
                <div class="movie-meta-row">
                    <div class="movie-rating-big">
                        <div class="rating-circle">8.4</div>
                        <div>
                            <div class="stars">★★★★☆</div>
                            <div class="text-muted" style="font-size: 11px;">1.2k Ratings</div>
                        </div>
                    </div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">Hindi, English</div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">IMAX 2D</div>
                </div>
                <p class="movie-desc">A fearless warrior rises against a corrupt empire in this visually stunning action spectacle packed with emotion, war and survival. Experience the journey of a hero who becomes a legend.</p>
                <div class="movie-actions">
                    <button class="btn btn-primary btn-lg" onclick="window.location.href='#showtimes'">Book Tickets</button>
                    <button class="btn btn-ghost btn-lg">▶ Watch Trailer</button>
                </div>
            </div>
        </div>
    </div>

    <section class="container" id="showtimes">
        <div class="section-header">
            <div class="section-title">Select <span>Showtimes</span></div>
            <div class="pill-tabs">
                <button class="pill-tab active">Today, 24 May</button>
                <button class="pill-tab">Tomorrow, 25 May</button>
                <button class="pill-tab">Sun, 26 May</button>
            </div>
        </div>

        <div class="theatre-row">
            <div class="theatre-info-col">
                <div class="theatre-name">PVR: ICON, Phoenix Palladium</div>
                <div class="theatre-info">📍 Lower Parel | 💳 M-Ticket | 🍔 Food & Bev</div>
            </div>
            <div class="show-times">
                <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}'">10:30 AM</div>
                <div class="show-time-chip fast-filling" onclick="window.location.href='{{ route('movies.seats') }}'">01:45 PM</div>
                <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}'">05:15 PM</div>
                <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}'">09:00 PM</div>
            </div>
        </div>

        <div class="theatre-row">
            <div class="theatre-info-col">
                <div class="theatre-name">Inox: Insignia, Atria Mall</div>
                <div class="theatre-info">📍 Worli | 💳 M-Ticket | 🍹 Lux Lounge</div>
            </div>
            <div class="show-times">
                <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}'">11:00 AM</div>
                <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}'">02:30 PM</div>
                <div class="show-time-chip fast-filling" onclick="window.location.href='{{ route('movies.seats') }}'">06:00 PM</div>
                <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}'">10:45 PM</div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="section-header">
            <div class="section-title">Cast & <span>Crew</span></div>
        </div>
        <div class="cast-scroll">
            <div class="cast-card">
                <div class="cast-avatar">👤</div>
                <div class="cast-name">John Doe</div>
                <div class="cast-role">Actor</div>
            </div>
            <div class="cast-card">
                <div class="cast-avatar">👤</div>
                <div class="cast-name">Jane Smith</div>
                <div class="cast-role">Actress</div>
            </div>
            <div class="cast-card">
                <div class="cast-avatar">👤</div>
                <div class="cast-name">Mike Ross</div>
                <div class="cast-role">Director</div>
            </div>
        </div>
    </section>
</x-layouts.app>