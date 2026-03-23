<footer class="landing-footer">
    <div class="container footer-inner">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-kicker"><i class="fas fa-shield-alt"></i> Trusted Education Platform</div>
                <div class="footer-brand">EMa<span>S</span></div>
                <p class="footer-desc">
                    Electronic Marking System (EMaS) helps schools and councils process examinations with accuracy, speed, and transparency. Built for modern result management.
                </p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('landing') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                    <li><a href="{{ route('landing.about') }}"><i class="fas fa-angle-right"></i> About Us</a></li>
                    <li><a href="{{ route('landing') }}#features"><i class="fas fa-angle-right"></i> Core Features</a></li>
                    <li><a href="{{ route('landing') }}#how-it-works"><i class="fas fa-angle-right"></i> How It Works</a></li>
                    <li><a href="{{ route('landing') }}#testimonials"><i class="fas fa-angle-right"></i> Testimonials</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4">
                <h4 class="footer-title">Resources</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('landing.guideline') }}"><i class="fas fa-angle-right"></i> Guidelines</a></li>
                    <li><a href="{{ route('landing.materials') }}"><i class="fas fa-angle-right"></i> Materials</a></li>
                    <li><a href="{{ route('landing.news.index') }}"><i class="fas fa-angle-right"></i> News</a></li>
                    <li><a href="{{ route('landing.tafiti.index') }}"><i class="fas fa-angle-right"></i> Research (Tafiti)</a></li>
                    <li><a href="{{ route('login') }}"><i class="fas fa-angle-right"></i> Staff Portal</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4">
                <h4 class="footer-title">Support</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('register') }}"><i class="fas fa-angle-right"></i> Create Account</a></li>
                    <li><a href="{{ route('login') }}"><i class="fas fa-angle-right"></i> Login</a></li>
                    <li><a href="#"><i class="fas fa-angle-right"></i> Help Center</a></li>
                    <li><a href="#"><i class="fas fa-angle-right"></i> FAQs</a></li>
                </ul>
            </div>

            <div class="col-lg-2">
                <h4 class="footer-title">Legal</h4>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
                    <li><a href="#"><i class="fas fa-angle-right"></i> Terms of Service</a></li>
                    <li><a href="#"><i class="fas fa-angle-right"></i> Cookie Policy</a></li>
                    <li><a href="#"><i class="fas fa-angle-right"></i> Data Protection</a></li>
                </ul>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-6">
                <h4 class="footer-title">Contact</h4>
                <div class="footer-contact">
                    <div class="footer-contact-item"><i class="fas fa-map-marker-alt"></i> United Republic of Tanzania</div>
                    <div class="footer-contact-item"><i class="fas fa-envelope"></i> support@emas.go.tz</div>
                    <div class="footer-contact-item"><i class="fas fa-phone-alt"></i> +255 123 456 789</div>
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="footer-title">Stay Updated</h4>
                <p class="footer-desc" style="margin-bottom: 14px;">Subscribe for announcements, new features, and updates.</p>
                <form class="footer-newsletter" onsubmit="return false;">
                    <input class="footer-input" type="email" placeholder="Your email address" aria-label="Email address">
                    <button class="footer-btn" type="submit"><i class="fas fa-paper-plane"></i> Subscribe</button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <p>
                &copy; {{ date('Y') }} Electronic Marking System (EMaS). All Rights Reserved.
                | <a href="{{ route('landing') }}">Home</a>
                | <a href="{{ route('login') }}">Staff Portal</a>
            </p>
        </div>
    </div>
</footer>
