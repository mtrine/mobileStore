document.getElementById('delete-button').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('confirmation-dialog').style.display = 'block';
});

document.getElementById('confirm-delete').addEventListener('click', function() {
    // Handle the delete action here
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
    alert('Sản phẩm đã được xóa.'); // Replace with actual delete action
});

document.getElementById('cancel-delete').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
});

document.querySelectorAll('.see-detail').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-id');
        window.location.href = `product-detail.php?id=${productId}`;
    });
});