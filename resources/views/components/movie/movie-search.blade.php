<div class="search-bar">
    <span style="font-size: 18px; opacity: 0.6;">🔍</span>
    <input type="text" placeholder="Search movies, events, venue" style="font-size: 16px;">
    <div class="search-divider"></div>
    <select class="search-select" id="homepage-city-select" style="font-size: 14px; padding-right: 24px; background: transparent; border: none; color: var(--white); outline: none; cursor: pointer;" onchange="syncSelectedCity(this.value)">
        <option value="Mumbai" style="background: #18181c;">Mumbai</option>
        <option value="Delhi-NCR" style="background: #18181c;">Delhi-NCR</option>
        <option value="Bengaluru" style="background: #18181c;">Bengaluru</option>
        <option value="Hyderabad" style="background: #18181c;">Hyderabad</option>
        <option value="Pune" style="background: #18181c;">Pune</option>
        <option value="Chandigarh" style="background: #18181c;">Chandigarh</option>
    </select>
    <button class="btn btn-primary" style="padding: 12px 28px; border-radius: 8px; font-weight: 700;">Search</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const homeSelect = document.getElementById('homepage-city-select');
        if (homeSelect) {
            const savedCity = localStorage.getItem('ticketflix_city') || 'Mumbai';
            homeSelect.value = savedCity;
        }
    });

    function syncSelectedCity(city) {
        localStorage.setItem('ticketflix_city', city);
        window.location.reload();
    }
</script>