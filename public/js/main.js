$(document).ready(function() {
    $('.navbar-toggler').on('click', function(e) {
        alert ('test')
        $('.sidebar').toggleClass("mini-sidebar");    e.preventDefault();
        });
    });
