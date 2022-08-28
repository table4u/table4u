
   $.ajax({
    type:'POST',
    url:"RestaurantManagerHome/getDatareservation",
  
    success: function(result){
      const json = JSON.parse(result);
        console.log(json);
        document.getElementById("total reservation").innerHTML = json[0].count;
        //location.reload();
        
    },
    error: function(result){
        alert("Update not completed");
    }

    
})

$.ajax({
  type:'POST',
  url:"RestaurantManagerHome/getDataOrder",

  success: function(result){
    const json = JSON.parse(result);
      console.log(json);
      document.getElementById("total-Orders").innerHTML = json[0].count;
      //location.reload();
      
  },
  error: function(result){
      alert("Update not completed");
  }


  
})



function registerCustomerDetails(){
    document.getElementById("register-customer-table").style.visibility = "visible";
    document.getElementById("unregister-customer-table").style.visibility = "hidden";
    document.getElementById("regCustBtn-id").style.backgroundColor = "#bbbbbb";
    document.getElementById("unregCustBtn-id").style.backgroundColor = "#ffffff";


}

function unregisterCustomerDetails(){
    document.getElementById("register-customer-table").style.visibility = "hidden";
    document.getElementById("unregister-customer-table").style.visibility = "visible";
    document.getElementById("regCustBtn-id").style.backgroundColor = "#ffffff";
    document.getElementById("unregCustBtn-id").style.backgroundColor = "#bbbbbb";

}