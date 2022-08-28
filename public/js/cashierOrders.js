function showProfile() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}

function showCalender() {
    var popup = document.getElementById("popupCalen");
    popup.classList.toggle("show");
}

// Start of cart 
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    // var quantityInputs = document.getElementsByClassName('Itemquantity')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtonS = document.getElementsByClassName('cardS')
    for (var i = 0; i < addToCartButtonS.length; i++) {
        var button = addToCartButtonS[i]
        button.addEventListener('click', addToCartClickedS)
    }
    var addToCartButtonM = document.getElementsByClassName('cardM')
    for (var i = 0; i < addToCartButtonM.length; i++) {
        var button = addToCartButtonM[i]
        button.addEventListener('click', addToCartClickedM)
    }
    var addToCartButtonL = document.getElementsByClassName('cardL')
    for (var i = 0; i < addToCartButtonL.length; i++) {
        var button = addToCartButtonL[i]
        button.addEventListener('click', addToCartClickedL)
    }

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
}

// function purchaseClicked() {
//     alert('Thank you for your purchase')
//     var cartItems = document.getElementsByClassName('cart-items')[0]
//     while (cartItems.hasChildNodes()) {
//         cartItems.removeChild(cartItems.firstChild)
//     }
//     updateCartTotal()
// }

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function addToCartClickedS(event) {
    console.log("add to cart");
    var button = event.target
    var shopItem = button.parentElement.parentElement
    // var title = shopItem.getElementsByClassName('content-container')[0].innerText
    // var price = shopItem.getElementsByClassName('price')[0].innerText
    var title = shopItem.getElementsByClassName('text1')[0].innerText
    var price = shopItem.getElementsByClassName('priceS')[0].innerText
    var size = shopItem.getElementsByClassName('size1')[0].innerText
    var ID = shopItem.getElementsByClassName('id1')[0].innerText
    // var quant = shopItem.getElementsByClassName('Itemquantity')[0].innerText
    // addItemToCart(title, price, quant)
    console.log(ID)
    addItemToCart(title, price, size,ID)
    updateCartTotal()
}
function addToCartClickedM(event) {
  console.log("add to cart");
  var button = event.target
  var shopItem = button.parentElement.parentElement
  var title = shopItem.getElementsByClassName('text2')[0].innerText
  var price = shopItem.getElementsByClassName('priceM')[0].innerText
  var size = shopItem.getElementsByClassName('size2')[0].innerText
  var ID = shopItem.getElementsByClassName('id2')[0].innerText
  addItemToCart(title, price, size,ID)
  updateCartTotal()
}
function addToCartClickedL(event) {
  console.log("add to cart");
  var button = event.target
  var shopItem = button.parentElement.parentElement
  var title = shopItem.getElementsByClassName('text3')[0].innerText
  var price = shopItem.getElementsByClassName('priceL')[0].innerText
  var size = shopItem.getElementsByClassName('size3')[0].innerText
  var ID = shopItem.getElementsByClassName('id3')[0].innerText
  console.log(ID)
  addItemToCart(title, price, size,ID)
  updateCartTotal()
}

    //function addItemToCart(title, price, quant) {
    function addItemToCart(title, price, size,ID) {
      console.log(ID)
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    var cartsize = cartItems.getElementsByClassName('cart-size')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title && cartsize[i].innerText == size ) {
            alert('This item is already added to the cart')
            return
        }
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <span class="cart-item-title">${title}</span>
        </div>
        <span class="cart-size cart-column" >${size}</span>
        <span class="cart-price cart-column">${price}</span>
        
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)

    var qntyElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
    var qnty = qntyElement.value

    $.ajax({
      type:'POST',
      url:"http://localhost/gp1/CashierOrderMenu/addOrderMenuItems",
    data:{id:ID,size:size,quantity:qnty},
    success: function(result){
      const json = JSON.parse(result);
        console.log(json);
        //location.reload();
        
    },
    error: function(result){
        alert("Update not completed");
    }
  
    })
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('Rs.', ''))
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    var recived = 0
    document.getElementsByClassName('cart-total-price')[0].innerText = 'Rs.' + total
    var html = `<a class="paybyCash"  href="http://localhost/gp1/CashierOrderMenu/paybyCash/${total}/${recived}">
    <img class="iconpay" src="http://localhost/gp1/public/images/cash.png" alt=""/>
    <h6 class="text1">Cash Pay</h3>
  </a>`
    document.getElementById('total').innerHTML = html
}
// End of cart






// var tab = document.getElementsByClassName("tab");
// //document.querySelector(".defaultOpen").click();

// //opening tab

// function opentab(evt, tabname) {
//   console.log("open tab");
//   var i, tabcontent, tablinks;
//   tabcontent = document.getElementsByClassName("menu-container");
//   for (i = 0; i < tabcontent.length; i++) {
//     tabcontent[i].style.display = "none";
//   }
//   tablinks = document.getElementsByClassName("tablinks");
//   for (i = 0; i < tablinks.length; i++) {
//     tablinks[i].className = tablinks[i].className.replace(" active", "");
//   }
//   console.log(tabname);
//   document.getElementById(tabname).style.display = "inline-flex";
//   displayMenuItems(tabname);
//   evt.currentTarget.className += " active";
// }

// loading menu items

// function loadMenuItems() {
//   console.log("Menu Loaded");
//   fetch("http://localhost/gp1/CustomerMenu/loadMenuItems")
//     .then((response) => response.json())
//     .then((menuItems) => {
//       console.log(menuItems);
//     });
// }

// function loadMenuItems() {
//   console.log("Menu Loaded");
//   fetch("http://localhost/gp1/CustomerMenu/loadMenuItems")
//     .then((response) => response.json())
//     .then((menuItems) => {
//       console.log(menuItems);
//     });
// }
async function getMenuItems() {
  let url = "http://localhost/gp1/CashierOrderMenu/loadMenuItems";
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
  console.log(items);
  let html = "";
  items.forEach((item) => {
    if (item.MenuName == tabname) {
      let htmlSegment = "";

      if (item.veg_NonVeg == "Veg") {
        htmlSegment += `<div class="menu-item veg">`;
      } else {
        htmlSegment += `<div class="menu-item" >`;
      }
      
      htmlSegment += `  
                          
                        <img src="../public/images/${item.picture}" alt="">
                        
                        <div class="content-container">
                            <h3 style="display: inline;">${item.name} </h3>
                        </div>

                        <div class="price">
                            Rs.<b> ${item.priceSmall}.00</b>
                        </div>
                    </div>
    `;
      html += htmlSegment;
    }
  });

  let menucontainer = document.getElementById(tabname);
  menucontainer.innerHTML = html;
}

// function portionsize(evt, tabname) {
//   var i, tabcontent, tablinks;
//   tabcontent = document.getElementsByClassName("menu");
//   for (i = 0; i < tabcontent.length; i++) {
//     tabcontent[i].style.display = "none";
//   }
//   tablinks = document.getElementsByClassName("tab");
//   for (i = 0; i < tablinks.length; i++) {
//     tablinks[i].className = tablinks[i].className.replace(" active", "");
//   }
//   document.getElementById(tabname).style.display = "block";
//   evt.currentTarget.className += " active";
// }

// document.getElementById("defaultOpen1").click();

function menutype(evt,tabname) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("menuItems");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("menutypeButtons");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabname).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen2").click();


