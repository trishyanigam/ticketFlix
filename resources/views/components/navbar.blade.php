<nav>
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; width: 100%; height: 100%; padding: 0 60px;">
        <div style="display: flex; align-items: center; gap: 32px;">
            <a href="{{ route('home') }}" class="nav-logo">TICKET<span>FLIX</span></a>
            <div class="nav-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('movies.index') }}" class="{{ request()->routeIs('movies.*') ? 'active' : '' }}">Movies</a>
                <a href="{{ route('events.index') }}" class="{{ request()->routeIs('events.*') ? 'active' : '' }}">Events</a>
                @if(auth()->check() && auth()->user()->email === 'admin@ticketflix.com')
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">Admin</a>
                @endif
            </div>
        </div>
        <div class="nav-right">
            <div class="nav-city-dropdown-wrapper" style="position: relative; display: inline-block;">
                <div class="nav-city" id="current-city-btn" style="cursor: pointer; display: flex; align-items: center; gap: 6px;">
                    <span style="color: var(--red);">📍</span> <span id="current-city-text">Mumbai</span> <span style="font-size: 10px; color: var(--muted2);">▼</span>
                </div>
                <div class="nav-city-dropdown" id="city-dropdown-menu" style="display: none; position: absolute; top: 100%; right: 0; background: #18181c; border: 1px solid var(--border); border-radius: 12px; padding: 12px; width: 240px; z-index: 1000; box-shadow: 0 10px 40px rgba(0,0,0,0.5); margin-top: 12px;">
                    
                    <!-- Search Input for Other Cities -->
                    <div style="margin-bottom: 12px; display: flex; gap: 8px;">
                        <input type="text" id="custom-city-input" placeholder="Type other city..." style="flex: 1; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; padding: 8px 12px; color: var(--white); font-size: 13px; outline: none; border-color: rgba(255,255,255,0.1);">
                        <button onclick="addCustomCity()" style="background: var(--red); border: none; border-radius: 8px; padding: 8px 12px; color: var(--white); font-size: 12px; font-weight: 700; cursor: pointer;">Go</button>
                    </div>

                    <div style="font-size: 11px; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; padding: 4px 8px; margin-bottom: 4px;">Popular Cities</div>
                    <div class="city-option" onclick="selectCity('Mumbai')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; color: var(--white); font-size: 14px; transition: background 0.2s;">Mumbai</div>
                    <div class="city-option" onclick="selectCity('Delhi-NCR')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; color: var(--white); font-size: 14px; transition: background 0.2s;">Delhi-NCR</div>
                    <div class="city-option" onclick="selectCity('Bengaluru')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; color: var(--white); font-size: 14px; transition: background 0.2s;">Bengaluru</div>
                    <div class="city-option" onclick="selectCity('Hyderabad')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; color: var(--white); font-size: 14px; transition: background 0.2s;">Hyderabad</div>
                    <div class="city-option" onclick="selectCity('Pune')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; color: var(--white); font-size: 14px; transition: background 0.2s;">Pune</div>
                    <div class="city-option" onclick="selectCity('Chandigarh')" style="padding: 10px 12px; border-radius: 8px; cursor: pointer; color: var(--white); font-size: 14px; transition: background 0.2s;">Chandigarh</div>
                </div>
            </div>
            
            <style>
                .city-option:hover { background: rgba(255,255,255,0.05); color: var(--red) !important; }
            </style>
            
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const cityBtn = document.getElementById('current-city-btn');
                    const cityMenu = document.getElementById('city-dropdown-menu');
                    const cityText = document.getElementById('current-city-text');
                    
                    // Load saved city
                    const savedCity = localStorage.getItem('ticketflix_city') || 'Mumbai';
                    cityText.textContent = savedCity;
                    
                    // Update search bar text on homepage if it exists
                    const searchBarCity = document.getElementById('search-bar-city-text');
                    if (searchBarCity) {
                        searchBarCity.textContent = savedCity;
                    }
                    
                    cityBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        cityMenu.style.display = cityMenu.style.display === 'none' ? 'block' : 'none';
                    });
                    
                    document.addEventListener('click', () => {
                        cityMenu.style.display = 'none';
                    });
                    
                    // Prevent closing dropdown when clicking inside input or Go button
                    cityMenu.addEventListener('click', (e) => {
                        e.stopPropagation();
                    });

                    window.selectCity = function(city) {
                        localStorage.setItem('ticketflix_city', city);
                        cityText.textContent = city;
                        cityMenu.style.display = 'none';
                        window.location.reload(); // Quick refresh to apply city branding
                    };

                    window.addCustomCity = function() {
                        const input = document.getElementById('custom-city-input');
                        const val = input.value.trim();
                        if (val) {
                            selectCity(val);
                        }
                    };
                });
            </script>
            @auth
                <a href="{{ route('profile.dashboard') }}" class="nav-city" style="text-decoration: none; display: flex; align-items: center; gap: 8px;">
                    <span style="color: #9f7aea;">👤</span> {{ Auth::user()->name }}
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-ghost" style="padding: 8px 16px; font-size: 13px; color: var(--muted);">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary" style="padding: 8px 20px; border-radius: 6px;">Sign In</a>
            @endauth
        </div>
    </div>
</nav>