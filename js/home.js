var selectedBrandId = null;
document.addEventListener("DOMContentLoaded", function () {
    let index = 0;
    const slides = document.querySelectorAll('.carousel img');
    const dots = document.querySelectorAll('.carousel-nav div');
    const modal = document.getElementById("loginModal");
    const openModalBtn = document.getElementById("openLoginModal");
    const closeBtn = document.getElementsByClassName("close")[0];
    const brandItems = document.querySelectorAll('.brand-item');
    const priceFilters = document.querySelectorAll('input[name="price"]');
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
                // Check if the click is not on the 'Add to Cart' button
                if (!e.target.classList.contains('add-to-cart-button')) {
                    const productId = product.getAttribute('data-id');
                    window.location.href = `detail_product.php?id=${productId}`;
                }
            });
        });
    }

    // Function to format price
    function formatPrice(price) {
        let formattedPrice = parseFloat(price).toFixed(0);
        formattedPrice = formattedPrice.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        formattedPrice += ' đ';
        return formattedPrice;
    }

    // Function to update product prices
    function updateProductPrices() {
        const priceElements = document.querySelectorAll('.new-price');
        priceElements.forEach(element => {
            const rawPrice = element.textContent.trim().replace(' đ', '');
            const formattedPrice = formatPrice(rawPrice);
            element.textContent = formattedPrice;
        });
    }

    // Fetch all products
    function fetchAllProducts(page = 1, priceRange = 'all') {
        fetch(`get_all_products.php?page=${page}&price=${priceRange}`)
            .then(response => response.json())
            .then(data => {
                const productsContainer = document.querySelector('.products');
                const paginationContainer = document.querySelector('.pagination');
                
                productsContainer.innerHTML = '';
                data.products.forEach(product => {
                    console.log(product.isInStock);
                    const addButton = product.isInStock ==1
                        ? `<button class="add-to-cart-button" data-product-id="${product.id}">Thêm vào giỏ hàng</button>` 
                        : `<button class="add-to-cart-button" disabled style="background-color: gray; cursor: not-allowed;">Đã hết hàng</button>`;
                    
                    productsContainer.innerHTML += `
                        <div class="product" data-id="${product.id}">
                            <img src="../images/phonesAndBrandsImages/${product.image}">
                            <h2>${product.name}</h2>
                            <p class="new-price">${product.price} đ</p>
                            ${addButton} <!-- Render the appropriate button -->
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
    
                // Update prices format
                updateProductPrices();
            })
            .catch(error => console.error('Error:', error));
    }
    

    // Fetch products based on selected price range and page
    const page = new URLSearchParams(window.location.search).get('page') || 1;
    const priceRange = new URLSearchParams(window.location.search).get('price') || 'all';
    fetchAllProducts(page, priceRange);

    document.getElementById('get-all').addEventListener('click', function() {
    fetchAllProducts(page, priceRange);
        
    })
    // Get products from brand
    brandItems.forEach(item => {
        item.addEventListener('click', function() {
            const brandId = this.getAttribute('data-id');
            selectedBrandId = brandId;
            fetchProductsByBrand( selectedBrandId);
        });
    });

    function fetchProductsByBrand(brandId, page = 1,priceRange = 'all') {
        fetch('get_products_by_brand.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `brand_id=${brandId}&price=${priceRange}&page=${page}`
        })
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.querySelector('.products');
            const paginationContainer = document.querySelector('.pagination');
            
            productsContainer.innerHTML = '';
            data.products.forEach(product => {
                productsContainer.innerHTML += `
                    <div class="product" data-id="${product.id}">
                        <img src="../images/phonesAndBrandsImages/${product.image}">
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
    
            // Update prices format
            updateProductPrices();
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

    // Add event listeners for Add to Cart buttons
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-to-cart-button')) {
            const productId = e.target.getAttribute('data-product-id');
            console.log('Thêm vào giỏ hàng: ' + productId); // Thêm dòng này để kiểm tra
            e.preventDefault();
            addToCart(productId);
        }
    });

    // Add event listeners for price filter radio buttons
    priceFilters.forEach(filter => {
        filter.addEventListener('change', function() {
            const selectedPriceRange = this.value;
            if (selectedBrandId) {
                fetchProductsByBrand(selectedBrandId,1, selectedPriceRange);
            } else {
                fetchAllProducts(1, selectedPriceRange); // Nếu không có thương hiệu đã chọn, lấy tất cả sản phẩm
            }
        });
    });

    // Add event listeners for pagination links
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('page-link')) {
            e.preventDefault();
            const page = e.target.getAttribute('data-page');
            fetchAllProducts(page);
        }
        if (e.target.classList.contains('prev-page')) {
            e.preventDefault();
            const page = e.target.getAttribute('data-page');
            fetchAllProducts(page);
        }
        if (e.target.classList.contains('next-page')) {
            e.preventDefault();
            const page = e.target.getAttribute('data-page');
            fetchAllProducts(page);
        }
    });

    
});
