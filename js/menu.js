let men = document.querySelector('#menu');
let navlist = document.querySelector('.list');

men.onclick = () => {
    men.classList.toggle('menu');
    navlist.classList.toggle('open');
}