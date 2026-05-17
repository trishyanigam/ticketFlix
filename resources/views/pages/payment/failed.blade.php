<x-layouts.app title="Payment Failed — TicketFlix">
    <div class="confirm-wrapper" style="text-align: center; max-width: 500px; margin: 80px auto; padding: 40px; background: rgba(255,0,0,0.02); border: 1px solid rgba(255,0,0,0.1); border-radius: 24px;">
        <div style="width: 80px; height: 80px; background: rgba(255,59,48,0.1); color: var(--red); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 40px; margin: 0 auto 24px;">✕</div>
        <h1 style="font-size: 32px; font-weight: 700; letter-spacing: 1px; color: var(--red); margin-bottom: 16px;">PAYMENT FAILED</h1>
        <p style="color: var(--muted); line-height: 1.6; font-size: 15px; margin-bottom: 32px;">
            We couldn't process your payment. Don't worry, no money has been deducted from your account. Please check your internet connection or use a different payment method.
        </p>

        <div style="display: flex; flex-direction: column; gap: 16px;">
            <button class="btn btn-primary btn-lg" style="padding: 16px; border-radius: 12px; font-size: 16px;" onclick="window.location.href='{{ route('movies.seats') }}'">Try Again</button>
            <button class="btn btn-ghost" style="padding: 14px; border-radius: 12px;" onclick="window.location.href='{{ route('home') }}'">Return to Home</button>
        </div>
    </div>
</x-layouts.app>
