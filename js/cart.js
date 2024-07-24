function updateTotal() {
    let total = 0;
    document.querySelectorAll('.cart-item').forEach(item => {
        const price = parseFloat(item.querySelector('.price').dataset.price);
        const quantity = parseInt(item.querySelector('input[type="number"]').value);
        total += price * quantity;
    });
    document.getElementById('total-price').textContent = total.toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    });
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.cart-item input[type="number"]').forEach(input => {
        input.addEventListener('input', updateTotal);
    });

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const cartItemId = this.dataset.id;
            fetch('delete_cart_item.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'id=' + cartItemId
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.closest('.cart-item').remove();
                        updateTotal();
                    } else {
                        alert('Xóa sản phẩm thất bại.');
                    }
                });
        });
    });

    document.getElementById('confirm-order-btn').addEventListener('click', function() {
        const address = document.getElementById('address').value;
        if (address.trim() === '') {
            alert('Vui lòng nhập địa chỉ giao hàng.');
            return;
        }
        
        fetch('add_to_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'address=' + encodeURIComponent(address)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Đơn hàng đã được xác nhận!');
                    window.location.reload();
                } else {
                    alert('Xác nhận đơn hàng thất bại: ' + data.error);
                }
            });
    });

    updateTotal();
});