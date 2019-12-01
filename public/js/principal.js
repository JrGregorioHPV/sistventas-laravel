/*
    Materialize Javascript
    2019 - Jr. Gregorio H. Pineda V. 
*/
document.addEventListener('DOMContentLoaded', function() {
    /* NavBar */
    var NavBar = document.querySelectorAll('.sidenav');
    var NavBar_instances = M.Sidenav.init(NavBar);

    /* Dropdown Nav */
    var dropdownNav = document.querySelectorAll('.dropdown-trigger');
    var dropdownNavOptions = {
        'hover': true
    }
    var dropdownNav_instances = M.Dropdown.init(dropdownNav, dropdownNavOptions);

    /* Slider */
    var slider = document.querySelectorAll('.slider');
    var sliderOptions = {
        'indicators': false,
        'height': 300,
        'duration': 400,
        'interval': 6000
    }
    var slider_instances = M.Slider.init(slider, sliderOptions);

    /* Tooltips */
    var tooltips = document.querySelectorAll('.tooltipped');
    var tooltips_instances = M.Tooltip.init(tooltips);
});

// jQuery
