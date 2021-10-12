const reservation = document.querySelector(".reservations");
const rev = document.querySelectorAll(".rev");
const foodpackage = document.querySelector(".foodpackage");
const pkg = document.querySelectorAll(".pkg");
const box1 = document.querySelector(".box1");
const box2 = document.querySelector(".box2");

box1.addEventListener("click", () => {
  reservation.classList.toggle("hide");
  for (let i = 0; i < rev.length; i++) {
    rev[i].classList.toggle("hide");
  }
  foodpackage.classList.add("hide");
  for (let i = 0; i < pkg.length; i++) {
    pkg[i].classList.add("hide");
  }
});

box2.addEventListener("click", () => {
  foodpackage.classList.toggle("hide");
  reservation.classList.add("hide");
  for (let i = 0; i < pkg.length; i++) {
    pkg[i].classList.toggle("hide");
  }
  for (let i = 0; i < rev.length; i++) {
    rev[i].classList.add("hide");
  }
});
