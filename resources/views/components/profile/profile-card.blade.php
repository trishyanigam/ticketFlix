@props([
    'name',
    'role',
    'bookings',
    'wishlist',
    'rewards'
])

<div class="profile-card">

    <div class="profile-avatar">

        👤

    </div>

    <h2>

        {{ $name }}

    </h2>

    <p>

        {{ $role }}

    </p>

    <div class="profile-stats">

        <div>

            <h3>

                {{ $bookings }}

            </h3>

            <span>

                Bookings

            </span>

        </div>

        <div>

            <h3>

                {{ $wishlist }}

            </h3>

            <span>

                Wishlist

            </span>

        </div>

        <div>

            <h3>

                {{ $rewards }}

            </h3>

            <span>

                Rewards

            </span>

        </div>

    </div>

</div>