document.addEventListener('DOMContentLoaded', function() {
    
    fetch('fetch_orders.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            var orderContainer = document.getElementById('orderContainer');

            // Xóa các đơn hàng hiện có (nếu có)
            orderContainer.innerHTML = '';

            // Duyệt qua dữ liệu và thêm vào orderContainer
            data.forEach(function(order) {
                var orderItem = `<div class="order-item" data-id="${order.id}">
                    <h3>Mã đơn hàng: ${order.id}</h3>
                    <p>Ngày đặt: ${new Date(order.created_at).toLocaleDateString()}</p>
                    <p>Trạng thái: ${order.status}</p>
                    <a href="./detail_order.php?id=${order.id}">Xem chi tiết đơn hàng</a>
                </div>`;
                orderContainer.insertAdjacentHTML('beforeend', orderItem);
            });
        })
        .catch(error => {
            console.error('Lỗi khi lấy dữ liệu:', error);
        });
});