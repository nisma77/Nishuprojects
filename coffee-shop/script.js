const header = document.querySelector('header');
if (header) {
  function fixedNavbar() {
    header.classList.toggle('scroll', window.pageYOffset > 0);
  }
  fixedNavbar();
  window.addEventListener('scroll', fixedNavbar);
}

let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

if (menu) {
menu.addEventListener('click', function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
});
}
userBtn.addEventListener('click', function(){
    let userBox = document.querySelector('.user-Box');
    if (userBox) {
    userBox.classList.toggle('active');
    }
});


