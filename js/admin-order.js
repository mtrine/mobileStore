document.getElementById('delivering-button').addEventListener('click', function() {
    document.getElementById('overlay-delivery').style.display = 'block';
    document.getElementById('confirmation-dialog-delivery').style.display = 'block';
});

document.getElementById('delivered-button').addEventListener('click', function() {
    document.getElementById('overlay-delivered').style.display = 'block';
    document.getElementById('confirmation-dialog-delivered').style.display = 'block';
});

document.getElementById('confirm-delivered').addEventListener('click', function() {

    document.getElementById('overlay-delivered').style.display = 'none';
    document.getElementById('confirmation-dialog-delivered').style.display = 'none';
    updateStatusOrder('delivered');
});

document.getElementById('confirm-delivery').addEventListener('click', function() {

    document.getElementById('overlay-delivery').style.display = 'none';
    document.getElementById('confirmation-dialog-delivery').style.display = 'none';
    updateStatusOrder('delivery');

});


document.getElementById('cancel-delivery').addEventListener('click', function() {
    document.getElementById('overlay-delivery').style.display = 'none';
    document.getElementById('confirmation-dialog-delivery').style.display = 'none';
});

document.getElementById('cancel-delivered').addEventListener('click', function() {
    document.getElementById('overlay-delivered').style.display = 'none';
    document.getElementById('confirmation-dialog-delivered').style.display = 'none';
}); 

document.querySelectorAll('.see-detail').forEach(button => {
    button.addEventListener('click', function() {
        const orderId = this.getAttribute('data-id');
        window.location.href = `../admin/order-detail.php?id=${orderId}`;
    });
});

document.addEventListener('DOMContentLoaded', async function() {
    try {
        // Gửi yêu cầu GET đến fetch_users.php
        const response = await fetch('fetch_order.php');

        // Kiểm tra xem yêu cầu có thành công không
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        // Chuyển đổi phản hồi từ JSON
        const data = await response.json();

        // Xử lý dữ liệu người dùng
        console.log(data); // In ra dữ liệu người dùng để kiểm tra

        const container = document.querySelector('.container');
        const table = container.querySelector('table');
        data.forEach(order => {
            const orderItem = document.createElement('tr');
            var status=""
            if(order.status=='delivery'){
                status="Đang giao"
            }
            else if(order.status=='delivered'){
                status="Đã giao"
            }
            else {
                status="Đang chờ xử lý"
            }
             orderItem .innerHTML = `<td><input type="checkbox" value="${order.id}"></td>
                        <td>${order.id}</td>
                        <td>${order.user_id}</td>
                        <td>${order.address}</td>
                        <td>${order.phoneNumber}</td>
                        <td>${status}</td>
                        <td><a class="see-detail" href="order-detail.php?id=${order.id}">Xem chi tiết</a></td>`
            table.appendChild( orderItem );
        })
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }
})

async function updateStatusOrder(status) {
    const checkboxes = document.querySelectorAll('#orderTable input[type="checkbox"]:checked');
    if (checkboxes.length == 0) {
        alert('Không có đơn hàng nào được chọn');
        return;
    }
    checkboxes.forEach(async checkbox => {
    console.log(checkbox.value);
        const response = await fetch('update_status_order.php?id='+checkbox.value, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: "status=" + encodeURIComponent(status)

        });

        
        if (!response.ok) {
            alert('Có lỗi xảy ra');
            return;
        }

    });
    alert('Thay đổi thành công trạng thái đơn hàng');
    location.reload();
    return;
}