//get table details using ajax
var tableNo;
var tbl_availability;
function table_table(tablenumber){
    tableNo = tablenumber;
    
    var xhr = new XMLHttpRequest();

    xhr.open('GET','CashierReserveTable/table_table/'+tableNo);
    console.log(tableNo);

    xhr.onload = function() {
        console.log("in onload function");
        console.log(xhr);
        if(xhr.status == 200){
            const table_detial = xhr.responseText;
            const json = JSON.parse(table_detial);
            //const json = table_detial;
            console.log("details");
            console.log(json);
            var i_value;
            for(i=1; i<26; i++){
                console.log("in for loop");

                tbl_availability = json[i-1].availability;
                console.log(i);
                if(tablenumber == json[i-1].tableNo){
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();

                    var hours = String(today.getHours()).padStart(2, '0');
                    var minutes = String(today.getMinutes()).padStart(2, '0'); //January is 0!

                    time = hours + ':' + minutes; 
                    today = mm + '-' + dd + '-' + yyyy;
                    console.log(today);

                    // createCookie('tableSelected',json[i-1].tableNo,'1');
                    console.log(document.cookie);

                    console.log("in if statment");

                    i_value = i;
                    console.log(i_value);
                    // document.getElementById('TableDetail-header').innerHTML = "Table " + json[i-1].tableNo;
                    // document.getElementById('TableDetail-maxCovers').innerHTML = "Maximum Covers " + json[i-1].maxCover;
                    // document.getElementById('TableDetail-minCovers').innerHTML = "Minimum Covers " + json[i-1].minCover;

                    document.getElementById('TableDetail-header').innerHTML = "Table " + json[i-1].tableNo;
                    document.getElementById('TableDetail-maxCovers').innerHTML = "Maximum Covers " + json[i-1].maxCover;
                    document.getElementById('TableDetail-minCovers').innerHTML = "Minimum Covers " + json[i-1].minCover;

                    if(json[i-1].availability == 0){
                        // console.log(json.availability);
                         document.getElementById('TableDetail-status').innerHTML = "status - Unavailable";
                        // table_availability = json.availability;
                     }
                     if(json[i-1].availability == 1){
                        // console.log(json.availability);
                         document.getElementById('TableDetail-status').innerHTML = "status - Available";
                        // table_availability = json.availability;
                     }  
                     console.log(i);
                     //let tableId =  document.getElementById('table-'+ i);
                     console.log(json[i-1].tableID);
                    // document.getElementById(json[i-1].tableID).style.backgroundColor="red";
                    //  if(tableId == null){
                    //      continue;
                    //  } 

                                     
                    console.log(Date.now());
                    var html = `<div class="row">
                    <input hidden type="text" id="tableno" name="tableno" value="${tablenumber}" ></br></br>
            
                    <div class="row">
                     <div class="labelname">
                      <div class="labelname_style">
                          <label for="reserveTime">Date </label>
                      </div>
                     </div>
                    <div class="inputrow">
                        <input required type="date" id="date" name="date" value="${today}" ></br></br>
                    </div>
                    </div>

                    <div class="row">
                    <div class="labelname">
                      <div class="labelname_style">
                        <label for="reserveTime">From </label>
                      </div>
                    </div>
                    <div class="inputrow">
                        <input required type="time" id="from_time" name="from_time" value="${time}" ></br></br>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="labelname">
                      <div class="labelname_style">
                        <label for="reserveTime">To </label>
                      </div>
                    </div>
                    <div class="inputrow">
                        <input required type="time" id="to_time" name="to_time" ></br></br>
                    </div>
                    </div>

                    <div class="row">
                    <div class="labelname">
                      <div class="labelname_style">
                        <label for="noOfCovers">No of covers </label>
                      </div>
                    </div>
                    <div class="inputrow">
                        <input type="number" value="${json[i-1].minCover}" min="${json[i-1].minCover}" max="${json[i-1].maxCover}"  id="covers" name="covers" required></br></br>
                    </div>
                    </div>

                    <div class="row">
                    <div class="labelname">
                        <label for="noOfCovers">Id No </label>
                    </div>
                    <div class="inputrow">
                        
                    <input  type="varchar" id="ID-no" name="ID"   ></br></br>
                    </div>
                    </div>
                    
                    <div class="ok">
                    <input type="submit" value="Reserve">
                    </div>
                    <div class="Cancel">
                    <input type="reset" value="Close" id="No-btn" onclick="no_reserve()">
                    </div>`
                    console.log(document.getElementById('reservationForm').innerHTML);
                    document.getElementById('reservationForm').innerHTML = html;



                    var html_unavail = `<div class="row">

                    <input hidden type="text" id="tableno" name="tableno" value="${tablenumber}" ></br></br>
            
                    <div class="row">
                    <div class="labelname">
                        <label for="reserveDate">Date </label>
                    </div>
                    <div class="inputrow">
                        
                        <input required type="date" id="date" name="date"   value="${today}" ></br></br>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="labelname">
                        <label for="reserveTime">From </label>
                    </div>
                    <div class="inputrow">
                        <input required type="time" id="time" name="time" ></br></br>
                    </div>
                    </div>

                    <div class="row">
                    <div class="labelname">
                        <label for="reserveTime">To </label>
                    </div>
                    <div class="inputrow">
                        <input required type="time" id="time" name="time" ></br></br>
                    </div>
                    </div>

              
                    
                    <div class="ok">
                    <input type="submit" value="Unavailable">
                    </div>
                    <div class="Cancel">
                    <input type="reset" value="Close" id="No-btn" onclick="no_unavailable()">
                    </div>`
                    console.log(document.getElementById('unavailableForm').innerHTML);
                    document.getElementById('unavailableForm').innerHTML =  html_unavail;

                    var html_avail = `<div class="row">
                    <div class="labelname">
                        
                    </div>
                    <div class="inputrow">
                        
                        <input hidden required type="date" id="date" name="date"   value="${today}" ></br></br>
                    </div>
                    </div>
                    
                   
                   <span> Are you want to available?</span>
                   
                    <div class="inputrow">
                       
                    </div>
                    </div>

                    <div class="row">
                    <div class="labelname">
                        
                    <div class="inputrow">
                        <input hidden required type="time" id="time" name="time" ></br></br>
                    </div>
                    </div>

              
                    
                    <div class="ok">
                    <input type="submit" value="Available">
                    </div>
                    <div class="Cancel">
                    <input type="reset" value="Close" id="No-btn" onclick="no_available()">
                    </div>`
                    console.log(document.getElementById('availableForm').innerHTML);
                    document.getElementById('availableForm').innerHTML =  html_avail;
                }

                

            }
            document.getElementById(json[i_value-1].tableID).style.backgroundColor="red";
        }
    }

        


    xhr.send();
    document.getElementById('layout').style.width = "70%";
    document.getElementById('table-detail-id').style.visibility = "visible";
}

