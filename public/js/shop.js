let cart = JSON.parse(localStorage.getItem("cart")) || [];
let allProducts = [];
let filteredProducts = [];
let displayedCount = 0;
const perPage = 15;

// Load products on shop page
function loadProducts() {
  fetch("json/products.json")
    .then((response) => response.json())
    .then((products) => {
      allProducts = products;
      filteredProducts = [...allProducts];
      displayedCount = 0;
      document.getElementById("products-container").innerHTML = "";
      renderProducts();
    })
    .catch((error) => console.error("Error loading products:", error));
}

// Render products (15 at a time)
function renderProducts() {
  const container = document.getElementById("products-container");
  const nextProducts = filteredProducts.slice(
    displayedCount,
    displayedCount + perPage
  );

  nextProducts.forEach((product) => {
    container.appendChild(createProductCard(product));
  });

  displayedCount += nextProducts.length;

  // Show/hide "See More"
  const seeMoreBtn = document.getElementById("seeMoreBtn");
  seeMoreBtn.style.display =
    displayedCount < filteredProducts.length ? "inline-block" : "none";

  updateProductCount(filteredProducts.length);
}

// 🔍 Search filter (searches all products always)
const searchInput = document.getElementById("searchInput");
searchInput.addEventListener("input", function () {
  const query = this.value.toLowerCase();
  filteredProducts = allProducts.filter((p) =>
    p.name.toLowerCase().includes(query)
  );
  displayedCount = 0;
  document.getElementById("products-container").innerHTML = "";
  renderProducts();
});

// 🏷️ Filter by category
function filterProducts(filterType) {
  if (filterType === "popularity") {
    filteredProducts = allProducts.filter((p) => p.popularity === "yes");
  } else if (filterType === "latest") {
    filteredProducts = allProducts.filter((p) => p.latest === "yes");
  } else {
    filteredProducts = [...allProducts]; // Show all
  }

  displayedCount = 0;
  document.getElementById("products-container").innerHTML = "";
  renderProducts();
}

// 💰 Sort products (always sorts all products independently)
function sortProducts(sortType) {
  let sortedProducts = [...allProducts];

  if (sortType === "price-low-high") {
    sortedProducts.sort((a, b) => {
      const priceA =
        typeof a.price === "string"
          ? parseFloat(a.price.replace("$", ""))
          : a.price;
      const priceB =
        typeof b.price === "string"
          ? parseFloat(b.price.replace("$", ""))
          : b.price;
      return priceA - priceB;
    });
  } else if (sortType === "price-high-low") {
    sortedProducts.sort((a, b) => {
      const priceA =
        typeof a.price === "string"
          ? parseFloat(a.price.replace("$", ""))
          : a.price;
      const priceB =
        typeof b.price === "string"
          ? parseFloat(b.price.replace("$", ""))
          : b.price;
      return priceB - priceA;
    });
  } else {
    sortedProducts = [...allProducts];
  }

  filteredProducts = sortedProducts;
  displayedCount = 0;
  document.getElementById("products-container").innerHTML = "";
  renderProducts();
}

// Dropdown change handlers
function handleFilterSelect(value) {
  filterProducts(value);
}

function handleSortSelect(value) {
  sortProducts(value);
}

// 🛒 Create Product Card
function createProductCard(product) {
  const colDiv = document.createElement("div");
  colDiv.className = "col-xl-4 col-md-6";

  colDiv.innerHTML = `
    <div class="shop-card-items style2">
        <div class="thumb">
            <img src="/${product.images[0]}" alt="${product.name}" height="250" width="250"
                 onerror="this.src='assets/images/placeholder.jpg'; this.alt='Image not available'" style="margin-left:-20px;border:1px solid gray"/>
        </div>
        <ul class="star-wrapper style1"></ul>
        <h3><a href="shop-details.html?id=${product.id}">${product.name}</a></h3>
        <p class="text">$${product.price}</p>
        <div class="btn-wrapper">
            <button class="theme-btn style3 add-to-cart-btn" data-product-id="${product.id}">
                ADD TO CART
            </button>
        </div>
    </div>
  `;

  colDiv
    .querySelector(".add-to-cart-btn")
    .addEventListener("click", () => addToCart(product));
  return colDiv;
}

// 🛍️ Add to cart
function addToCart(product) {
  const existingItem = cart.find((item) => item.id === product.id);
  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    cart.push({ ...product, quantity: 1 });
  }

  localStorage.setItem("cart", JSON.stringify(cart));
  alert(`${product.name} added to cart!`);
  updateCartCount();
}

// 🧮 Update cart count
function updateCartCount() {
  const cartCount = document.querySelector(".cart-count");
  if (cartCount) {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
  }
}

// 🧾 Update product count text
function updateProductCount(count) {
  const countElement = document.querySelector(".woocommerce-result-count");
  if (countElement) {
    countElement.textContent = `Showing 1 - ${Math.min(
      displayedCount,
      count
    )} of ${count} Results`;
  }
}

// ▶️ Initialize
document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".shop-cards-wrapper")) {
    loadProducts();
  }
  updateCartCount();
  document
    .getElementById("seeMoreBtn")
    .addEventListener("click", renderProducts);
});
