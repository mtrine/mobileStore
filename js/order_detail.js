document.addEventListener('DOMContentLoaded', function() {
    // Lấy order_id từ URL
    const urlParams = new URLSearchParams(window.location.search);
    const orderId = urlParams.get('id');

    if (orderId) {
        document.getElementById('orderId').textContent = `Mã đơn hàng: ${orderId}`;

        // Gọi fetch API để lấy dữ liệu từ file fetch_order_details.php
        fetch(`fetch_detail_order.php?order_id=${orderId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                var orderItems = document.getElementById('orderItems');
                var totalPrice = 0;

                // Xóa các mục chi tiết đơn hàng hiện có (nếu có)
                orderItems.innerHTML = '';

                // Duyệt qua dữ liệu và thêm vào orderItems
                data.forEach(function(item) {
                    var itemHtml = `<div class="detail-order-item">
                        <img src="../images/phonesAndBrandsImages/${item.image}" alt="${item.product_name}">
                        <div>
                            <h3>${item.product_name}</h3>
                            <p class="price">${Number(item.price).toLocaleString()} đ</p>
                        </div>
                        <div>
                            <p>X${item.quantity}</p>
                        </div>
                    </div>`;
                    orderItems.insertAdjacentHTML('beforeend', itemHtml);
                    totalPrice += item.price * item.quantity;
                });

                // Cập nhật tổng tiền
                document.getElementById('totalPrice').textContent = `${totalPrice.toLocaleString()} đ`;
            })
            .catch(error => {
                console.error('Lỗi khi lấy dữ liệu:', error);
            });
    } else {
        console.error('Không có order_id trong URL');
    }
});
