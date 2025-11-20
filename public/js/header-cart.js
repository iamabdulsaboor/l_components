// simple-header-cart.js - Simple header cart counter for all pages
document.addEventListener("DOMContentLoaded", function () {
  updateCartCounter();
});

function updateCartCounter() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
  const cartIcon = document.querySelector(".header__cart a");

  // Create or update cart count badge
  let cartCount = document.querySelector(".cart-count");

  if (!cartCount && cartIcon) {
    // Create cart count badge if it doesn't exist
    cartCount = document.createElement("span");
    cartCount.className = "cart-count";
    cartCount.style.cssText = `
            position: absolute;
            top: -8px;
            right: -8px;
            background: #2B1E16;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        `;
    cartIcon.style.position = "relative";
    cartIcon.appendChild(cartCount);
  }

  // Update cart count
  if (cartCount) {
    cartCount.textContent = totalItems;
    cartCount.style.display = totalItems > 0 ? "flex" : "none";
  }
}

// Function to update cart from other pages
function updateCartCount() {
  updateCartCounter();
}

// Make function available globally
window.updateCartCount = updateCartCount;

// Update when cart changes in other tabs
window.addEventListener("storage", function (e) {
  if (e.key === "cart") {
    updateCartCounter();
  }
});
