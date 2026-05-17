<x-layouts.app title="Dhurandhar 2 — TicketFlix">
    <div class="movie-detail-hero">
        <div class="movie-detail-bg poster-6">🗡️</div>
        <div class="movie-detail-gradient"></div>
        <div class="movie-detail-content">
            <div class="movie-detail-poster poster-6" style="display: flex; align-items: center; justify-content: center; font-size: 80px;">🗡️</div>
            <div class="movie-detail-info">
                <div class="breadcrumb">
                    <span onclick="window.location.href='{{ route('home') }}'">Home</span>
                    <span class="breadcrumb-sep">/</span>
                    <span onclick="window.location.href='{{ route('movies.index') }}'">Movies</span>
                    <span class="breadcrumb-sep">/</span>
                    <span class="breadcrumb-current">Dhurandhar 2</span>
                </div>
                <h1 class="movie-detail-title">DHURANDHAR 2</h1>
                <div class="movie-meta-row">
                    <div class="movie-rating-big">
                        <div class="rating-circle">8.8</div>
                        <div>
                            <div class="stars" style="color: var(--gold);">★★★★★</div>
                            <div class="text-muted" style="font-size: 11px;">48.5K Votes</div>
                        </div>
                    </div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">Hindi</div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">IMAX 2D, 2D</div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">2h 37m</div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">UA</div>
                </div>
                <p class="movie-desc">After the fall of a powerful crime syndicate, a fearless undercover officer returns to stop a deadly national conspiracy threatening millions. As enemies rise from the shadows, the battle becomes personal.</p>
                <div class="movie-actions">
                    <button class="btn btn-primary btn-lg" onclick="window.location.href='#showtimes'">Book Tickets</button>
                    <button class="btn btn-ghost btn-lg">▶ Watch Trailer</button>
                </div>
            </div>
        </div>
    </div>

    <section class="container" id="showtimes" style="padding-top: 80px; padding-bottom: 80px;">
        <div class="section-header">
            <div class="section-title">Select <span>Showtimes</span></div>
            <div class="pill-tabs">
                <button class="pill-tab active">Fri, 15 May</button>
                <button class="pill-tab">Sat, 16 May</button>
                <button class="pill-tab">Sun, 17 May</button>
            </div>
        </div>

        <div class="theatre-row">
            <div class="theatre-info-col">
                <div class="theatre-name">PVR Phoenix Mall</div>
                <div class="theatre-info">📍 Lower Parel | 💳 M-Ticket | 🍔 Food & Bev</div>
            </div>
            <div class="show-times">
                @foreach(['10:00 AM', '01:30 PM', '05:00 PM', '09:15 PM'] as $time)
                    <div class="show-time-chip {{ $time == '01:30 PM' ? 'fast-filling' : '' }}" onclick="window.location.href='{{ route('movies.seats') }}'">{{ $time }}</div>
                @endforeach
            </div>
        </div>

        <div class="theatre-row">
            <div class="theatre-info-col">
                <div class="theatre-name">INOX City Center</div>
                <div class="theatre-info">📍 Worli | 💳 M-Ticket | 🍹 Lux Lounge</div>
            </div>
            <div class="show-times">
                @foreach(['10:30 AM', '02:00 PM', '06:15 PM', '10:30 PM'] as $time)
                    <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}'">{{ $time }}</div>
                @endforeach
            </div>
        </div>

        <div class="theatre-row">
            <div class="theatre-info-col">
                <div class="theatre-name">Cinepolis Grand</div>
                <div class="theatre-info">📍 Andheri | 💳 M-Ticket | 🍔 Snacks</div>
            </div>
            <div class="show-times">
                @foreach(['11:15 AM', '03:45 PM', '07:30 PM', '11:00 PM'] as $time)
                    <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}'">{{ $time }}</div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="container" style="padding-bottom: 80px;">
        <div class="section-header">
            <div class="section-title">Cast & <span>Crew</span></div>
        </div>
        <div class="cast-scroll">
            @foreach(['Ranveer Singh', 'Kiara Advani', 'Vicky Kaushal', 'Nawazuddin Siddiqui'] as $name)
            <div class="cast-card">
                <div class="cast-avatar">👤</div>
                <div class="cast-name">{{ $name }}</div>
                <div class="cast-role">Actor</div>
            </div>
            @endforeach
            <div class="cast-card">
                <div class="cast-avatar">🎬</div>
                <div class="cast-name">Ayan Verma</div>
                <div class="cast-role">Director</div>
            </div>
            <div class="cast-card">
                <div class="cast-avatar">🎵</div>
                <div class="cast-name">Anirudh R.</div>
                <div class="cast-role">Music</div>
            </div>
        </div>
    </section>
</x-layouts.app>