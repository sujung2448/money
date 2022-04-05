const toogleBtn = document.querySelector('.navbar_toogleBtn');
const item = document.querySelector('.navbar_item');

toogleBtn.addEventListener('click', () => {
    item.classList.toggle('active');
});

