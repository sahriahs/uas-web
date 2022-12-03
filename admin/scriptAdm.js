const menu = document.getElementById('menu-label');
const sidebar = document.getElementsByClassName('sidebar')[0];
const content = document.getElementsByClassName('main-content')[0];

menu.addEventListener('click',function() {
  sidebar.classList.toggle('hide');
  content.classList.toggle('hide');
})

// const textarea = document.querySelector("textarea");
// textarea.addEventListener("keyup", e =>{
//   textarea.style.height = "auto";
//   let scHeight = e.target.scrolHeight;
//   textarea.style.height = `${scHeight}px`;
// })