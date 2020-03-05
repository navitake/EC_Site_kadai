var cartWrap = document.getElementsByClassName('cartWrap')[0];

var toggleButton = document.getElementById('cartToggleButton');

function toggleCart() {
    cartWrap.classList.toggle('cartInvisible');
    toggleButton.classList.toggle('cartInvisible');
}