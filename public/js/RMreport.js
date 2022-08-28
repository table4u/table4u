let btn1 = document.getElementById('menu-performance-btn');
btn1.addEventListener("click", () =>{
    window.location.href = 'RestaurantManagerReport/menuPerformance01';
});

let btn2 = document.getElementById('reservation-details-report');
btn2.addEventListener("click", () =>{
    window.location.href = 'RestaurantManagerReport/reservationReport';
});

let btn3 = document.getElementById('customer-details-report');
btn3.addEventListener("click", () =>{
    window.location.href = 'RestaurantManagerReport/customerReport';
});

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