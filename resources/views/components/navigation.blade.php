<header class="site-header">
    <div class="top-bar">
        <div class="container top-bar-content">
            <span>📍 Honnavalli</span>
            <span>📞 +91 XXXXX XXXXX</span>
            <span>🕘 Temple Timings: 6:00 AM – 8:00 PM</span>
        </div>
    </div>

    <nav class="navbar">
        <div class="container navbar-content">

            <a href="{{ route('home') }}" class="logo">
                <div class="logo-mark">🛕</div>
                <div class="logo-text">
                    <span class="logo-title">Ramamandira Trust</span>
                    <span class="logo-tagline">Faith, Service and Tradition for Every Generation</span>
                </div>
            </a>

            <button class="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('heritage') }}">Our Heritage</a>
                <a href="{{ route('temple') }}">Temple</a>
                <a href="{{ route('community') }}">Community</a>
                <a href="{{ route('events') }}">Events</a>
                <a href="{{ route('gallery') }}">Gallery</a>
                <a href="{{ route('donate') }}">Donate</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>

            <a href="{{ route('login') }}" class="btn btn-primary nav-login">ERP Login</a>
        </div>
    </nav>
</header>