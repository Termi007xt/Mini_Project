// Selecting elements
let listProductHTML = document.querySelector('.listProduct'); 
let listCartHTML = document.querySelector('.listCart'); 
let iconCart = document.querySelector('#icon-cart'); 
let iconCartSpan = document.querySelector('.cart-count'); 
let body = document.querySelector('body'); 
let closeCart = document.querySelector('.close'); 

// Product and cart data
let products = [];
let cart = [];

// Event listener to toggle cart visibility
iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart'); // Toggles cart visibility
});

closeCart.addEventListener('click', () => {
    body.classList.remove('showCart'); // Hides cart
});

// Load products and initialize app
const initApp = () => {
    // Fetch products from products.json
    fetch('OURS/homepage-products.json') // Replace with your JSON file path
        .then(response => response.json())
        .then(data => {
            products = data; // Store products in the global array
            addDataToHTML();

            // Load cart from local storage
            if (localStorage.getItem('cart')) {
                cart = JSON.parse(localStorage.getItem('cart'));
                addCartToHTML();
            }
        })
        .catch(error => console.error('Error fetching products:', error));
};

// Display products in the DOM
const addDataToHTML = () => {
    listProductHTML.innerHTML = ''; // Clear existing product data

    if (products.length > 0) {
        products.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.dataset.id = product.id;
            newProduct.classList.add('item');
            newProduct.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h2>${product.name}</h2>
                <div class="price">₹${product.price}</div>
                <button class="addCart">Add To Cart</button>`;
            listProductHTML.appendChild(newProduct);
        });
    }
};

// Add product to cart
const addToCart = (productId) => {
    let positionInCart = cart.findIndex(item => item.product_id == productId);

    if (positionInCart < 0) {
        cart.push({ product_id: productId, quantity: 1 });
    } else {
        cart[positionInCart].quantity += 1;
    }

    addCartToHTML();
    saveCartToLocalStorage();
};

// Update cart in the DOM
const addCartToHTML = () => {
    listCartHTML.innerHTML = ''; // Clear existing cart items
    let totalQuantity = 0;

    if (cart.length > 0) {
        cart.forEach(cartItem => {
            totalQuantity += cartItem.quantity;

            let product = products.find(p => p.id == cartItem.product_id);
            if (product) {
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
                        <span class="minus">-</span>
                        <span>${cartItem.quantity}</span>
                        <span class="plus">+</span>
                    </div>`;
                listCartHTML.appendChild(newItem);
            }
        });
    }

    iconCartSpan.textContent = totalQuantity; // Update cart count
};

// Save cart to local storage
const saveCartToLocalStorage = () => {
    localStorage.setItem('cart', JSON.stringify(cart));
};

// Handle add-to-cart button clicks
listProductHTML.addEventListener('click', (event) => {
    if (event.target.classList.contains('addCart')) {
        let productId = event.target.parentElement.dataset.id;
        addToCart(productId);
    }
});

// Handle cart item quantity changes
listCartHTML.addEventListener('click', (event) => {
    let clickedElement = event.target;
    if (clickedElement.classList.contains('minus') || clickedElement.classList.contains('plus')) {
        let productId = clickedElement.parentElement.parentElement.dataset.id;

        if (clickedElement.classList.contains('minus')) {
            changeCartQuantity(productId, 'minus');
        } else {
            changeCartQuantity(productId, 'plus');
        }
    }
});

// Change quantity of an item in the cart
const changeCartQuantity = (productId, action) => {
    let cartItemIndex = cart.findIndex(item => item.product_id == productId);

    if (cartItemIndex >= 0) {
        if (action === 'plus') {
            cart[cartItemIndex].quantity += 1;
        } else if (action === 'minus') {
            cart[cartItemIndex].quantity -= 1;

            if (cart[cartItemIndex].quantity <= 0) {
                cart.splice(cartItemIndex, 1); // Remove item if quantity is 0
            }
        }
    }

    addCartToHTML();
    saveCartToLocalStorage();
};

// Initialize the app
initApp();
