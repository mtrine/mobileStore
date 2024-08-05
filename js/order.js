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
            console.log(data);
            // Duyệt qua dữ liệu và thêm vào orderContainer
            data.forEach(function(order) {
                var status='';
                if(order.status == "processing"){ 
                    status = "Đang xử lý";
                }
                else if(order.status == "shipping"){
                    status = "Đang giao hàng";
                }
                else{
                    status = "Đã giao hàng";
                }
                var orderItem = `<div class="order-item" data-id="${order.id}">
                    <h3>Mã đơn hàng: ${order.id}</h3>
                    <p>Ngày đặt: ${new Date(order.created_at).toLocaleDateString()}</p>
                     <p>Địa chỉ: ${order.address}</p>
                    <p>Số điện thoại: ${order.phoneNumber}</p>
                    <p>Trạng thái: ${status}</p>
                    <a href="./detail_order.php?id=${order.id}">Xem chi tiết đơn hàng</a>
                </div>`;
                orderContainer.insertAdjacentHTML('beforeend', orderItem);
            });
        })
        .catch(error => {
            console.error('Lỗi khi lấy dữ liệu:', error);
        });
});