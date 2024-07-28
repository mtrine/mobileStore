// Hàm để tính tổng giá
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

// Hàm để cập nhật số lượng sản phẩm trên server
function updateCart(productId, quantity) {
    fetch('update_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'product_id=' + encodeURIComponent(productId) + '&quantity=' + encodeURIComponent(quantity)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateTotal(); // Cập nhật tổng giá sau khi thay đổi số lượng
        } else {
            alert('Cập nhật số lượng thất bại: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', () => {
    // Thay đổi số lượng sản phẩm
    document.querySelectorAll('.cart-item input[type="number"]').forEach(input => {
        input.addEventListener('input', function() {
            const productId = this.closest('.cart-item').querySelector('.delete-btn').dataset.id;
            const quantity = this.value;
            if (quantity < 1) {
                this.value = 1; // Đảm bảo số lượng tối thiểu là 1
            }
            updateCart(productId, this.value);
            updateTotal();
        });
    });

    // Cập nhật tổng giá khi trang được tải
    updateTotal();

    // Xóa sản phẩm khỏi giỏ hàng
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const cartItemId = this.dataset.id;
            fetch('delete_cart_item.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'id=' + encodeURIComponent(cartItemId)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.closest('.cart-item').remove();
                    updateTotal();
                } else {
                    alert('Xóa sản phẩm thất bại.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Xác nhận đơn hàng
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
        })
        .catch(error => console.error('Error:', error));
    });

    // Cập nhật tổng giá khi trang được tải
    updateTotal();
});
