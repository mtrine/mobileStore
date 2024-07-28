document.addEventListener("DOMContentLoaded", function () {
    let index = 0;
    const slides = document.querySelectorAll('.carousel img');
    const dots = document.querySelectorAll('.carousel-nav div');
    const modal = document.getElementById("loginModal");
    const openModalBtn = document.getElementById("openLoginModal");
    const closeBtn = document.getElementsByClassName("close")[0];
    const brandItems = document.querySelectorAll('.brand-item');
    const totalSlides = slides.length;

    // Function to open modal
    function openModal() {
        modal.style.display = "block";
    }

    // Function to close modal
    function closeModal() {
        modal.style.display = "none";
    }

    // Function to close modal if clicked outside
    function outsideClick(e) {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    }

    // Event listeners for login modal
    if (openModalBtn) {
        openModalBtn.addEventListener("click", openModal);
    }
    if (closeBtn) {
        closeBtn.addEventListener("click", closeModal);
    }
    window.addEventListener("click", outsideClick);

    // Function to show the current slide
    function showSlide(n) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === n);
            dots[i].classList.toggle('active', i === n);
        });
    }

    // Function to go to the next slide
    function nextSlide() {
        index = (index + 1) % totalSlides;
        showSlide(index);
    }

    // Set interval for changing slides
    setInterval(nextSlide, 3000); // Change slide every 3 seconds

    // Event listeners for carousel navigation dots
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            index = i;
            showSlide(index);
        });
    });

    // Function to add click listeners to products
    function addProductClickListeners() {
        const products = document.querySelectorAll('.product');
        products.forEach(product => {
            product.addEventListener('click', (e) => {
                // Kiểm tra xem nhấp chuột có phải là nút 'Thêm vào giỏ hàng' không
                if (!e.target.classList.contains('add-to-cart-button')) {
                    const productId = product.getAttribute('data-id');
                    window.location.href = `detail_product.php?id=${productId}`;
                }
            });
        });
    }

    // Fetch all products
    function fetchAllProducts(page = 1) {
        fetch(`get_all_products.php?page=${page}`)
            .then(response => response.json())
            .then(data => {
                const productsContainer = document.querySelector('.products');
                const paginationContainer = document.querySelector('.pagination');
                
                productsContainer.innerHTML = '';
                data.products.forEach(product => {
                    productsContainer.innerHTML += `
                        <div class="product" data-id="${product.id}">
                            <img src="../images/Iphone15ProMax.jpg">
                            <h2>${product.name}</h2>
                            <p class="new-price">${product.price} đ</p>
                            <button class="add-to-cart-button" data-product-id="${product.id}">Thêm vào giỏ hàng</button>
                        </div>
                    `;
                });

                paginationContainer.innerHTML = '';
                if (page > 1) {
                    paginationContainer.innerHTML += `<a href="home.php?page=${page - 1}">&laquo; Trước</a>`;
                }
                for (let i = 1; i <= data.total_pages; i++) {
                    if (i == page) {
                        paginationContainer.innerHTML += `<span>${i}</span>`;
                    } else {
                        paginationContainer.innerHTML += `<a href="home.php?page=${i}">${i}</a>`;
                    }
                }
                if (page < data.total_pages) {
                    paginationContainer.innerHTML += `<a href="home.php?page=${parseInt(page) + 1}">Tiếp &raquo;</a>`;
                }

                // Add click listeners to newly loaded products
                addProductClickListeners();
            })
            .catch(error => console.error('Error:', error));
    }

    // Initial fetch of all products
    const page = new URLSearchParams(window.location.search).get('page') || 1;
    fetchAllProducts(page);

    // Get products from brand
    brandItems.forEach(item => {
        item.addEventListener('click', function() {
            const brandId = this.getAttribute('data-id');
            fetchProductsByBrand(brandId);
        });
    });

    function fetchProductsByBrand(brandId, page = 1) {
    fetch('get_products_by_brand.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'brand_id=' + brandId + '&page=' + page
        })
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.querySelector('.products');
            const paginationContainer = document.querySelector('.pagination');
            
            productsContainer.innerHTML = '';
            data.products.forEach(product => {
                productsContainer.innerHTML += `
                    <div class="product" data-id="${product.id}">
                        <img src="../images/Iphone15ProMax.jpg">
                        <h2>${product.name}</h2>
                        <p class="new-price">${product.price} đ</p>
                        <button class="add-to-cart-button" data-product-id="${product.id}">Thêm vào giỏ hàng</button>
                    </div>
                `;
            });

            paginationContainer.innerHTML = '';
            if (page > 1) {
                paginationContainer.innerHTML += `<a href="#" class="prev-page" data-page="${page - 1}">&laquo; Trước</a>`;
            }
            for (let i = 1; i <= data.total_pages; i++) {
                if (i == page) {
                    paginationContainer.innerHTML += `<span>${i}</span>`;
                } else {
                    paginationContainer.innerHTML += `<a href="#" class="page-link" data-page="${i}">${i}</a>`;
                }
            }
            if (page < data.total_pages) {
                paginationContainer.innerHTML += `<a href="#" class="next-page" data-page="${parseInt(page) + 1}">Tiếp &raquo;</a>`;
            }

            // Add click listeners to newly loaded products
            addProductClickListeners();
        })
        .catch(error => console.error('Error:', error));
}

    // Add to cart functionality
    function addToCart(productId) {
        fetch('add_to_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'product_id=' + productId
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Add event listeners for Add to Cart buttons
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-to-cart-button')) {
            const productId = e.target.getAttribute('data-product-id');
            e.preventDefault();
            addToCart(productId);
        }
    });
});
