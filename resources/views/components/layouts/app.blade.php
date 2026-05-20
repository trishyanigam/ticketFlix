<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'TicketFlix — Book Movies & Events' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ticketflix.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar />
    <x-navbar-mobile />

    <main>
        {{ $slot }}
    </main>

    <x-toast />
    <x-footer />

    <script>
        function showGlobalToast(message, isSuccess = true) {
            const toast = document.getElementById('toast');
            const toastText = document.getElementById('toast-text');
            const toastIcon = toast ? toast.querySelector('.toast-icon') : null;
            
            if (toast && toastText && toastIcon) {
                toastText.textContent = message;
                toastIcon.textContent = isSuccess ? '💛' : '❌';
                
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            } else {
                alert(message);
            }
        }

        function toggleWishlistAjax(event, type, title, meta = {}) {
            if (event) {
                event.stopPropagation();
                event.preventDefault();
            }

            @auth
                const url = '{{ route('wishlist.toggle') }}';
                const token = '{{ csrf_token() }}';

                const bodyData = {
                    _token: token,
                    type: type,
                    title: title,
                    ...meta
                };

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(bodyData)
                })
                .then(response => {
                    if (response.status === 401) {
                        window.location.href = '{{ route('login') }}';
                        return;
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && data.success) {
                        showGlobalToast(data.message, true);
                        
                        // Find all wishlist buttons for this item and update their icon
                        const btns = document.querySelectorAll(`[data-wishlist-title="${title}"]`);
                        btns.forEach(btn => {
                            const heart = btn.querySelector('.heart-icon');
                            if (heart) {
                                heart.textContent = data.status === 'added' ? '❤️' : '🤍';
                            }
                        });

                        // If we are on the profile page, refresh to update the list
                        if (window.location.pathname.includes('/profile')) {
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    } else {
                        showGlobalToast(data.message || 'Error updating wishlist', false);
                    }
                })
                .catch(err => {
                    console.error(err);
                    showGlobalToast('Failed to update wishlist. Please try again.', false);
                });
            @else
                showGlobalToast('Please Sign In to wishlist!', false);
                setTimeout(() => {
                    window.location.href = '{{ route('login') }}';
                }, 1500);
            @endauth
        }
    </script>
</body>
</html>
