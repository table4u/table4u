let addToCartBtn = document.getElementsByClassName("btn");
let mainContainer = document.getElementsByTagName("tbody")[0];
let quantity = document.getElementsByClassName("quantity ");
let removeBtn = document.getElementsByClassName("remove-btn");

for (let i = 0; i < addToCartBtn.length; i++) {
  addToCartBtn[i].addEventListener("click", addToCart.bind(i), false);
}

function addToCart(e, i) {
  let btn = e.target;
  let btnParent = btn.parentElement;
  let btnGrandParent = btn.parentElement.parentElement;

  let menuItemName = btnGrandParent.children[2].children[0].innerText;
  let menuItemPrice = btnGrandParent.children[2].children[1].innerText;
  let menuItemImg = btnGrandParent.children[0].src;

  let menuItemContainer = document.createElement("tr");
  menuItemContainer.innerHTML = `<tr>
                        <td>
                            <div>
                                <div class="cart-info">
                                    <div style="line-height: 150%">
                                        <p>${menuItemName}</p>
                                        <small style="display:none;" class="item-price" >${menuItemPrice}</small>
                                        <button class="remove-btn">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div >
<!--                                <button class="btn-dec" onclick="dec(${i})">-</button>-->
                                <input class="quantity" name=${i} type="number"  value="1" min="1" max="9999" maxlength="4" oninput="this.value=this.value.slice(0,this.maxLength||1/1);this.value=(this.value   < 1) ? (1/1) : this.value;">
<!--                                <button class="btn-inc" onclick="inc(${i})">+</button>-->
                            </div>
                        </td>
                        <td class="sub-total">${menuItemPrice}</td>
                    </tr>`;

  mainContainer.append(menuItemContainer);

  // console.log(btn)
  // console.log(btnParent)
  // console.log(btnGrandParent)
  // console.log(menuItemName)
  // console.log(menuItemPrice)

  for (let i = 0; i < quantity.length; i++) {
    quantity[i].addEventListener("change", updateTotal);
    // console.log('in')
  }

  for (let i = 0; i < removeBtn.length; i++) {
    removeBtn[i].addEventListener("click", removeItem);
  }

  grandTotal();
}

function updateTotal(e) {
  let numberOfItems = e.target;
  let numberOfItemsGP = numberOfItems.parentElement.parentElement.parentElement;
  let price = numberOfItemsGP.getElementsByClassName("item-price")[0];
  let subtotal = numberOfItemsGP.children[2];
  let priceContent = price.innerText.replace("Rs", "");
  subtotal.innerText = "Rs " + numberOfItems.value * priceContent;
  grandTotal();
}

function grandTotal() {
  let total = 0;
  let netTotal = document.getElementsByClassName("net-total")[0];
  let tax = document.getElementsByClassName("tax")[0];
  let grandTotal = document.getElementsByClassName("grand-total")[0];
  let totalPrice = document.getElementsByClassName("sub-total");
  for (let i = 0; i < totalPrice.length; i++) {
    let totalPriceContent = Number(totalPrice[i].innerText.replace("Rs", ""));
    total += totalPriceContent;
  }
  netTotal.innerText = "Rs " + total;
  let taxAmount = 0.05 * total;
  tax.innerText = "Rs " + taxAmount;
  let grandTotalAmount = total + taxAmount;
  grandTotal.innerText = "Rs " + grandTotalAmount;
}

function removeItem(e) {
  let removeBtn = e.target;
  let removeBtnGP =
    removeBtn.parentElement.parentElement.parentElement.parentElement
      .parentElement;
  console.log(removeBtnGP);
  removeBtnGP.remove();
  grandTotal();
  console.log("remove");
}
