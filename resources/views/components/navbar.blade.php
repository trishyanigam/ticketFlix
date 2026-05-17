<nav>
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; width: 100%; height: 100%; padding: 0 60px;">
        <div style="display: flex; align-items: center; gap: 32px;">
            <a href="{{ route('home') }}" class="nav-logo">TICKET<span>FLIX</span></a>
            <div class="nav-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('movies.index') }}" class="{{ request()->routeIs('movies.*') ? 'active' : '' }}">Movies</a>
                <a href="{{ route('events.index') }}" class="{{ request()->routeIs('events.*') ? 'active' : '' }}">Events</a>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">Admin</a>
            </div>
        </div>
        <div class="nav-right">
            <div class="nav-city">📍 Mumbai ▾</div>
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