function unavailable(){
    // var url = "<?php echo URLROOT ?>/CashierReserveTable/unavailableTable"; 
    // $.get(url,function (data)
    console.log("unavailble_table");
    $.ajax({    
        url: "/CashierReserveTable/unavailableTable",
        success: function() {
             alert("success");
        }
    });
    
}



// // function changeColor() {
// //  document.querySelector(".table_").style.backgroundColor = "red";
// // console.log("Change");
 
// // }

function closeme(){
    document.getElementById("main-area-id").style.filter = "blur(0px)";
    document.getElementById("navigation-id").style.filter = "blur(0px)";
    document.getElementById("add-table-id").style.visibility = "hidden";
    document.getElementById("layout-in-input").style.visibility = "hidden";


}

function layout_adjust(){
    document.getElementById("layout").style.width = "70%";
    

}

function reservedisplay(){

    
        document.getElementById("popup-reserve").style.visibility= "visible";
    
    
}

function no_reserve(){
    document.getElementById("popup-reserve").style.visibility= "hidden";
}

function unavailabledisplay(){
    document.getElementById("popup-unavailable").style.visibility= "visible";

}

function no_unavailable(){
    document.getElementById("popup-unavailable").style.visibility= "hidden";
}

function availabledisplay(){
    document.getElementById("popup-available").style.visibility= "visible";

}

function no_available(){
    document.getElementById("popup-available").style.visibility= "hidden";
}

// function createCookie(name,value,days) {
//     if (days) {
//         var date = new Date();
//         date.setTime(date.getTime()+(days*24*60*60*1000));
//         var expires = "; expires="+date.toGMTString();
//     }
//     else var expires = "";
//     document.cookie = name+"="+value+expires+"; path=/";
// }


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
//   xhr.open("GET", "http://localhost/gp1/CustomerTable/tableDetails/" + tableNo);
  xhr.open('GET','CashierReserveTable/table_table/'+tableNo);
  xhr.onload = function () {
    if (xhr.status == 200) {
      const table_detail = xhr.responseText;

      const json = JSON.parse(table_detail);
      console.log(json);

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




