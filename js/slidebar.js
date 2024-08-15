document.addEventListener('DOMContentLoaded', function() {
    console.log('Script loaded');

    document.querySelectorAll('.toggle-submenu').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault();
            var submenu = this.nextElementSibling;
            if (submenu.style.display === "block") {
                submenu.style.display = "none";
            } else {
                submenu.style.display = "block";
            }
        });
    });   
});