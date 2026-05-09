@props([
    'title',
    'location',
    'date',
    'price'
])

<div class="event-ticket">

    <div class="ticket-left">

        <h2>

            {{ $title }}

        </h2>

        <p>

            📍 {{ $location }}

        </p>

        <p>

            📅 {{ $date }}

        </p>

    </div>

    <div class="ticket-right">

        <div class="ticket-price">

            ₹ {{ $price }}

        </div>

        <button class="btn btn-primary">

            Buy Ticket

        </button>

    </div>

</div>