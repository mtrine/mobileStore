document.getElementById('file-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const uploadButton = document.querySelector('.upload-button');
    const selectedImage = document.getElementById('selected-image');
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            selectedImage.src = e.target.result;
            selectedImage.style.display = 'block';
            uploadButton.classList.add('uploaded');
        };
        
        reader.readAsDataURL(file);
    }

});


document.addEventListener('DOMContentLoaded', function() {
    const defaultImageUrl = '../images/iphone15.png';
    // Pre-fill the input fields
    document.getElementById('product-name').value = 'iPhone 15';
    document.getElementById('color').value = 'Pink';
    document.getElementById('screen').value = '6.1" Super Retina XDR OLED';
    document.getElementById('os').value = 'iOS 17';
    document.getElementById('rear-camera').value = '48MP + 12MP';
    document.getElementById('front-camera').value = '12MP';
    document.getElementById('cpu').value = 'A16 Bionic';
    document.getElementById('ram').value = '6GB';
    document.getElementById('internal-memory').value = '128GB';
    document.getElementById('sd-card').value = 'No';
    document.getElementById('battery').value = '3349mAh';
    document.getElementById('price').value = '19990000';
    const imageElement = document.getElementById('selected-image');
    if (imageElement) {
        imageElement.src = defaultImageUrl;
    }
});

document.getElementById('edit-product-button').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('confirmation-dialog').style.display = 'block';
});

document.getElementById('confirm-edit').addEventListener('click', function() {
    // Handle the delete action here
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
    alert('Đã thay đổi thông tin sản phẩm.'); // Replace with actual delete action
});

document.getElementById('cancel-edit').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
});

document.querySelectorAll('.return').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-id');
        window.location.href = `list-product.php`;
    });
});