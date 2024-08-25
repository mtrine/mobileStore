document.getElementById('delivering-button').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('confirmation-dialog').style.display = 'block';
});

document.getElementById('delivered-button').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('confirmation-dialog').style.display = 'block';
});

document.getElementById('confirm').addEventListener('click', function() {

    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
    alert('Thay đổi thành công trạng thái đơn hàng');
});

document.getElementById('cancel').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
});

document.querySelectorAll('.see-detail').forEach(button => {
    button.addEventListener('click', function() {
        const orderId = this.getAttribute('data-id');
        window.location.href = `../admin/order-detail.php?id=${orderId}`;
    });
});