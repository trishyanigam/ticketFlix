<x-layouts.app title="Checkout">

    <section class="payment-section">

        <div class="container">

            <div class="payment-wrapper">

                <div class="payment-left">

                    <h1 class="page-title">

                        CHECKOUT

                    </h1>

                    <div class="payment-card">

                        <x-payment.payment-form />

                    </div>

                </div>

                <div class="payment-right">

                    <x-payment.payment-summary
                        movie="Blaze of Glory"
                        seats="A1, A2"
                        date="12 May 2026"
                        total="640"
                    />

                </div>

            </div>

        </div>

    </section>

</x-layouts.app>