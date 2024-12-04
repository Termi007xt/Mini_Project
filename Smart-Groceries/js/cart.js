// Select elements
let listCartHTML = document.querySelector('.listCart');
let iconCartSpan = document.querySelector('.cart-count');

// Load cart from localStorage
const loadCart = () => {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // If there are no cart items, show a message
    if (cart.length === 0) {
        listCartHTML.innerHTML = `<p>Your cart is empty!</p>`;
        iconCartSpan.textContent = 0; // Update cart count
        return;
    }

    // Clear previous cart items
    listCartHTML.innerHTML = '';

    let totalQuantity = 0;

    // Loop through each cart item
    cart.forEach(cartItem => {
        // You need to have access to product data (you can either have it in localStorage or load it dynamically)
        // Assuming you have a list of products in a global variable `products`
        let product = products.find(p => p.id == cartItem.product_id); // Find product by id

        if (product) {
            totalQuantity += cartItem.quantity;

            // Create a cart item element
            let newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.dataset.id = cartItem.product_id;

            newItem.innerHTML = `
                <div class="image">
                    <img src="${product.image}" alt="${product.name}">
                </div>
                <div class="name">${product.name}</div>
                <div class="totalPrice">₹${product.price * cartItem.quantity}</div>
                <div class="quantity">
                    <button class="minus">-</button>
                    <span>${cartItem.quantity}</span>
                    <button class="plus">+</button>
                </div>`;
            
            listCartHTML.appendChild(newItem);
        }
    });

    iconCartSpan.textContent = totalQuantity; // Update cart count
};

// Change quantity of cart items
const changeCartQuantity = (productId, action) => {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    let cartItem = cart.find(item => item.product_id === productId);

    if (cartItem) {
        if (action === 'plus') {
            cartItem.quantity += 1;
        } else if (action === 'minus') {
            cartItem.quantity -= 1;
            if (cartItem.quantity <= 0) {
                cart = cart.filter(item => item.product_id !== productId); // Remove item if quantity is 0
            }
        }

        localStorage.setItem('cart', JSON.stringify(cart)); // Save updated cart to localStorage
        loadCart(); // Reload cart on page
    }
};

// Event listeners for quantity change buttons
listCartHTML.addEventListener('click', (event) => {
    let clickedElement = event.target;
    let productId = clickedElement.closest('.item').dataset.id;

    if (clickedElement.classList.contains('plus')) {
        changeCartQuantity(productId, 'plus');
    } else if (clickedElement.classList.contains('minus')) {
        changeCartQuantity(productId, 'minus');
    }
});

// Load the cart when the page is ready
document.addEventListener('DOMContentLoaded', loadCart);
