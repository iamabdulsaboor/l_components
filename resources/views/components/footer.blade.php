 <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Logo & Contact Info -->
            <div class="footer-section contact-info">
                <a href="index.html">
                    <img class="logo"
                    
                        src="{{ asset('/img/logo/6ab4edd3-8ec1-4520-a235-07be7c2b9c89__1_-removebg-preview.png') }}"
                        alt="Fortezza Logo">
                      
                </a>
                <p><i class="fas fa-map-marker-alt"></i> 1580 Trinity Dr Unit 4, Mississauga, ON L5T 1L6, Canada</p>
                <p><i class="fas fa-phone"></i> +1 (647) 860-2420</p>
                <p><i class="fas fa-envelope"></i> info@fortezzaquartz.com</p>
            </div>

            <!-- Products -->
            <div class="footer-section products">
                <h3>Products</h3>
                <ul>
                    <li>Antique</li>
                    <li>Nature Inspired</li>
                    <li>Ultra Premium</li>
                    <li>Pure</li>
                    <li>Modern</li>
                </ul>
            </div>

            <!-- About / Institutional -->
            <div class="footer-section institutional">
                <h3>Company</h3>
                <ul>
                    <a href="index.html">
                        <li>Home</li>
                    </a>
                    <a href="about.html">
                        <li>About Fortezza</li>
                    </a>
                    <a href="gallery.html">
                        <li>Our Gallery</li>
                    </a>
                    <a href="shop.html">
                        <li>Shop</li>
                    </a>
                    <a href="contact.html">
                        <li>Contact</li>
                    </a>
                </ul>
            </div>

            <!-- Customer Service -->
            <div class="footer-section customer-service">
                <h3>Support</h3>
                <ul>
                    <li>Warranty</li>
                    <li>FAQ</li>
                    <li>Care & Maintenance</li>
                </ul>
            </div>
        </div>

        <!-- Social Media -->
        <div class="footer-social">
            <div class="social-links">
                <a href="#" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram ico"></i></a>
                <a href="#" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f ico"></i></a>
                <a href="#" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in ico"></i></a>
                <a href="#" target="_blank" aria-label="Pinterest"><i class="fa-brands fa-pinterest-p ico"></i></a>
                <a href="#" target="_blank" aria-label="YouTube"><i class="fa-brands fa-youtube ico"></i></a>
            </div>
            <p class="copyright">© 2025 Fortezza Quartz. All rights reserved.</p>
        </div>
    </footer>
    @section('scriprt')
    <script>
  // Get elements
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const closeMenu = document.getElementById('close-menu');

  // Open mobile menu
  menuToggle.addEventListener('click', () => {
    mobileMenu.style.display = 'block';
  });

  // Close mobile menu
  closeMenu.addEventListener('click', () => {
    mobileMenu.style.display = 'none';
  });

  // Optional: close menu when clicking outside
  window.addEventListener('click', (e) => {
    if (e.target === mobileMenu) {
      mobileMenu.style.display = 'none';
      
    }
  });
</script>
    @endsection
   
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.querySelector('.qc-collections-track');
            const cards = Array.from(document.querySelectorAll('.qc-collection-card'));
            const prevBtn = document.querySelector('.qc-prev-btn');
            const nextBtn = document.querySelector('.qc-next-btn');

            let currentSlide = 0;
            let cardWidth = cards[0].offsetWidth + 30; // Card width + margin-right (30px)

            // Function to update the carousel position
            function updateCarouselPosition() {
                const offset = -currentSlide * cardWidth;
                track.style.transform = `translateX(${offset}px)`;
            }

            // Function to handle next slide
            function showNextSlide() {
                currentSlide++;
                if (currentSlide > cards.length - 1) { // Loop back to the start if at the end
                    currentSlide = 0;
                }
                updateCarouselPosition();
            }

            // Function to handle previous slide
            function showPrevSlide() {
                currentSlide--;
                if (currentSlide < 0) { // Loop to the end if at the start
                    currentSlide = cards.length - 1;
                }
                updateCarouselPosition();
            }

            // Event listeners for navigation buttons
            nextBtn.addEventListener('click', showNextSlide);
            prevBtn.addEventListener('click', showPrevSlide);

            // Recalculate cardWidth and update position on resize
            window.addEventListener('resize', () => {
                // Wait for a moment to ensure new layout is rendered
                setTimeout(() => {
                    // Make sure cards[0] exists before accessing its offsetWidth
                    if (cards.length > 0) {
                        cardWidth = cards[0].offsetWidth + 30; // Re-calculate width + margin
                        updateCarouselPosition();
                    }
                }, 100);
            });

            // Initial setup
            updateCarouselPosition();
        });
    </script>
    <!--<< All JS Plugins >>-->
    <script src="{{ asset('/js/jquery-3.7.1.min.js') }}"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{ asset('/js/jquery.waypoints.js') }}"></script>
    <!--<< Counterup Js >>-->
    <script src="{{ asset('/js/jquery.counterup.min.js') }}"></script>
    <!--<< Viewport Js >>-->
    <script src="{{ asset('/js/viewport.jquery.js') }}"></script>
    <!--<< Tilt Js >>-->
    <script src="{{ asset('/js/tilt.min.js') }}"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{ asset('/js/swiper-bundle.min.js') }}"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{ asset('/js/jquery.meanmenu.min.js') }}"></script>
    <!--<< Magnific popup Js >>-->
    <script src="{{ asset('/js/magnific-popup.min.js') }}"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{ asset('/js/wow.min.js') }}"></script>
    <!--<< NIce Select Js >>-->
    <script src="{{ asset('/js/nice-select.min.js') }}"></script>
    <!--<< Main.js >>-->
    <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>