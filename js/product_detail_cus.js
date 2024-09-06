document.addEventListener('DOMContentLoaded', function() {
    function addToCart(productId) {
        fetch('add_to_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `product_id=${productId}`
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
        });
    }

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-to-cart-button')) {
            const productId = e.target.getAttribute('data-product-id');
            console.log('Thêm vào giỏ hàng: ' + productId); // Thêm dòng này để kiểm tra
            e.preventDefault();
            addToCart(productId);
        }
    });
});