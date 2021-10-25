let table = document.querySelectorAll(".table");
let details = document.querySelectorAll(".table-det");
let bookNow = document.querySelectorAll(".bookNow");
let modal = document.querySelector(".modal");
let bg = document.querySelector(".bg");
let close = document.querySelector(".close");

for (let i = 0; i < table.length; i++) {
  table[i].addEventListener("click", function () {
    console.log(table[i]);
    console.log(details[i]);
    for (let j = 0; j < table.length; j++) {
      table[j].classList.remove("select");
      details[j].classList.add("inactive");
    }
    table[i].classList.add("select");
    details[i].classList.add("active");
    details[i].classList.remove("inactive");
  });
}

for (let i = 0; i < table.length; i++) {
  bookNow[i].addEventListener("click", function () {
    console.log("clicked");
    modal.classList.add("active");
    console.log("ererer");
    bg.classList.add("active");

    modal.classList.remove("inactive");
    bg.classList.remove("inactive");
  });
}

close.addEventListener("click", function () {
  console.log("close");
  modal.classList.remove("active");
  bg.classList.remove("active");
  modal.classList.add("inactive");
  bg.classList.add("inactive");
});

// modal.addEventListener("click", function () {
//   console.log("modal");
//   modal.classList.remove("active");
//   bg.classList.remove("active");
//   modal.classList.add("inactive");
//   bg.classList.add("inactive");
// });
