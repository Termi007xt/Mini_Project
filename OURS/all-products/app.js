document.addEventListener('DOMContentLoaded', () => {
    // Fetch the JSON data
    fetch('products.json') // Replace with the correct path to your JSON file if needed
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
      })
      .then(products => {
        const productContainer = document.querySelector('.listProduct');
  
        // Clear any existing content (optional)
        productContainer.innerHTML = '';
  
        // Loop through the products and create tiles
        products.forEach(product => {
          const productTile = document.createElement('div');
          productTile.className = 'item';
  
          productTile.innerHTML = `
            <img src="${product.image}" alt="${product.name}" />
            <h2>${product.name}</h2>
            <div class="packsize">${product.packsize}</div>
            <div class="price">₹${product.price}</div>
            <button class="addcart">Add To Cart</button>
          `;
  
          // Append the tile to the container
          productContainer.appendChild(productTile);
        });
      })
      .catch(error => {
        console.error('Error fetching the products:', error);
  
        // Optionally display an error message to the user
        const productContainer = document.querySelector('.listProduct');
        productContainer.innerHTML = '<p>Error loading products. Please try again later.</p>';
      });
  });
  