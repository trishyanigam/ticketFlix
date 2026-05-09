<div class="seat-layout">

    @for ($row = 1; $row <= 5; $row++)

        <div class="seat-row">

            @for ($seat = 1; $seat <= 10; $seat++)

                <button class="seat">

                    {{ $row }}{{ chr(64 + $seat) }}

                </button>

            @endfor

        </div>

    @endfor

</div>