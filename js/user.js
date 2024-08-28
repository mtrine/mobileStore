document.getElementById('delete-button').addEventListener('click', function () {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('confirmation-dialog').style.display = 'block';
});

document.getElementById('confirm-delete').addEventListener('click', function () {
    // Handle the delete action here
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
    // Replace with actual delete action
});

document.getElementById('cancel-delete').addEventListener('click', function () {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
});

document.addEventListener('DOMContentLoaded', async function () {
    try {
        // Gửi yêu cầu GET đến fetch_users.php
        const response = await fetch('fetchUser.php');

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
        data.forEach(user => {
            if (user.admin == 1) {
                return;
            }
            const userItem = document.createElement('tr');
            userItem.innerHTML = `<td><input type="checkbox" value="${user.id}"></td>
                        <td>${user.id}</td>
                        <td>${user.username}</td>
                        <td>${user.email}</td>`
            table.appendChild(userItem);
        })
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }
});

document.getElementById('confirm-delete').addEventListener('click', async function () {
    const checkboxes = document.querySelectorAll('#userTable input[type="checkbox"]:checked');
    if (checkboxes.length == 0) {
        alert('Không có người dùng nào được chọn');
        return;
    }
    checkboxes.forEach(async checkbox => {
       
        const response = await fetch('deleteUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: "id=" + encodeURIComponent(checkbox.value)

        });

        
        if (!response.ok) {
            alert('Có lỗi xảy ra');
            return;
        }

    });
    alert('Người dùng đã chọn đã được xóa');
    location.reload();
    return;
})