
   var xValues=[];
   var yValues=[];
   
   
   $.ajax({
     type:'POST',
     url:"RestaurantManagerHome/getMenuDetailsAjaxForReport",
     dataType:'json',
   
     success: function(result){
       console.log("in jqury function");
         console.log(result);
         var size = Object.keys(result).length;
         i=0;
         while(i<size){
          xValues[i] =  result[i].name;
          yValues[i] = result[i].sumOfServings;
          i++;
   
         }
          
         //console.log(result);
         //location.reload()
         
     },
     error: function(result){
         alert("something went wrong");
     }
   
     
   });
   var barColors ="red";
   new Chart("myChart02", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Menu Performance"
      }
    }
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



  
    