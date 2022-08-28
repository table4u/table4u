

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



let allBtnstyle = document.getElementById("all-btnID");
let upcomingBtnstyle = document.getElementById("upcoming-btn");
let completedBtnstyle = document.getElementById("completed-btn");
let cancelledBtnstyle = document.getElementById("cancelled-btn");




function allreservationDetails(){
    document.getElementById("all-details-table").style.visibility = "visible";
    document.getElementById("upcoming-table").style.visibility = "hidden";
    document.getElementById("completed-table").style.visibility = "hidden";
    document.getElementById("cancel-table").style.visibility = "hidden";

    allBtnstyle.setAttribute("style", 
    " background-color: rgb(167, 167, 167) ; border: 3px solid rgb(167, 167, 167); color: black");

    upcomingBtnstyle.setAttribute("style", 
    " background-color: white ; border: 1px solid white ; color: black");

    completedBtnstyle.setAttribute("style", 
    "  background-color: white ; border: 1px solid white; color: black");

    cancelledBtnstyle.setAttribute("style", 
    "  background-color: white ; border: 1px solid white; color: black");

}

function upcomingreservationDetails(){
    document.getElementById("all-details-table").style.visibility = "hidden";
    document.getElementById("upcoming-table").style.visibility = "visible";
    document.getElementById("completed-table").style.visibility = "hidden";
    document.getElementById("cancel-table").style.visibility = "hidden";


    allBtnstyle.setAttribute("style", 
    " background-color: white ; border: 1px solid white; color: black");

    upcomingBtnstyle.setAttribute("style", 
    "  background-color: rgb(167, 167, 167) ; border: 3px solid rgb(167, 167, 167); color: black");

    completedBtnstyle.setAttribute("style", 
    " background-color: white ; border: 1px solid white; color: black");

    cancelledBtnstyle.setAttribute("style", 
    "  background-color: white ; border: 1px solid white; color: black");

}

function completedreservationDetails(){
    document.getElementById("all-details-table").style.visibility = "hidden";
    document.getElementById("upcoming-table").style.visibility = "hidden";
    document.getElementById("completed-table").style.visibility = "visible";
    document.getElementById("cancel-table").style.visibility = "hidden";


    allBtnstyle.setAttribute("style", 
    " background-color: white ; border: 1px solid white; color: black");

    upcomingBtnstyle.setAttribute("style", 
    "  background-color: white ; border: 1px solid white; color: black");

    completedBtnstyle.setAttribute("style", 
    "  background-color: rgb(167, 167, 167) ; border: 3px solid rgb(167, 167, 167); color: black");

    cancelledBtnstyle.setAttribute("style", 
    "  background-color: white ; border: 1px solid white; color: black");

}
function cancelledreservationDetails(){
    document.getElementById("all-details-table").style.visibility = "hidden";
    document.getElementById("upcoming-table").style.visibility = "hidden";
    document.getElementById("completed-table").style.visibility = "hidden";
    document.getElementById("cancel-table").style.visibility = "visible";

    allBtnstyle.setAttribute("style", 
    " background-color: white ; border: 1px solid white; color: black");

    upcomingBtnstyle.setAttribute("style", 
    "  background-color: white ; border: 1px solid white; color: black");

    completedBtnstyle.setAttribute("style", 
    "  background-color: white ; border: 1px solid white; color: black");

    cancelledBtnstyle.setAttribute("style", 
    "  background-color: rgb(167, 167, 167) ; border: 3px solid rgb(167, 167, 167); color: black");

}

function cancel_close_in_see_more(){
    console.log("in cancel function");
    document.getElementById("pop-up-see-more-id").style.visibility = "hidden";
}

function getOrderDetails(reservationID){
    document.getElementById("pop-up-see-more-id").style.visibility = "visible";
    console.log("Im in getorder");
    console.log(reservationID);
    $.ajax({
        type:'POST',
        url:"RestaurantManagerReservation/getOrderDetails",
        dataType:'json',
        data:{
            _reservationID: reservationID
        },
        success: function(result){
            console.log(result);
            if(result.length != 0){
            document.getElementById('orderID').innerHTML = "Order ID - " + result[0].orderID;
            document.getElementById('order-status').innerHTML = "Order status - " + result[0].status;
            document.getElementById('order-note').innerHTML = "Order note - " + result[0].note;
            }else{
                document.getElementById('orderID').innerHTML = "NO order ";
                document.getElementById('order-status').innerHTML = "No status";
                document.getElementById('order-note').innerHTML = "-";
            }
        },error: function(){
         
            
        }

        
    })
}
    
    
