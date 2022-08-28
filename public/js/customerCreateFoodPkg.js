$(document).ready(function () {
  $("#search-bar").keyup(function () {
    var search = $(this).val();
    if (search != "") {
      $.ajax({
        url: "http://localhost/gp1/CustomerMenu/getMenuItems",
        method: "post",
        data: { search: search },
        dataType: "text",
        success: function (data) {
          $("#result").html(data);
        },
      });
    } else {
      $("#result").html("");
    }
  });
});
