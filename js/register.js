document.addEventListener("DOMContentLoaded", function() {
    const signupForm = document.querySelector('.form-signup');
    if (signupForm) {
        console.log('Form found and event listener attached');
        signupForm.addEventListener('submit', function(event) {
            const password = document.getElementById('signup-password').value;
            const confirmPassword = document.getElementById('signup-confirm-password').value;
            console.log("Password: " + password);
            console.log("Confirm Password: " + confirmPassword);
            if (password !== confirmPassword) {
                alert('Mật khẩu và xác nhận mật khẩu không khớp.');
                event.preventDefault();
            }
        });
    } else {
        console.log('Form not found');
    }
});
