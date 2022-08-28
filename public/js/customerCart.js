function deleteItemFromCart(id, size) {
  console.log("delete icon clicked");
  console.log(id, size);
  $.ajax({
    type: "POST",
    url:
      "http://localhost/gp1/CustomerCart/removeItemFromCart/" + id + "/" + size,
    dataType: "json",
    data: {},
    success: function (result) {
      const json = result;
      console.log("Success accepted");

      console.log(result);
      // alert(" Item was removed from the cart");

      location.reload();
    },
    error: function (result) {
      console.log(result);

      alert("Not Removed");
      //   location.reload();
    },
  });
}
