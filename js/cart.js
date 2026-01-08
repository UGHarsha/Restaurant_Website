// Interactive cart behaviors: quantity updates, remove items, clear cart
// Uses cart_api.php for asynchronous updates; falls back to existing form submits when JS is disabled

(function() {
  const apiUrl = 'cart_api.php';

  const fmt = (value) => {
    // Format currency: Rs.<amount>
    try {
      const num = Number(value) || 0;
      return `Rs.${num}`;
    } catch (e) {
      return `Rs.${value}`;
    }
  };

  const updateGrandTotalUI = (grand) => {
    const gt = document.getElementById('grand-total');
    if (gt) gt.textContent = fmt(grand);
    const summary = document.getElementById('cart-summary');
    if (summary) {
      if ((Number(grand) || 0) <= 0) {
        summary.style.display = 'none';
      } else {
        summary.style.display = '';
      }
    }
  };

  const updateSubtotalUI = (cartId, subtotal) => {
    const el = document.getElementById(`subtotal-${cartId}`);
    if (el) el.textContent = fmt(subtotal);
  };

  const removeItemUI = (cartId) => {
    const item = document.getElementById(`item-${cartId}`);
    if (item) item.parentNode.removeChild(item);
    // If no items remain, show empty state
    const itemsContainer = document.querySelector('.cart-items');
    if (itemsContainer && itemsContainer.children.length === 0) {
      itemsContainer.innerHTML = '<div class="empty-cart">\n            <i class="fa fa-shopping-cart"></i>\n            <h3>Your cart is empty</h3>\n            <p>Add some delicious items to get started!</p>\n            <a href="menu.php" class="btn btn-brand">Browse Menu</a>\n          </div>';
    }
  };

  const postForm = async (data) => {
    const formData = new FormData();
    Object.keys(data).forEach(k => formData.append(k, data[k]));
    const res = await fetch(apiUrl, { method: 'POST', body: formData });
    return res.json();
  };

  // Quantity controls
  document.querySelectorAll('.quantity-control').forEach(ctrl => {
    const cartId = ctrl.getAttribute('data-cart-id');
    const qtyDisplay = ctrl.querySelector('.qty-display');
    const qtyInput = ctrl.querySelector('.qty-input');
    const btnDec = ctrl.querySelector('.qty-decrease');
    const btnInc = ctrl.querySelector('.qty-increase');

    const applyUpdate = async (nextQty) => {
      // Optimistic UI update
      qtyDisplay.textContent = String(nextQty);
      qtyInput.value = String(nextQty);
      try {
        const res = await postForm({ action: 'update_qty', cart_id: cartId, qty: nextQty });
        if (res && res.ok) {
          updateSubtotalUI(cartId, res.sub_total);
          updateGrandTotalUI(res.grand_total);
        }
      } catch (e) {
        // If API fails, submit the fallback form
        const fallbackBtn = ctrl.querySelector('.update-qty-btn');
        if (fallbackBtn) fallbackBtn.click();
      }
    };

    if (btnInc) {
      btnInc.addEventListener('click', () => {
        const current = parseInt(qtyDisplay.textContent || '1', 10);
        const next = Math.min(current + 1, 99);
        applyUpdate(next);
      });
    }

    if (btnDec) {
      btnDec.addEventListener('click', () => {
        const current = parseInt(qtyDisplay.textContent || '1', 10);
        const next = Math.max(current - 1, 1);
        applyUpdate(next);
      });
    }
  });

  // Remove item button
  document.querySelectorAll('.js-remove-btn').forEach(btn => {
    btn.addEventListener('click', async (e) => {
      // Prevent default submit to use API
      e.preventDefault();
      const form = btn.closest('form');
      const cartId = form ? form.getAttribute('data-cart-id') : null;
      if (!cartId) return form && form.submit();
      try {
        const res = await postForm({ action: 'delete_item', cart_id: cartId });
        if (res && res.ok) {
          removeItemUI(cartId);
          updateGrandTotalUI(res.grand_total);
        } else {
          form && form.submit();
        }
      } catch (err) {
        form && form.submit();
      }
    });
  });

  // Clear cart
  document.querySelectorAll('.js-clear-cart').forEach(btn => {
    btn.addEventListener('click', async (e) => {
      // Let the built-in confirm run (attached inline)
      if (!confirm('Clear entire cart?')) return;
      e.preventDefault();
      try {
        const res = await postForm({ action: 'clear_cart' });
        if (res && res.ok) {
          // Clear UI
          const itemsContainer = document.querySelector('.cart-items');
          if (itemsContainer) itemsContainer.innerHTML = '<div class="empty-cart">\n                <i class="fa fa-shopping-cart"></i>\n                <h3>Your cart is empty</h3>\n                <p>Add some delicious items to get started!</p>\n                <a href="menu.php" class="btn btn-brand">Browse Menu</a>\n              </div>';
          updateGrandTotalUI(0);
        }
      } catch (err) {
        // Fallback to form submit
        const form = btn.closest('form');
        form && form.submit();
      }
    });
  });
})();
