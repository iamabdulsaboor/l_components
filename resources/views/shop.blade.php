   
   
   <x-header />

   <x-navbar />
  <!-- Breadcumb Section  S T A R T -->
  <div class="breadcumb-section">
    <div class="breadcumb-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcumb-content">
              <h1 class="breadcumb-title">Shop</h1>
              <ul class="breadcumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="text-white">
                  <i class="fa-solid fa-chevrons-right"></i>
                </li>
                <li class="active">Shop</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Shop Section S T A R T -->
  <div class="shop-section section-padding fix">
    <div class="shop-wrapper style1">
      <div class="container">
        <div class="sort-bar">
          <div class="sort-container">
            <!-- 🔍 Search Input -->
            <input type="text" id="searchInput" placeholder="Search products..." class="form-control search-box" />

            <div class="filter-sort-wrapper">
              <!-- Choose by Category Dropdown -->
              <div class="filter-dropdown">
                <label for="filterSelect">Choose by Category:</label>
                <select id="filterSelect" onchange="handleFilterSelect(this.value)">
                  <option value="all">All Products</option>
                  <option value="popularity">Popular</option>
                  <option value="latest">Latest</option>
                </select>
              </div>

              <!-- Sort By Dropdown -->
              <div class="sort-dropdown">
                <label for="sortSelect">Sort By:</label>
                <select id="sortSelect" onchange="handleSortSelect(this.value)">
                  <option value="default">Default</option>
                  <option value="price-low-high">Price: Low to High</option>
                  <option value="price-high-low">Price: High to Low</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-12 col-lg-12 order-1 order-md-2 wow fadeInUp" data-wow-delay=".5s">
            <div class="sort-bar">
              <!-- <div
                  class="row g-sm-0 gy-20 justify-content-between align-items-center"
                >
                  <div class="col-md">
                    <p class="woocommerce-result-count">
                      Showing 1 - 12 of 30 Results
                    </p>
                  </div>

                  <div class="col-md-auto">
                    <form class="woocommerce-ordering" method="get">
                      <select
                        name="orderby"
                        class="single-select"
                        aria-label="Shop order"
                      >
                        <option value="menu_order" selected="selected">
                          Default Sorting
                        </option>
                        <option value="popularity">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by latest</option>
                        <option value="price">
                          Sort by price: low to high
                        </option>
                        <option value="price-desc">
                          Sort by price: high to low
                        </option>
                      </select>
                    </form>
                  </div>
                </div> -->
            </div>
            <div class="shop-cards-wrapper style3">
              <div class="row gy-30 gx-30" id="products-container">
                <!-- Products will be loaded here by JavaScript -->
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-4">
          <button id="seeMoreBtn" class="theme-btn style3">See More</button>
        </div>
      </div>
    </div>
  </div>
  

 
   <x-footer />