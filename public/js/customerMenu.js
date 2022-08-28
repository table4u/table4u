let allFilter = document.querySelector("#all");
let vegFilter = document.querySelector("#veg");
let nonvegFilter = document.querySelector("#nonveg");
let searchbar = document.getElementById("search");

//arrays to hold data
let Menu = [];
let Veg = [];
let Picture = [];
let Name = [];
let PriceSmall = [];
let PriceMedium = [];
let PriceLarge = [];
let Description = [];
let Id = [];

searchbar.addEventListener("keyup", () => {
  console.log("search");
  var temp = [];
  let val = searchbar.value.toLowerCase();
  console.log(val);
  if (val != "") {
    Name.forEach((i) => {
      if (i.toLowerCase().includes(val)) {
        temp.push(Name.indexOf(i));
      }
      // console.log(i);
      // console.log(Name.indexOf(i));
      displayFiltered(temp);
    });
    if (val == "") {
      location.reload();
    }
  }

  console.log(temp);
});
// console.log(allFilter);
var tab = document.getElementsByClassName("tab");
document.querySelector(".defaultOpen").click();

async function loadAll(event) {
  let tabname = "all";
  opentab(event, tabname);
  let items = await getMenuItems();
  console.log(items.ItemName);
  let html = "";
  items.forEach((item) => {
    let htmlSegment = "";

    if (item.veg_NonVeg == "Veg") {
      htmlSegment += `<div class="menu-item veg">`;
    } else {
      htmlSegment += `<div class="menu-item">`;
    }

    htmlSegment += `     
                        <img src="../public/images/${item.picture}" alt="">

                        <div class="content-container">
                            <h3 style="display: inline;">${item.name} </h3>
                        </div>

                        <div class="description">
                            ${item.description}                            
                        </div>

                        <div class="price">
                            Starting from <b> ${item.priceSmall} LKR</b>
                        </div>
                        <form method="POST" action="http://localhost/gp1/customerCart/loadCart">
                          <div style="display: flex; justify-content: center;">
                              <input type="submit" value='Order Now'class="btn" style=""> </input>
                          </div>
                          <input type='hidden' name='product_id' value='${item.menuItemID}'>
                          <input type='hidden' name='product_name' value='${item.name}'>
                          <input type='hidden' name='product_small' value='${item.priceSmall}'>
                          <input type='hidden' name='product_medium' value='${item.priceMedium}'>
                          <input type='hidden' name='product_large' value='${item.priceLarge}'>
                          <input type='hidden' name='product_description' value='${item.description}'>
                          <input type='hidden' name='product_picture' value='${item.picture}'>
                        </form>
                    </div>
    `;
    html += htmlSegment;
  });

  let menucontainer = document.getElementById(tabname);
  menucontainer.innerHTML = html;
}
//opening tab
console.log(Name);
function opentab(evt, tabname) {
  console.log("open tab");
  var i, tabcontent, tablinks;
  // document.getElementsByClassName("allItems").toggle();
  tabcontent = document.getElementsByClassName("menu-container");
  console.log(tabcontent);
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  console.log(tablinks);
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  console.log(tabname);
  document.getElementById(tabname).style.display = "inline-flex";
  displayMenuItems(tabname);
  evt.currentTarget.className += " active";
}

async function getMenuItems() {
  let url = "http://localhost/gp1/CustomerMenu/loadMenuItems";
  try {
    let res = await fetch(url);
    console.log(res);
    return await res.json();
  } catch (e) {
    console.log(e);
  }
}

