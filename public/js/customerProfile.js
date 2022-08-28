// const btn = document.querySelector(".submitBtn");
const post = document.querySelector(".post");
const edit = document.querySelector(".edit");
const feedbackcontent = document.querySelector(".feedback-content");
const exit = document.querySelector(".close");
const feedbackClose = document.getElementById("feedback-close");
const feedbackPopup = document.getElementById("popup");
const container = document.querySelector(".container");
const feedbackWindow = document.querySelector(".btn");
let blur = document.getElementById("blur");
let popup = document.getElementById("popup");

let modal = document.getElementById("modal-popup");
const modalContent = document.querySelector(".modal-info");
// const modalClose = document.querySelector(".close-edit");

feedbackWindow.onclick = () => {
  blur.classList.toggle("active");
  popup.classList.add("active");
  feedbackPopup.style.display = "block";
  feedbackcontent.style.display = "block";
};
edit.onclick = () => {
  blur.classList.toggle("active");
  modal.classList.add("active");
  modalContent.style.display = "block";
};

// modalClose.onclick = () => {
//   blur.classList.toggle("active");
//   modal.classList.remove("active");
//   modalContent.style.display = "block";
// };
// btn.onclick = () => {
//   feedbackcontent.style.display = "none";
//   post.style.display = "block";
//   return false;
// };

exit.onclick = () => {
  console.log("exit");
  feedbackcontent.style.display = "none";
  post.style.display = "none";
  feedbackPopup.style.display = "none";
  blur.classList.toggle("active");
  popup.classList.remove("active");
  return false;
};

feedbackClose.onclick = () => {
  feedbackPopup.style.display = "none";
  post.style.display = "none";
  blur.classList.toggle("active");
  popup.classList.toggle("active");
  return false;
};
