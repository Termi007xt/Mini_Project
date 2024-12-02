// Selecting DOM elements
const listProductHTML = document.querySelector('.listProduct');
const listCartHTML = document.querySelector('.listCart');
const iconCart = document.querySelector('.icons');
const iconCartSpan = document.querySelector('.cart-count');
const body = document.querySelector('body');
const closeCart = document.querySelector('.close');

// Product and cart arrays
let products = [];
let cart = [];

// Toggle cart visibility
iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});
closeCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});

// Add products to the product list in the HTML
const addDataToHTML = () => {
    listProductHTML.innerHTML = ''; // Clear existing products

    if (products.length > 0) {
        products.forEach(product => {
            const newProduct = document.createElement('div');
            newProduct.dataset.id = product.id;
            newProduct.classList.add('item');
            newProduct.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h2>${product.name}</h2>
                <div class="price">₹${product.price}</div>
                <button class="addCart">Add To Cart</button>
            `;
            listProductHTML.appendChild(newProduct);
        });
    } else {
        console.warn("No products available to display.");
    }
};

// Add product to the cart
listProductHTML.addEventListener('click', (event) => {
    const clickedElement = event.target;
    if (clickedElement.classList.contains('addCart')) {
        const productId = clickedElement.parentElement.dataset.id;
        addToCart(productId);
    }
});

// Add product to the cart array
const addToCart = (productId) => {
    const productIndexInCart = cart.findIndex(item => item.product_id === productId);

    if (productIndexInCart >= 0) {
        cart[productIndexInCart].quantity += 1;
    } else {
        cart.push({
            product_id: productId,
            quantity: 1
        });
    }

    updateCartUI();
    saveCartToLocalStorage();
};

// Update cart UI
const updateCartUI = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;

    if (cart.length > 0) {
        cart.forEach(item => {
            const product = products.find(product => product.id === item.product_id);
            if (!product) return;

            totalQuantity += item.quantity;

            const cartItem = document.createElement('div');
            cartItem.classList.add('item');
            cartItem.dataset.id = item.product_id;
            cartItem.innerHTML = `
                <div class="image">
                    <img src="${product.image}" alt="${product.name}">
                </div>
                <div class="name">${product.name}</div>
                <div class="totalPrice">₹${product.price * item.quantity}</div>
                <div class="quantity">
                    <span class="minus">&lt;</span>
                    <span>${item.quantity}</span>
                    <span class="plus">&gt;</span>
                </div>
            `;
            listCartHTML.appendChild(cartItem);
        });
    }

    iconCartSpan.textContent = totalQuantity;
};

// Save cart to local storage
const saveCartToLocalStorage = () => {
    localStorage.setItem('cart', JSON.stringify(cart));
};

// Load cart from local storage
const loadCartFromLocalStorage = () => {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
    }
};

// Change cart quantity
listCartHTML.addEventListener('click', (event) => {
    const clickedElement = event.target;
    if (clickedElement.classList.contains('minus') || clickedElement.classList.contains('plus')) {
        const productId = clickedElement.parentElement.parentElement.dataset.id;
        const type = clickedElement.classList.contains('plus') ? 'plus' : 'minus';
        updateCartQuantity(productId, type);
    }
});

// Update cart quantity
const updateCartQuantity = (productId, type) => {
    const productIndexInCart = cart.findIndex(item => item.product_id === productId);

    if (productIndexInCart >= 0) {
        if (type === 'plus') {
            cart[productIndexInCart].quantity += 1;
        } else {
            const newQuantity = cart[productIndexInCart].quantity - 1;
            if (newQuantity > 0) {
                cart[productIndexInCart].quantity = newQuantity;
            } else {
                cart.splice(productIndexInCart, 1);
            }
        }
    }

    updateCartUI();
    saveCartToLocalStorage();
};

// Initialize the app
const initApp = () => {
    fetch('products.json')
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch products.json');
            }
            return response.json();
        })
        .then(data => {
            products = data;
            addDataToHTML();
            loadCartFromLocalStorage();
            updateCartUI();
        })
        .catch(error => console.error('Error initializing app:', error));
};

// Start the app
initApp();
