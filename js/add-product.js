document.getElementById('file-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const uploadButton = document.querySelector('.upload-button');
    const selectedImage = document.getElementById('selected-image');
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            selectedImage.src = e.target.result;
            selectedImage.style.display = 'block';
            uploadButton.classList.add('uploaded'); // Thêm lớp khi ảnh đã được tải lên
        };
        
        reader.readAsDataURL(file);
    }
});
