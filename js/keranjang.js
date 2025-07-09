document.addEventListener('DOMContentLoaded', () => {
    const cartContainer = document.getElementById('cart-container');
    const cartEmptyMessage = document.getElementById('cart-empty-message');
    const cartItemList = document.getElementById('cart-item-list');
    const selectAllHeader = document.getElementById('select-all-checkbox-header');
    const selectAllFooter = document.getElementById('select-all-checkbox-footer');
    const deleteSelectedBtn = document.getElementById('delete-selected-btn');
    const totalSelectedCount = document.getElementById('total-selected-count');
    const grandTotalPrice = document.getElementById('grand-total-price');
    const checkoutButton = document.getElementById('checkout-button');

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function saveAndRender() {
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
        updateCartCounter(); 
    }

    function renderCart() {
        if (cart.length === 0) {
            cartContainer.style.display = 'none';
            cartEmptyMessage.style.display = 'flex';
            return;
        }

        cartContainer.style.display = 'block';
        cartEmptyMessage.style.display = 'none';
        
        cartItemList.innerHTML = '';
        cart.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.className = 'cart-item-row';
            itemElement.innerHTML = `
                <div class="cell-product">
                    <input type="checkbox" class="cart-checkbox item-checkbox" data-id="${item.id}" ${item.selected ? 'checked' : ''}>
                    <img src="${item.image}" alt="${item.name}">
                    <span class="product-name">${item.name}</span>
                </div>
                <div class="cell-price">Rp${item.price.toLocaleString('id-ID')}</div>
                <div class="cell-quantity">
                    <div class="quantity-selector">
                        <button class="quantity-btn" data-id="${item.id}" data-action="decrease" ${item.quantity <= 1 ? 'disabled' : ''}>-</button>
                        <input type="text" class="quantity-input" value="${item.quantity}" data-id="${item.id}" readonly>
                        <button class="quantity-btn" data-id="${item.id}" data-action="increase">+</button>
                    </div>
                </div>
                <div class="cell-total">Rp${(item.price * item.quantity).toLocaleString('id-ID')}</div>
                <div class="cell-action">
                    <button class="delete-item-btn" data-id="${item.id}">Hapus</button>
                </div>
            `;
            cartItemList.appendChild(itemElement);
        });
        
        updateSummary();
        addEventListenersToItems();
    }

    function updateSummary() {
        const selectedItems = cart.filter(item => item.selected);
        const totalCount = selectedItems.reduce((sum, item) => sum + item.quantity, 0);
        const totalPrice = selectedItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        
        totalSelectedCount.textContent = totalCount;
        grandTotalPrice.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
        
        const allItemsSelected = cart.length > 0 && selectedItems.length === cart.length;
        selectAllHeader.checked = allItemsSelected;
        selectAllFooter.checked = allItemsSelected;

        checkoutButton.disabled = selectedItems.length === 0;
        deleteSelectedBtn.disabled = selectedItems.length === 0;
    }

    function addEventListenersToItems() {
        document.querySelectorAll('.item-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', (e) => {
                const item = cart.find(i => i.id === e.target.dataset.id);
                if (item) item.selected = e.target.checked;
                saveAndRender();
            });
        });

        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', (e) => {
                const { id, action } = e.target.dataset;
                const item = cart.find(i => i.id === id);
                if (item) {
                    if (action === 'increase') item.quantity++;
                    else if (action === 'decrease' && item.quantity > 1) item.quantity--;
                }
                saveAndRender();
            });
        });

        document.querySelectorAll('.delete-item-btn').forEach(button => {
            button.addEventListener('click', (e) => {
                cart = cart.filter(item => item.id !== e.target.dataset.id);
                saveAndRender();
            });
        });
    }

    [selectAllHeader, selectAllFooter].forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            cart.forEach(item => item.selected = e.target.checked);
            saveAndRender();
        });
    });

    deleteSelectedBtn.addEventListener('click', () => {
        cart = cart.filter(item => !item.selected);
        saveAndRender();
    });
    
    checkoutButton.addEventListener('click', () => {
        const itemsForCheckout = cart.filter(item => item.selected);
        localStorage.setItem('checkoutItems', JSON.stringify(itemsForCheckout));
        window.location.href = 'checkout.php';
    });

    renderCart();
});