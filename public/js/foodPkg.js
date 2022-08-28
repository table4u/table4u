let bg = document.querySelector(".bg");
let close = document.querySelector(".close");

let cancelModal = document.querySelector(".cancel-modal");
let deleteBtn = document.querySelectorAll(".delete");

for (let i = 0; i < deleteBtn.length; i++) {
  deleteBtn[i].addEventListener("click", function () {
    console.log("clicked");

    cancelModal.classList.add("active");
    bg.classList.add("active");
    cancelModal.classList.remove("inactive");
    bg.classList.remove("inactive");
  });
}

function deleteFoodPackage(id) {
  console.log(id, "in");
  //  console.log(reservationId);
  var html = `<div class=" fas fa-times close-cancel"></div>

            <div class="content">
                Are you sure to delete the food package?
            </div>
            
                <div style="display: flex; justify-content: center;">

                    <button name='yes' class="modal-btn" id="confirm-btn" onclick='deletePackage(${id})' style="width: 35%;">
                        Yes
                    </button>
                </div>
            `;
  document.getElementById("cancelRes").innerHTML = html;
  console.log(id, "in");

  let closeCancel = document.querySelector(".close-cancel");

  closeCancel.addEventListener("click", function () {
    console.log("close");
    cancelModal.classList.remove("active");
    bg.classList.remove("active");
    cancelModal.classList.add("inactive");
    bg.classList.add("inactive");
  });
}

//have to code
function deletePackage(id) {
  console.log("yes");
  $.ajax({
    type: "POST",
    url: "http://localhost/gp1/CustomerFoodpackage/deleteFoodpackage/" + id,
    dataType: "json",
    data: {},
    success: function (result) {
      const json = result;
      console.log("Success accepted");

      // console.log(result);
      // cancelModal.classList.remove("active");
      // bg.classList.remove("active");
      // cancelModal.classList.add("inactive");
      // bg.classList.add("inactive");
      location.reload();
    },
    error: function (result) {
      console.log(result);

      alert("Not cancelled");
    },
  });
}