async function displayMenuItems(tabname) {
  let items = await getMenuItems();
  console.log(items.ItemName);
  let html = "";
  items.forEach((item) => {
    Menu.push(item.MenuName);
    Veg.push(item.veg_NonVeg);
    Picture.push(item.picture);
    Name.push(item.name);
    PriceSmall.push(item.priceSmall);
    PriceMedium.push(item.priceMedium);
    PriceLarge.push(item.priceLarge);
    Description.push(item.description);
    Id.push(item.menuItemID);

    if (item.MenuName == tabname) {
      let htmlSegment = "";

      if (item.veg_NonVeg == "Veg") {
        htmlSegment += `<div class="menu-item veg">`;
      } else {
        htmlSegment += `<div class="menu-item">`;
      }

      htmlSegment += `     
                        <img src="../public/images/${item.picture}" alt="">

                        <div class="content-container">
                            <h3 style="display: inline;">${item.name} </h3>
                        </div>

                        <div class="description">
                            ${item.description}                            
                        </div>

                        <div class="price">
                            Starting from <b> ${item.priceSmall} LKR</b>
                        </div>
                        <form method="POST" action="http://localhost/gp1/customerCart/loadCart">
                          <div style="display: flex; justify-content: center;">
                              <input type="submit" value='Order Now'class="btn" style=""> </input>
                          </div>
                          <input type='hidden' name='product_id' value='${item.menuItemID}'>
                          <input type='hidden' name='product_name' value='${item.name}'>
                          <input type='hidden' name='product_small' value='${item.priceSmall}'>
                          <input type='hidden' name='product_medium' value='${item.priceMedium}'>
                          <input type='hidden' name='product_large' value='${item.priceLarge}'>
                          <input type='hidden' name='product_description' value='${item.description}'>
                          <input type='hidden' name='product_picture' value='${item.picture}'>
                        </form>
                    </div>
    `;
      html += htmlSegment;
    }
  });

  let menucontainer = document.getElementById(tabname);
  menucontainer.innerHTML = html;
}

function displayFiltered(arr) {
  let tabName;
  let html = "";

  arr.forEach((i) => {
    // if (Menu[i] == tabname) {
    let htmlSegment = "";

    if (Veg[i] == "Veg") {
      htmlSegment += `<div class="menu-item veg">`;
    } else {
      htmlSegment += `<div class="menu-item">`;
    }

    htmlSegment += `     
                        <img src="../public/images/${Picture[i]}" alt="">

                        <div class="content-container">
                            <h3 style="display: inline;">${Name[i]} </h3>
                        </div>

                        <div class="description">
                            ${Description[i]}                            
                        </div>

                        <div class="price">
                            Starting from <b> ${PriceSmall[i]} LKR</b>
                        </div>
                        <form method="POST" action="http://localhost/gp1/customerCart/loadCart">
                          <div style="display: flex; justify-content: center;">
                              <input type="submit" value='Order Now'class="btn" style=""> </input>
                          </div>
                          <input type='hidden' name='product_id' value='${Id[i]}'>
                          <input type='hidden' name='product_name' value='${Name[i]}'>
                          <input type='hidden' name='product_small' value='${PriceSmall[i]}'>
                          <input type='hidden' name='product_medium' value='${PriceMedium[i]}'>
                          <input type='hidden' name='product_large' value='${PriceLarge[i]}'>
                          <input type='hidden' name='product_description' value='${Description[i]}'>
                          <input type='hidden' name='product_picture' value='${Picture[i]}'>
                        </form>
                    </div>
    `;
    html += htmlSegment;
    // }
  });
  let menucontainer = document.getElementById("all");
  // menucontainer.style.display = "inline-flex";
  menucontainer.innerHTML = html;
}

// allFilter.addEventListener("click", function () {
//   console.log("all");
//   allFilter.classList.add("active");
//   allFilter.classList.remove("inactive");
//   vegFilter.classList.remove("active");
//   nonvegFilter.classList.remove("active");
//   vegFilter.classList.add("inactive");
//   nonvegFilter.classList.add("inactive");
// });

// vegFilter.addEventListener("click", function () {
//   console.log("veg");
//   vegFilter.classList.add("active");
//   vegFilter.classList.remove("inactive");
//   allFilter.classList.remove("active");
//   nonvegFilter.classList.remove("active");
//   allFilter.classList.add("inactive");
//   nonvegFilter.classList.add("inactive");
// });

// nonvegFilter.addEventListener("click", function () {
//   console.log("nonveg");

//   nonvegFilter.classList.add("active");
//   nonvegFilter.classList.remove("inactive");
//   allFilter.classList.remove("active");
//   vegFilter.classList.remove("active");
//   allFilter.classList.add("inactive");
//   vegFilter.classList.add("inactive");
// });
