let update = document.querySelectorAll(".update");
let modal = document.querySelector(".modal");
let bg = document.querySelector(".bg");
let close = document.querySelector(".close");

let cancelModal = document.querySelector(".cancel-modal");
let deleteBtn = document.querySelectorAll(".delete");

let reservationID = document.querySelectorAll("#reservationID");
let cancelYes = document.querySelector("#confirm-btn");
// console.log(reservationID[0].value);
// console.log(cancelYes);

for (let i = 0; i < update.length; i++) {
  update[i].addEventListener("click", function () {
    console.log("clicked");
    modal.classList.add("active");
    bg.classList.add("active");
    modal.classList.remove("inactive");
    bg.classList.remove("inactive");
  });
}

// close.addEventListener("click", function () {
//   console.log("close");
//   modal.classList.remove("active");
//   bg.classList.remove("active");
//   modal.classList.add("inactive");
//   bg.classList.add("inactive");
// });

for (let i = 0; i < deleteBtn.length; i++) {
  deleteBtn[i].addEventListener("click", function () {
    console.log("clicked");
    console.log(reservationID[i].value);

    cancelModal.classList.add("active");
    bg.classList.add("active");
    cancelModal.classList.remove("inactive");
    bg.classList.remove("inactive");
  });
}

function cancelReservation(reservationId) {
  console.log(reservationId);
  var html = `<div class=" fas fa-times close-cancel"></div>

            <div class="content">
                Are you sure to cancel the reservation?
            </div>
            
                <div style="display: flex; justify-content: center;">

                    <button name='yes' class="modal-btn" id="confirm-btn" onclick='updateReservation(${reservationId})' style="width: 35%;">
                        Yes
                    </button>
                </div>
            `;
  document.getElementById("cancelRes").innerHTML = html;

  let closeCancel = document.querySelector(".close-cancel");

  closeCancel.addEventListener("click", function () {
    console.log("close");
    cancelModal.classList.remove("active");
    bg.classList.remove("active");
    cancelModal.classList.add("inactive");
    bg.classList.add("inactive");
  });
}

function updateReservation(reservationId) {
  $.ajax({
    type: "POST",
    url:
      "http://localhost/gp1/CustomerReservations/cancelReservation/" +
      reservationId,
    dataType: "json",
    data: {},
    success: function (result) {
      const json = result;
      console.log("Success accepted");

      console.log(result);
      cancelModal.classList.remove("active");
      bg.classList.remove("active");
      cancelModal.classList.add("inactive");
      bg.classList.add("inactive");
      location.reload();
    },
    error: function (result) {
      alert("Not cancelled");
    },
  });
}
function viewMenuItems(id) {
  console.log(id);
  $.ajax({
    type: "POST",
    url:
      "http://localhost/gp1/CustomerReservations/getMenuItemsByReservation/" +
      id,
    // dataType: "json",
    dataType: "text",

    data: {},
    success: function (result) {
      // const json = result;
      console.log("Success accepted");

      console.log(result);
      bg.classList.add("active");
      bg.classList.remove("inactive");
      modal.classList.add("active");
      modal.classList.remove("inactive");
      // bg.document.getElementById("cancelRes").innerHTML = html;
      $("#menu-items").html(result);

      let closeCancel = document.querySelector(".close");

      closeCancel.addEventListener("click", function () {
        console.log("close");
        modal.classList.remove("active");
        bg.classList.remove("active");
        modal.classList.add("inactive");
        bg.classList.add("inactive");
      });
    },
    error: function (result) {
      console.log(result);
      alert("Not asas");
    },
  });
}
