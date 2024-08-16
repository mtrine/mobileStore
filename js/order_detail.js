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
document.getElementById('edit-product-button').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('confirmation-dialog').style.display = 'block';
});

document.getElementById('confirm-edit').addEventListener('click', function() {
    // Handle the delete action here
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
    alert('Sản phẩm đã được thêm vào.'); // Replace with actual delete action
});

document.getElementById('cancel-edit').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
});