document.addEventListener("DOMContentLoaded", function () {
    let index = 0;
    const slides = document.querySelectorAll('.carousel img');
    const dots = document.querySelectorAll('.carousel-nav div');
    const products = document.querySelectorAll('.product');
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

    // Event listener for signup form validation
    const signupForm = document.querySelector('form .form-signup');
    if (signupForm) {
        signupForm.addEventListener('submit', function (event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
        
            if (password !== confirmPassword) {
                alert('Mật khẩu và xác nhận mật khẩu không khớp.');
                event.preventDefault();
            }
        });
    }

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

    // Event listeners for product clicks
    products.forEach(product => {
        product.addEventListener('click', () => {
            const productId = product.getAttribute('data-id');
            window.location.href = `detail_product.php?id=${productId}`;
        });
    });

    //Get products from brand
    brandItems.forEach(item => {
        item.addEventListener('click', function() {
            const brandId = this.getAttribute('data-id');

            fetchProductsByBrand(brandId);
        });
    });

    function fetchProductsByBrand(brandId) {
        fetch('get_products_by_brand.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'brand_id=' + brandId
            })
            .then(response => response.text())
            .then(data => {
                document.querySelector('.products').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }
});
