// cart.js - Cart page functionality
document.addEventListener('DOMContentLoaded', function() {
    loadCartItems();
    setupCartInteractions();
});

function loadCartItems() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartTableBody = document.getElementById('cart-items-container');
    
    if (!cartTableBody) return;

    cartTableBody.innerHTML = '';

    if (cart.length === 0) {
        cartTableBody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center">Your cart is empty</td>
            </tr>
        `;
        updateCartTotals([]);
        return;
    }

    cart.forEach(item => {
        const cartRow = createCartRow(item);
        cartTableBody.appendChild(cartRow);
    });

    updateCartTotals(cart);
}

function createCartRow(item) {
    const tr = document.createElement('tr');
    tr.className = 'cart_item';
    
    // Fix image path - add 'assets/' prefix
    const imagePath = item.images && item.images[0] ? `assets/${item.images[0]}` : 'assets/images/placeholder.jpg';
    
    tr.innerHTML = `
        <td data-title="Product">
            <a class="cartimage" href="shop-details.html?id=${item.id}">
                <img width="91" height="91" src="${imagePath}" alt="${item.name}" 
                     onerror="this.src='assets/images/placeholder.jpg'">
                ${item.name}
            </a>
        </td>
        <td data-title="Price">
            <span class="amount"><bdi><span>$</span>${item.price}</bdi></span>
        </td>
        <td data-title="Quantity">
            <div class="quantity-display">
                <span class="quantity-number">${item.quantity}</span>
            </div>
        </td>
        <td data-title="Total">
            <span class="amount subtotal"><bdi><span>$</span>${(item.price * item.quantity).toFixed(2)}</bdi></span>
        </td>
        <td data-title="Remove">
            <a href="#" class="remove" data-product-id="${item.id}">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </td>
    `;

    return tr;
}

function setupCartInteractions() {
    // Remove items
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove')) {
            e.preventDefault();
            const productId = e.target.closest('.remove').dataset.productId;
            removeFromCart(parseInt(productId));
        }
    });

    // Setup WhatsApp checkout
    const checkoutBtn = document.getElementById('whatsapp-checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            proceedToWhatsAppCheckout();
        });
    }
}

function removeFromCart(productId) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.id !== productId);
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCartItems();
    updateCartCount();
}

function updateCartTotals(cart) {
    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    
    const subtotalElement = document.getElementById('cart-subtotal');
    const totalElement = document.getElementById('cart-total');
    
    if (subtotalElement) {
        subtotalElement.textContent = subtotal.toFixed(2);
    }
    
    if (totalElement) {
        totalElement.textContent = subtotal.toFixed(2);
    }
}

function updateCartCount() {
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
    }
}

function proceedToWhatsAppCheckout() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    if (cart.length === 0) {
        alert('Your cart is empty!');
        return;
    }

    let message = "Hello! I would like to place an order:\n\n";
    let total = 0;
    
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        message += `• ${item.name} - $${item.price} x ${item.quantity} = $${itemTotal.toFixed(2)}\n`;
    });
    
    message += `\nTotal: $${total.toFixed(2)}`;
    
    const encodedMessage = encodeURIComponent(message);
    const whatsappUrl = `https://wa.me/+16478602420?text=${encodedMessage}`;
    
    window.open(whatsappUrl, '_blank');
    
    // Optional: Clear cart after successful order
    // localStorage.removeItem('cart');
    // loadCartItems();
}