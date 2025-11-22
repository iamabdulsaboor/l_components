 <x-header />
 
 <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59GM6M4" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <noscript>Coante Surfaces</noscript>

    <!-- Navigation -->
   <nav>
  <div class="nav-container">
    <div class="logo-container">
      <a href="index.html">
        <img class="logo" src="{{ asset('/img/logo/6ab4edd3-8ec1-4520-a235-07be7c2b9c89__1_-removebg-preview.png') }}" alt="Fortezza Logo">
      </a>
    </div>

    <!-- Desktop Menu -->
    <ul class="desktop-menu">
      <li><a href="{{ route('welcome') }}">HOME</a></li>
      <li><a href="{{ route('about') }}">ABOUT</a></li>
      <li><a href="{{ route('our-gallery') }}">GALLERY</a></li>
      <li><a href="{{ route('shop') }}">SHOP</a></li>
      <li><a href="{{ route('contact') }}">CONTACT</a></li>
      <li style="padding-left: 196px;"><a href="contact.html" class="quote-btn">GET A QUOTE</a></li>
    </ul>

    <!-- Toggle Button for Mobile -->
    <div class="mobile-menu-button">
      <button id="menu-toggle" aria-label="Toggle menu">☰</button>
    </div>

    <!-- Fullscreen Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu">
      <button class="close-btn" id="close-menu">&times;</button>
      <ul class="mobile-menu-links">
        <li><a href="index.html">HOME</a></li>
        <li><a href="about.html">ABOUT</a></li>
        <li><a href="gallery.html">GALLERY</a></li>
        <li><a href="shop.html">SHOP</a></li>
        <li><a href="contact.html">CONTACT</a></li>
        <li><a href="contact.html" class="quote-btn">GET A QUOTE</a></li>
      </ul>
    </div>
  </div>
</nav>
