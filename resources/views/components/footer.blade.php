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

         <a href="https://wa.me/16478602420" target="_blank" class="whatsapp-float" aria-label="Chat on WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-whatsapp"
      viewBox="0 0 16 16">
      <path
        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
    </svg>
  </a>
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

    <script src="{{asset('/js/gallery-product.js ')}}"></script>

    <script src="{{asset('/js/shop.js ')}}"></script>

    <script src="{{asset('/js/header-cart.js ')}}"></script>

    
</body>

</html>