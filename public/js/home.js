let menubar = document.querySelector("#menu-bar");
let navbar = document.querySelector(".navbar");

menubar.onclick = function () {
  menubar.classList.toggle("fa-times");
  navbar.classList.toggle("active");
  console.log(navbar.classList);
};

window.onscroll = function () {
  menubar.classList.remove("fa-times");
  navbar.classList.remove("active");
};
