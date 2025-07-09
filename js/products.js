
function addToCart(button) {
  const productData = {
    id: button.dataset.id,
    name: button.dataset.name,
    price: parseInt(button.dataset.price),
    image: button.dataset.image,
    quantity: 1,
    selected: true 
  };

  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  const existingProductIndex = cart.findIndex(item => item.id === productData.id);

  if (existingProductIndex > -1) {
    cart[existingProductIndex].quantity++;
  } else {
    cart.push(productData);
  }

  localStorage.setItem('cart', JSON.stringify(cart));

  updateCartCounter();

  showCartNotification(productData.name);
}

function showCartNotification(productName) {
  const notification = document.createElement('div');
  notification.className = 'cart-notification';
  notification.textContent = `${productName} telah ditambahkan ke keranjang!`;
  document.body.appendChild(notification);

  setTimeout(() => {
    notification.classList.add('show');
  }, 10);

  setTimeout(() => {
    notification.classList.remove('show');
    setTimeout(() => {
      document.body.removeChild(notification);
    }, 500);
  }, 3000);
}