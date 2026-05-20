@php
    $title = request()->query('title', 'Dhurandhar 2');
    $rating = request()->query('rating', '8.8');
    $image = request()->query('image', '');
    $poster = request()->query('poster', 'poster-6');
    $emoji = request()->query('emoji', '🗡️');
    $genre = request()->query('genre', 'Action/Thriller');
    $duration = request()->query('duration', '2h 37m');
    $formats = request()->query('formats', 'IMAX 2D, 2D');
    $languages = request()->query('languages', 'Hindi');
    
    $queryString = request()->getQueryString();
    $querySuffix = $queryString ? '?' . $queryString : '';
    
    $movieCastCrew = [
        'Dhurandhar' => [
            'cast' => ['Ranveer Singh', 'Kiara Advani', 'Vicky Kaushal', 'Nawazuddin Siddiqui'],
            'director' => 'Ayan Verma',
            'music' => 'Anirudh R.'
        ],
        'Krishna' => [
            'cast' => ['Prabhas', 'Deepika Padukone', 'Amitabh Bachchan', 'Kamal Haasan'],
            'director' => 'Nag Ashwin',
            'music' => 'Santhosh N.'
        ],
        'Aakhri' => [
            'cast' => ['Ajay Devgn', 'Tabu', 'Akshaye Khanna', 'Shriya Saran'],
            'director' => 'Abhishek Pathak',
            'music' => 'Devi Sri Prasad'
        ],
        'Michael' => [
            'cast' => ['Sundeep Kishan', 'Vijay Sethupathi', 'Divyansha K.', 'Gautham Menon'],
            'director' => 'Ranjit Jeyakodi',
            'music' => 'Sam C.S.'
        ],
        'Project' => [
            'cast' => ['Ryan Gosling', 'Sandra Hüller', 'Milana Vayntrub', 'Thomas Kail'],
            'director' => 'Phil Lord & Chris Miller',
            'music' => 'Harry Gregson-W.'
        ],
        'Pati' => [
            'cast' => ['Kartik Aaryan', 'Bhumi Pednekar', 'Ananya Panday', 'Aparshakti K.'],
            'director' => 'Mudassar Aziz',
            'music' => 'Tanishk Bagchi'
        ],
        'Top' => [
            'cast' => ['Salman Khan', 'Katrina Kaif', 'Emraan Hashmi', 'Kumud Mishra'],
            'director' => 'Maneesh Sharma',
            'music' => 'Pritam'
        ],
        'Bhooth' => [
            'cast' => ['Akshay Kumar', 'Asrani', 'Paresh Rawal', 'Rajpal Yadav'],
            'director' => 'Priyadarshan',
            'music' => 'Sajid-Wajid'
        ],
        'Chardikala' => [
            'cast' => ['Diljit Dosanjh', 'Neeru Bajwa', 'Jaswinder Bhalla', 'Gurpreet Ghuggi'],
            'director' => 'Jagdeep Sidhu',
            'music' => 'B Praak'
        ],
        'Raja' => [
            'cast' => ['Riteish Deshmukh', 'Genelia D\'Souza', 'Sharad Kelkar', 'Jisshu Sengupta'],
            'director' => 'Riteish Deshmukh',
            'music' => 'Ajay-Atul'
        ],
        'Blaze' => [
            'cast' => ['Chris Hemsworth', 'Anya Taylor-Joy', 'Tom Burke', 'Lachy Hulme'],
            'director' => 'George Miller',
            'music' => 'Tom Holkenborg'
        ],
        'Void' => [
            'cast' => ['Aaron Taylor-Johnson', 'Ariana DeBose', 'Russell Crowe', 'Fred Hechinger'],
            'director' => 'J.C. Chandor',
            'music' => 'Benjamin Wallfisch'
        ]
    ];

    $currentCastCrew = [
        'cast' => ['Ranveer Singh', 'Kiara Advani', 'Vicky Kaushal', 'Nawazuddin Siddiqui'],
        'director' => 'Ayan Verma',
        'music' => 'Anirudh R.'
    ];
    
    $lowerTitle = strtolower($title);
    foreach ($movieCastCrew as $key => $data) {
        if (str_contains($lowerTitle, strtolower($key))) {
            $currentCastCrew = $data;
            break;
        }
    }
