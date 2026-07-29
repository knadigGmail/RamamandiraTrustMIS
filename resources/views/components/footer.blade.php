<footer class="site-footer">
    <div class="container footer-grid">

        <div class="footer-column">
            <h3>Ramamandira Trust</h3>
            <p>Faith, Service and Tradition for Every Generation</p>
        </div>

        <div class="footer-column">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('heritage') }}">Our Heritage</a></li>
                <li><a href="{{ route('temple') }}">Temple</a></li>
                <li><a href="{{ route('community') }}">Community</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Contact</h4>
            <p>Ramamandira Trust, Honnavalli</p>
            <p>📞 +91 XXXXX XXXXX</p>
            <p>✉️ info@ramamandirahonnavalli.org</p>
        </div>

    </div>

    <div class="footer-bottom">
        <div class="container footer-bottom-content">
            <p>© {{ date('Y') }} Ramamandira Trust. All rights reserved.</p>
            <a href="{{ route('login') }}">ERP Login</a>
        </div>
    </div>
</footer>