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

document.querySelectorAll('.see-detail').forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.getAttribute('data-id');
        window.location.href = `product-detail.php?id=${productId}`;
    });
});

document.addEventListener('DOMContentLoaded', async function () {
    try {
        const container = document.querySelector('.container');
        const table = container.querySelector('table');
        const response = await fetch('fetch_list_product.php');

        // Kiểm tra xem yêu cầu có thành công không
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        // Chuyển đổi phản hồi từ JSON
        const data = await response.json();
        console.log(data);
        data.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><input type="checkbox" value="${product.id}"></td>
                    <td>${product.id}</td>
                    <td>
                        <image src="../images/phonesAndBrandsImages/${product.image}" class="product-image"></image>
                    </td>
                    <td>${product.name}</td>
                    <td>${product.brand_name}</td>
                    <td>${product.price}</td>
                    <td><a class="see-detail" href="product-detail.php?id=${product.id}">Xem chi tiết</a></td>
                `
            table.appendChild(row);
        })
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }
})

document.getElementById('confirm-delete').addEventListener('click', async function () {
    const checkboxes = document.querySelectorAll('#productTable input[type="checkbox"]:checked');

    if (checkboxes.length == 0) {
        alert('Không có sản phẩm nào được chọn');
        return;
    }
    checkboxes.forEach(async checkbox => {

        const response = await fetch('delete_product.php', {
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
    alert('Sản phẩm được chọn đã được xóa');
    location.reload();
    return;
})

document.getElementById('update-button').addEventListener('click', function () {
    const checkboxes = document.querySelectorAll('#productTable input[type="checkbox"]:checked');

    if (checkboxes.length == 0) {
        alert('Không có sản phẩm nào được chọn');
        return;
    }
    checkboxes.forEach(async checkbox => {

        const response = await fetch('update_status_product.php?id='+checkbox.value, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
        });

        if (!response.ok) {
            alert('Có lỗi xảy ra');
            return;
        }

    });
    alert('Sản phẩm được chọn đã được cập nhật');
    location.reload();
    return;
    // Create an array of fetch requests
   
});