@endphp
<x-layouts.app title="{{ $title }} — TicketFlix">
    <div class="movie-detail-hero">
        <div class="movie-detail-bg {{ $image ? '' : $poster }}" style="{{ $image ? "background-image: url('".asset('assets/images/movies/'.$image)."');" : '' }}">
            {{ $image ? '' : $emoji }}
        </div>
        <div class="movie-detail-gradient"></div>
        <div class="movie-detail-content">
            <div class="movie-detail-poster {{ $image ? '' : $poster }}" style="display: flex; align-items: center; justify-content: center; font-size: 80px; {{ $image ? "background-image: url('".asset('assets/images/movies/'.$image)."'); background-size: cover; background-position: center;" : '' }}">
                {{ $image ? '' : $emoji }}
            </div>
            <div class="movie-detail-info">
                <div class="breadcrumb">
                    <span onclick="window.location.href='{{ route('home') }}'">Home</span>
                    <span class="breadcrumb-sep">/</span>
                    <span onclick="window.location.href='{{ route('movies.index') }}'">Movies</span>
                    <span class="breadcrumb-sep">/</span>
                    <span class="breadcrumb-current">{{ $title }}</span>
                </div>
                <h1 class="movie-detail-title">{{ strtoupper($title) }}</h1>
                <div class="movie-meta-row">
                    <div class="movie-rating-big">
                        <div class="rating-circle">{{ $rating }}</div>
                        <div>
                            <div class="stars" style="color: var(--gold);">★★★★★</div>
                            <div class="text-muted" style="font-size: 11px;">48.5K Votes</div>
                        </div>
                    </div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">{{ $languages }}</div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">{{ $formats }}</div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">{{ $duration }}</div>
                    <div class="meta-dot">·</div>
                    <div class="badge badge-muted">{{ $genre }}</div>
                </div>
                <p class="movie-desc">Experience the cinematic brilliance of {{ $title }}, featuring stunning visuals and a captivating storyline that will keep you on the edge of your seat.</p>
                <div class="movie-actions">
                    <button class="btn btn-primary btn-lg" onclick="window.location.href='#showtimes'">Book Tickets</button>
                    <button class="btn btn-ghost btn-lg" style="margin-right: 12px;">▶ Watch Trailer</button>
                    @php
                        $isWishlisted = false;
                        if(auth()->check()) {
                            $isWishlisted = \App\Models\Wishlist::where('user_id', auth()->id())->where('type', 'movie')->where('title', $title)->exists();
                        }
                    @endphp
                    <button class="btn btn-ghost btn-lg wishlist-btn" 
                            data-wishlist-title="{{ $title }}"
                            onclick="toggleWishlistAjax(event, 'movie', '{{ $title }}', { rating: '{{ $rating }}', genre: '{{ $genre }}', duration: '{{ $duration }}', emoji: '{{ $emoji }}', poster: '{{ $poster }}', image: '{{ $image }}', formats: '{{ $formats }}', languages: '{{ $languages }}' })"
                            style="display: inline-flex; align-items: center; gap: 8px; border-color: rgba(255,255,255,0.15); height: 50px; padding: 0 24px; border-radius: 12px; font-weight: 700; cursor: pointer; transition: all 0.3s ease; background: transparent; color: var(--white);">
                        <span class="heart-icon">{{ $isWishlisted ? '❤️' : '🤍' }}</span>
                        <span>Wishlist</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section class="container" id="showtimes" style="padding-top: 80px; padding-bottom: 80px;">
        <div class="section-header" style="align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
            <div class="section-title" style="margin-bottom: 0;">Select <span>Showtimes</span></div>
            @php
                $today = new \DateTime();
                $selectedDateStr = request()->query('booking_date', $today->format('Y-m-d'));
            @endphp
            <div class="date-scroll-container" style="display: flex; gap: 10px; overflow-x: auto; padding: 4px 0; -webkit-overflow-scrolling: touch; scrollbar-width: none; border-radius: 12px;">
                @for ($i = 0; $i < 7; $i++)
                    @php
                        $current = clone $today;
                        $current->modify("+$i day");
                        $dayStr = $current->format('Y-m-d');
                        $dayOfWeek = strtoupper($current->format('D'));
                        $dayOfMonth = $current->format('d');
                        $monthName = strtoupper($current->format('M'));
                        $isSelected = ($dayStr === $selectedDateStr);
                    @endphp
                    @if ($i < 4)
                        <div class="date-chip {{ $isSelected ? 'active' : '' }}" 
                             onclick="selectShowDate('{{ $dayStr }}')"
                             style="flex: 0 0 auto; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 10px 16px; border-radius: 14px; cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); min-width: 68px; text-align: center;
                                    {{ $isSelected ? 'background: #ef4f5f; color: #ffffff; box-shadow: 0 8px 20px rgba(239, 79, 95, 0.35); border: 1px solid #ef4f5f;' : 'background: rgba(255,255,255,0.03); color: var(--white); border: 1px solid var(--border);' }}">
                            <span style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px; opacity: 0.8; text-transform: uppercase; color: {{ $isSelected ? '#ffffff' : 'var(--muted)' }};">{{ $dayOfWeek }}</span>
                            <span style="font-size: 20px; font-weight: 800; margin: 2px 0; display: block; color: #ffffff;">{{ $dayOfMonth }}</span>
                            <span style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px; opacity: 0.8; text-transform: uppercase; color: {{ $isSelected ? '#ffffff' : 'var(--muted)' }};">{{ $monthName }}</span>
                        </div>
                    @else
                        <div class="date-chip crossed-out" 
                             style="flex: 0 0 auto; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 10px 16px; border-radius: 14px; min-width: 68px; text-align: center; position: relative;
                                    background: rgba(255,255,255,0.01); border: 1px dashed rgba(255,255,255,0.05); cursor: not-allowed; overflow: hidden; opacity: 0.35;">
                            <!-- Gorgeous Diagonal Cross Line -->
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, transparent 48%, rgba(239, 79, 95, 0.6) 49%, rgba(239, 79, 95, 0.6) 51%, transparent 52%); pointer-events: none;"></div>
                            
                            <span style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; color: var(--muted);">{{ $dayOfWeek }}</span>
                            <span style="font-size: 20px; font-weight: 800; margin: 2px 0; display: block; color: var(--muted); text-decoration: line-through;">{{ $dayOfMonth }}</span>
                            <span style="font-size: 9px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; color: var(--muted);">{{ $monthName }}</span>
                        </div>
                    @endif
                @endfor
            </div>
        </div>

        <div class="theatre-row">
            <div class="theatre-info-col">
                <div class="theatre-name">PVR Phoenix Mall</div>
                <div class="theatre-info">📍 Lower Parel | 💳 M-Ticket | 🍔 Food & Bev</div>
            </div>
            <div class="show-times">
                @foreach(['10:00 AM', '01:30 PM', '05:00 PM', '09:15 PM'] as $time)
                    <div class="show-time-chip {{ $time == '01:30 PM' ? 'fast-filling' : '' }}" onclick="window.location.href='{{ route('movies.seats') }}{{ $querySuffix }}'">{{ $time }}</div>
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
                    <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}{{ $querySuffix }}'">{{ $time }}</div>
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
                    <div class="show-time-chip" onclick="window.location.href='{{ route('movies.seats') }}{{ $querySuffix }}'">{{ $time }}</div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="container" style="padding-bottom: 80px;">
        <div class="section-header">
            <div class="section-title">Cast & <span>Crew</span></div>
        </div>
        <div class="cast-scroll">
            @foreach($currentCastCrew['cast'] as $name)
            <div class="cast-card">
                <div class="cast-avatar">👤</div>
                <div class="cast-name">{{ $name }}</div>
                <div class="cast-role">Actor</div>
            </div>
            @endforeach
            <div class="cast-card">
                <div class="cast-avatar">🎬</div>
                <div class="cast-name">{{ $currentCastCrew['director'] }}</div>
                <div class="cast-role">Director</div>
            </div>
            <div class="cast-card">
                <div class="cast-avatar">🎵</div>
                <div class="cast-name">{{ $currentCastCrew['music'] }}</div>
                <div class="cast-role">Music</div>
            </div>
        </div>
    </section>

    <script>
        window.selectShowDate = function(dateStr) {
            const url = new URL(window.location.href);
            url.searchParams.set('booking_date', dateStr);
            window.location.href = url.toString();
        };
    </script>
</x-layouts.app>