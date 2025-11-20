// product-details.js - Product details page functionality
let cart = JSON.parse(localStorage.getItem("cart")) || [];
let currentProduct = null;

document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const productId = parseInt(urlParams.get("id"));

  if (productId) {
    loadProductDetails(productId);
  } else {
    showError("Product not found");
  }
});

function loadProductDetails(productId) {
  fetch("assets/json/products.json")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((products) => {
      const product = products.find((p) => p.id === productId);
      if (product) {
        currentProduct = product;
        displayProductDetails(product);
      } else {
        showError("Product not found");
      }
    })
    .catch((error) => {
      console.error("Error loading product details:", error);
      showError("Failed to load product details");
    });
}

function displayProductDetails(product) {
  // Update product title
  const productTitle = document.getElementById("product-title");
  if (productTitle) {
    productTitle.textContent = product.name;
  }

  // Update product price - FIXED
  const productPrice = document.getElementById("product-price");
  if (productPrice) {
    productPrice.textContent = `$${product.price}`;
  }

  // Update product description
  const productDescription = document.getElementById("product-description");
  if (productDescription) {
    productDescription.textContent = product.description;
  }

  // Update product images
  updateProductImages(product.images);

  // Update WhatsApp link
  updateWhatsAppLink(product);

  // Setup Add to Cart button
  setupAddToCartButton(product);

  // Setup quantity controls
  setupQuantityControls();
}

function updateProductImages(images) {
  const mainImage = document.getElementById("main-product-image");
  const thumbnailsContainer = document.getElementById("product-thumbnails");

  if (!mainImage || !thumbnailsContainer) return;

  // Clear existing thumbnails
  thumbnailsContainer.innerHTML = "";

  // Set main image
  if (images && images.length > 0) {
    mainImage.src = `assets/${images[0]}`;
    mainImage.alt = "Main product image";

    // Create thumbnails
    images.forEach((image, index) => {
      const colDiv = document.createElement("div");
      colDiv.className = "col-4";

      colDiv.innerHTML = `
                <div class="product-thumbnail ${index === 0 ? "active" : ""}">
                    <img src="assets/${image}" 
                         alt="Thumbnail ${index + 1}" 
                         class="thumbnail-img"
                         data-index="${index}">
                </div>
            `;

      thumbnailsContainer.appendChild(colDiv);
    });

    // Add click event to thumbnails
    const thumbnails = thumbnailsContainer.querySelectorAll(".thumbnail-img");
    thumbnails.forEach((thumb) => {
      thumb.addEventListener("click", function () {
        const imageIndex = this.getAttribute("data-index");
        mainImage.src = `assets/${images[imageIndex]}`;

        // Update active state
        thumbnails.forEach((t) => t.parentElement.classList.remove("active"));
        this.parentElement.classList.add("active");
      });
    });
  }
}

function updateWhatsAppLink(product) {
  const whatsappBtn = document.getElementById("whatsapp-enquiry-btn");
  if (whatsappBtn && product) {
    const message = `Hello! I'm interested in ${product.name} - $${product.price}. Can you provide more information?`;
    const encodedMessage = encodeURIComponent(message);
    whatsappBtn.href = `https://wa.me/+16478602420?text=${encodedMessage}`;
  }
}

function setupAddToCartButton(product) {
  const addToCartBtn = document.getElementById("add-to-cart-btn");
  if (addToCartBtn) {
    addToCartBtn.addEventListener("click", function (e) {
      e.preventDefault();
      addToCartFromDetails(product);
    });
  }
}

function setupQuantityControls() {
  const quantityInput = document.getElementById("quantity-input");
  const plusBtn = document.querySelector(".quantity-plus");
  const minusBtn = document.querySelector(".quantity-minus");

  if (plusBtn && minusBtn && quantityInput) {
    // Remove existing event listeners
    plusBtn.replaceWith(plusBtn.cloneNode(true));
    minusBtn.replaceWith(minusBtn.cloneNode(true));

    // Get new references
    const newPlusBtn = document.querySelector(".quantity-plus");
    const newMinusBtn = document.querySelector(".quantity-minus");

    newPlusBtn.addEventListener("click", function (e) {
      e.preventDefault();
      let currentValue = parseInt(quantityInput.value);
      if (currentValue < 100) {
        quantityInput.value = currentValue + 1;
      }
    });

    newMinusBtn.addEventListener("click", function (e) {
      e.preventDefault();
      let currentValue = parseInt(quantityInput.value);
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
      }
    });
  }
}

function addToCartFromDetails(product) {
  const quantityInput = document.getElementById("quantity-input");
  const quantity = quantityInput ? parseInt(quantityInput.value) : 1;

  const existingItem = cart.find((item) => item.id === product.id);

  if (existingItem) {
    existingItem.quantity += quantity;
  } else {
    cart.push({
      ...product,
      quantity: quantity,
    });
  }

  localStorage.setItem("cart", JSON.stringify(cart));
  showAddToCartMessage(product.name, quantity);
  updateCartCount();
}

function showAddToCartMessage(productName, quantity) {
  // You can replace this with a toast notification
  alert(`${quantity} x ${productName} added to cart!`);
}

function updateCartCount() {
  const cartCount = document.querySelector(".cart-count");
  if (cartCount) {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
  }
}

function showError(message) {
  const container = document.querySelector(".product-about");
  if (container) {
    container.innerHTML = `
            <div class="alert alert-danger">
                <h4>Error</h4>
                <p>${message}</p>
                <a href="shop.html" class="theme-btn style3">Back to Shop</a>
            </div>
        `;
  }
}
function updateCartCount() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);

  // Update header cart count
  if (typeof updateCartCounter === "function") {
    updateCartCounter();
  }
}
