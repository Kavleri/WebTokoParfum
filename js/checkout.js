document.addEventListener('DOMContentLoaded', () => {
    const checkoutForm = document.getElementById('checkout-form');
    if (!checkoutForm) return;

    const itemsContainer = document.getElementById('summary-items-container');
    const grandTotalElement = document.getElementById('summary-grand-total');
    const checkoutItems = JSON.parse(localStorage.getItem('checkoutItems')) || [];

    if (itemsContainer && grandTotalElement && checkoutItems.length > 0) {
        let grandTotal = 0;
        itemsContainer.innerHTML = '';
        checkoutItems.forEach(item => {
            const itemTotal = item.price * item.quantity;
            grandTotal += itemTotal;
            const itemElement = document.createElement('div');
            itemElement.className = 'summary-card';
            itemElement.innerHTML = `<img src="${item.image}" alt="${item.name}" /> <div class="summary-info"><h4>${item.name} (x${item.quantity})</h4><p>Rp ${itemTotal.toLocaleString('id-ID')}</p></div>`;
            itemsContainer.appendChild(itemElement);
        });
        grandTotalElement.textContent = `Rp ${grandTotal.toLocaleString('id-ID')}`;
    }

    checkoutForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (checkoutItems.length === 0) {
            alert('Tidak ada item untuk di-checkout.');
            return;
        }

        const customerData = {
            name: document.getElementById('customer-name').value,
            phone: document.getElementById('customer-phone').value,
            address: document.getElementById('customer-address').value,
            payment: document.getElementById('payment-method').value
        };

        try {
            const response = await fetch('proses_checkout.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ customer: customerData, items: checkoutItems })
            });
            const result = await response.json();

            if (result.status === 'success') {
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const checkoutItemIds = new Set(checkoutItems.map(item => item.id));
                const newCart = cart.filter(item => !checkoutItemIds.has(item.id));
                localStorage.setItem('cart', JSON.stringify(newCart));
                localStorage.removeItem('checkoutItems');
                
                window.location.href = `pesanan_sukses.php?tracking_id=${result.tracking_number}`;
            } else {
                alert(`Terjadi kesalahan: ${result.message}`);
            }
        } catch (error) {
            alert('Terjadi kesalahan. Gagal terhubung ke server.');
            console.error('Checkout error:', error);
        }
    });
});