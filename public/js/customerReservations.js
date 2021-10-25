let update = document.querySelectorAll(".update");
let modal = document.querySelector(".modal");
let bg = document.querySelector(".bg");
let close = document.querySelector(".close");

let cancelModal = document.querySelector(".cancel-modal"); 
let deleteBtn = document.querySelectorAll(".delete"); 
let closeCancel = document.querySelector(".close-cancel");

for (let i = 0; i < update.length; i++) {
  update[i].addEventListener("click", function () {
    console.log("clicked");
    modal.classList.add("active");
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

for (let i = 0; i < deleteBtn.length; i++) {
  deleteBtn[i].addEventListener("click", function () {
    console.log("clicked");
    cancelModal.classList.add("active");
    bg.classList.add("active");
    cancelModal.classList.remove("inactive");
    bg.classList.remove("inactive");
  });
}

closeCancel.addEventListener("click", function () {
  console.log("close");
  cancelModal.classList.remove("active");
  bg.classList.remove("active");
  cancelModal.classList.add("inactive");
  bg.classList.add("inactive");
});
