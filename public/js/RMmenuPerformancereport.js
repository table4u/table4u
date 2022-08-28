
    var xValues=[];
    var yValues=[];

    
    $.ajax({
      type:'POST',
      url:"../RestaurantManagerReport/getMenuDetailsAjaxForReport",
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
  
      
  })


//var xValues = ["Koththu", "Hoppers", "String Hoppers", "Burgers", "Watalappan","Ice Cream","Rice And Curry","Biriyani"];
//var yValues = [55, 49, 44, 24, 15, 25, 30, 50,0];
var barColors = "red";

new Chart("myChart", {
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
      text: "Menu Performance of this Month"
    }
  }
});


