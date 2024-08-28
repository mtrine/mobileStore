document.addEventListener('DOMContentLoaded', async function () {
    const urlParams = new URLSearchParams(window.location.search);
    const orderId = urlParams.get('id');
    const orderContainer = document.querySelector('.row2');
    const response = await fetch('fetch_order_detail.php?id=' + orderId);

    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    const data = await response.json();
    document.querySelector('#id').textContent = orderId;
    document.querySelector('#address').textContent = data[0].address;
    document.querySelector('#phone').textContent = data[0].phoneNumber;
    var status = "";
    if (data[0].status == 'delivery') {
        status = "Đang giao"
    }
    else if (data[0].status == 'delivered') {
        status = "Đã giao"
    }
    else {
        status = "Đang chờ xử lý"
    }
    document.querySelector('#status').textContent = status
    document.querySelector('#id-user').textContent = data[0].user_id;
    document.querySelector('#username').textContent = data[0].username;
    document.querySelector('#email').textContent = data[0].email;

    data.forEach(product => {
        const productItem = document.createElement('div');
        productItem.classList.add('product-item');
        const rowItem = document.createElement('div');
        rowItem.classList.add('row');
        rowItem.innerHTML = `
                    <img src="../images/phonesAndBrandsImages/${product.product_image}" class="product-image" alt="Product Image">
                    <div class="product-info">
                            <div class="row">
                                <p class="product-name">${product.product_name}</p>
                            </div>
                            <div class="row">
                                <p class="amount">Số lượng:</p>
                                <p class="amount-number">${product.quantity}</p>
                            </div>
                            <p class="title">${product.product_price} VND</p>
                        </div>`
        productItem.appendChild(rowItem);
        orderContainer.appendChild(productItem);
    })

})