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
document.getElementById('add-product-button').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('confirmation-dialog').style.display = 'block';
});

document.getElementById('confirm-add').addEventListener('click', function() {
    // Handle the delete action here
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
    // Replace with actual delete action
});

document.getElementById('cancel-add').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
});

document.addEventListener('DOMContentLoaded', async function() {
    const responseBrands=await fetch('fetch_brands.php');
    const dataBrands=await responseBrands.json();
    const selectBrand=document.getElementById('brands');
    dataBrands.forEach(brand => {
        var option = document.createElement('option');
        option.value = brand.id;
        option.text = brand.name;
        selectBrand.appendChild(option);
    });
})

document.getElementById('confirm-add').addEventListener('click', async function() {
    const productName = document.getElementById('name-product').value;
    const productColor = document.getElementById('color-product').value;
    const productScreen = document.getElementById('screen-product').value;
    const productOS = document.getElementById('os-product').value;
    const productRearCamera = document.getElementById('rear-cam-product').value;
    const productFrontCamera = document.getElementById('front-cam-product').value;
    const productCPU = document.getElementById('cpu').value;
    const productRAM = document.getElementById('ram').value;
    const productInternalMemory = document.getElementById('internal_storage').value;
    const productSDCard = document.getElementById('memory_card').value;
    const productBattery = document.getElementById('battery_capacity').value;
    const productPrice = document.getElementById('price').value;
    const selectBrand = document.getElementById('brands').value;
    const fileInput = document.getElementById('file-input');
    const file = fileInput.files[0];

    if (!productName || !productColor || !productScreen || !productOS || !productRearCamera || !productFrontCamera ||
        !productCPU || !productRAM || !productInternalMemory || !productSDCard || !productBattery || !productPrice ||
        !selectBrand) {
        alert('Vui lòng điền đầy đủ thông tin sản phẩm.');
        return; // Dừng lại nếu có trường bị bỏ trống
    }

    const formData = new FormData();
    formData.append('name', productName);
    formData.append('color', productColor);
    formData.append('screen', productScreen);
    formData.append('operating_system', productOS);
    formData.append('rear_camera', productRearCamera);
    formData.append('front_camera', productFrontCamera);
    formData.append('cpu', productCPU);
    formData.append('ram', productRAM);
    formData.append('internal_storage', productInternalMemory);
    formData.append('memory_card', productSDCard);
    formData.append('battery_capacity', productBattery);
    formData.append('price', productPrice);
    formData.append('brand_id', selectBrand);

    // Nếu có tệp hình ảnh, thêm vào FormData
    if (file) {
        formData.append('image', file);
    }
    else {
        alert('Vui lòng chọn hình ảnh sản phẩm.');
        return;
    }

    
   

    try {
        const response = await fetch('add-product-database.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.text(); // Hoặc .json() nếu server trả về JSON

        if (response.ok) {
            alert('Thêm sản phẩm thành công.'); 
            location.reload();
        } else {
            alert('Error updating product: ' + result);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while updating the product.');
    }
})