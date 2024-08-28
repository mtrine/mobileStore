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
});

document.getElementById('cancel-edit').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('confirmation-dialog').style.display = 'none';
});

document.querySelectorAll('.return').forEach(button => {
    button.addEventListener('click', function() {
        window.location.href = `list-product.php`;
    });
});

var image=""
document.addEventListener('DOMContentLoaded', async function() {
    const urlParams = new URLSearchParams(window.location.search);
    const Id = urlParams.get('id');
    const productId=document.getElementById('id');
    const productName=document.getElementById('product-name');
    const productColor=document.getElementById('color');
    const productScreen= document.getElementById('screen');
    const productOS=document.getElementById('os');
    const productRearCamera=document.getElementById('rear-camera');
    const productFrontCamera=document.getElementById('front-camera');
    const productCPU=document.getElementById('cpu');
    const productRAM=document.getElementById('ram');
    const productInternalMemory=document.getElementById('internal-memory');
    const productSDCard=document.getElementById('sd-card');
    const productBattery=document.getElementById('battery');
    const productPrice=document.getElementById('price');
    const productImage=document.getElementById('selected-image');
    const selectBrand=document.getElementById('brands');
    try {
        
        const response = await fetch('fetch_product_detail.php?id='+Id);
        const responseBrands=await fetch('fetch_brands.php');

        // Kiểm tra xem yêu cầu có thành công không
        if (!response.ok||!responseBrands.ok) {
            throw new Error('Network response was not ok');
        }

        // Chuyển đổi phản hồi từ JSON
        const data = await response.json();
        const dataBrands=await responseBrands.json();
    
        console.log(dataBrands);
        productId.innerText=data.id;
        productName.value=data.name;
        productColor.value=data.color;
        productScreen.value=data.screen;
        productOS.value=data.operating_system;
        productRearCamera.value=data.rear_camera;
        productFrontCamera.value=data.front_camera;
        productCPU.value=data.cpu;
        productRAM.value=data.ram;
        productInternalMemory.value=data.internal_storage;
        productSDCard.value=data.memory_card;
        productBattery.value=data.battery_capacity        ;
        productPrice.value=data.price;
        productImage.src="../images/phonesAndBrandsImages/"+data.image;
        image=data.image;
        dataBrands.forEach(brand => {
            var option = document.createElement('option');
            option.value = brand.id;
            option.text = brand.name;
            if(brand.id==data.brand_id){
                option.selected=true;
            }
            selectBrand.appendChild(option);
        });
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }
});

document.getElementById('confirm-edit').addEventListener('click', async function() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    const productName = document.getElementById('product-name').value;
    const productColor = document.getElementById('color').value;
    const productScreen = document.getElementById('screen').value;
    const productOS = document.getElementById('os').value;
    const productRearCamera = document.getElementById('rear-camera').value;
    const productFrontCamera = document.getElementById('front-camera').value;
    const productCPU = document.getElementById('cpu').value;
    const productRAM = document.getElementById('ram').value;
    const productInternalMemory = document.getElementById('internal-memory').value;
    const productSDCard = document.getElementById('sd-card').value;
    const productBattery = document.getElementById('battery').value;
    const productPrice = document.getElementById('price').value;
    const selectBrand = document.getElementById('brands').value;
    const fileInput = document.getElementById('file-input');
    const file = fileInput.files[0];

    // Tạo đối tượng FormData
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

    try {
        const response = await fetch('update_product.php?id='+id, {
            method: 'POST',
            body: formData
        });

        const result = await response.text(); // Hoặc .json() nếu server trả về JSON

        if (response.ok) {
            alert('Đã thay đổi thông tin sản phẩm.'); 
            location.reload();
        } else {
            alert('Error updating product: ' + result);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while updating the product.');
    }
});
