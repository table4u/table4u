let table = document.querySelectorAll(".table");
let details = document.querySelector(".table-det");
let bookNow = document.querySelector(".bookNow");
let modal = document.querySelector(".modal");
let bg = document.querySelector(".bg");
let close = document.querySelector(".close");
let tableHeading = document.querySelector(".table-heading");
let bookNowa = document.querySelectorAll(".bookNow");
console.log(bookNowa);
var availability;

//console.log(tableNo);
for (let i = 0; i < table.length; i++) {
  table[i].addEventListener("click", function () {
    // console.log(table[i]);
    availability = table[i].classList.contains("available");
  });
}
//get table details using ajax
var tableNo;
function tableDetails(
  tablenumber,
  reservationDate,
  reservationTime,
  nextAvailableTime
) {
  console.log("clicked table");
  console.log(tablenumber, reservationTime);
  console.log(reservationDate);

  tableNo = tablenumber;

  var xhr = new XMLHttpRequest();
  xhr.open("GET", "http://localhost/gp1/CustomerTable/tableDetails/" + tableNo);
  xhr.onload = function () {
    if (xhr.status == 200) {
      const table_detail = xhr.responseText;

      const json = JSON.parse(table_detail);

      details.classList.remove("inactive");
      details.classList.add("active");
      var avail;
      if (availability) {
        avail = "Available";
      } else {
        avail = "Unavailable";
      }
      document.getElementById("table-heading").innerHTML =
        "Table " + json.tableNo;
      document.getElementById("max-cover").innerHTML = json.maxCover;
      document.getElementById("min-cover").innerHTML = json.minCover;
      document.getElementById("table-availability").innerHTML = avail;
      var html = `
      <input type='hidden' name='tableNo' value=${json.tableNo}>
      `;
      document.getElementById("tableID").innerHTML = html;

      var html2 = `
      <label for="">Covers: <span class="star">*</span></label>
      <input name="covers" type="number" min=${json.minCover} max=${json.maxCover} required class="input-field" id="" placeholder="Covers" value="">
                `;
      document.getElementById("covers").innerHTML = html2;

      var html3 = `<label for="">Table No: </label>
                    <input name="tableNo" type="text" readonly class="input-field" id="" placeholder="" value="${json.tableNo}">
                `;
      document.getElementById("clickedTable").innerHTML = html3;
    }
  };
  xhr.send();
  if (availability) {
    var html = `<button class="btn bookNow" onclick="openWindow()">
                                Book Now
                </button>
                <div style="color:red; font-size:1.5rem; padding-top:1rem;">  
                </div>`;

    document.getElementById("bookNowBtn").innerHTML = html;
  } else {
    var t = tConvert(nextAvailableTime.slice(0, 5));
    var html = ` <button class="btn bookNow" disabled>
                                Book Now
                            </button>
                            <div style="color:red; font-size:1.5rem; padding-top:1rem;">  
                            The table will be available again after ${t} <br>
                            <b> * The above time is an estimated time and the actual time may vary depending on the previous customers.</b>
                            </div>`;
    document.getElementById("bookNowBtn").innerHTML = html;
  }
  // location.reload();
  // return false;
}

for (let i = 0; i < table.length; i++) {
  table[i].addEventListener("click", function () {
    console.log(table[i]);
    // console.log(details[i]);
    tableHeading.innerHTML = "Table ";
  });
}
function openBookTab() {
  console.log("clicked");
  modal.classList.add("active");
  console.log("ererer");
  bg.classList.add("active");

  modal.classList.remove("inactive");
  bg.classList.remove("inactive");
}

function openWindow() {
  console.log("clicked");
  modal.classList.add("active");
  console.log("ererer");
  bg.classList.add("active");

  modal.classList.remove("inactive");
  bg.classList.remove("inactive");
}
// bookNow.addEventListener("click", function () {
//   console.log("clicked");
//   modal.classList.add("active");
//   console.log("ererer");
//   bg.classList.add("active");

//   modal.classList.remove("inactive");
//   bg.classList.remove("inactive");
// });

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

function tConvert(time) {
  // Check correct time format and split into components
  time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [
    time,
  ];
  if (time.length > 1) {
    // If time format correct
    time = time.slice(1); // Remove full string match value
    time[5] = +time[0] < 12 ? " AM" : " PM"; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }
  return time.join(""); // return adjusted time or original string
}
