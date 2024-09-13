const sidebtn = document.querySelector('#sidebtn');
const sidebar = document.querySelector('#sidebar');
const content = document.querySelector('#content');

sidebtn.addEventListener('click', () => {
    if (sidebtn.classList.contains('rotate-90')) {
        sidebtn.classList.remove('rotate-90');
        sidebtn.classList.add('rotate-0');
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
        content.classList.remove('translate-x-0');
        content.classList.add('-translate-x-[12.31%]');
    } else {
        sidebtn.classList.add('rotate-90');
        sidebtn.classList.remove('rotate-0');
        sidebar.classList.add('translate-x-0');
        sidebar.classList.remove('-translate-x-full');
        content.classList.add('translate-x-0');
        content.classList.remove('-translate-x-[12.31%]');
    }
});


$(document).ready(function () {
    // JQuery for toggle sub menus
    $(".sub-btn").click(function () {
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate-90');
    });
});