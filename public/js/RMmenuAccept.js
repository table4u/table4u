// more button in menu item list
var menuIDGlobal;

$.ajax({
    type:'POST',
    url:"../RestaurantManagerHome/getDatareservation",
  
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




function menumore2(menuID){
     console.log("In function menu "+menuID);
  
    $.ajax({
      type:'POST',
      url:"../RestaurantManagerMenu/getMenuDetailsAjax",
      dataType:'json',
      data:{
          _menuID : menuID
      },
  
      success: function(result){
          console.log("Success");
          const json = result;
           document.getElementById('Accept-topic').innerHTML =   json.name;
          document.getElementById('Accept-name').innerHTML =   json.name;
          document.getElementById('Accept-veg').innerHTML =  json.veg_NonVeg;
          document.getElementById('Accept-description').innerHTML =   json.description; 
          document.getElementById('Accept-ingredients').innerHTML =  json.ingredients; 
          document.getElementById('Accept-cost-small').innerHTML =  json.costSmall; 
          document.getElementById('Accept-cost-medium').innerHTML =  json.costMedium; 
          document.getElementById('Accept-cost-large').innerHTML =   json.costLarge;



   
          
          console.log(result);
          //location.reload()
          
      },
      error: function(result){
         // alert("Update not completed");
         console.log(result);
      }
  
      
  })
  
     document.getElementById("popup-topic").style.visibility = "visible";
     document.getElementById("popUp-content").style.visibility = "visible";
     document.getElementById("navigation-area").style.filter = "blur(10px)";
     document.getElementById("main-area").style.filter = "blur(10px)";
     menuIDGlobal = menuID;
     
  }
  
  function Accept_for_button(){
      document.getElementById("popUp-to-update-delete").style.visibility = "visible";
      document.getElementById("popup-topic").style.zIndex = -100;
      document.getElementById("popup-topic").style.filter = "blur(10px)";
      document.getElementById("popUp-content").style.zIndex = -100;
      document.getElementById("popUp-content").style.filter = "blur(10px)";
      document.getElementById("Msg").innerHTML = "Accept the Menu Item";
      document.getElementById("delete-update-btn").innerHTML = "<button class='updateEmployee' id='updateEmployee2' onclick='AcceptMenuItem()'>Accept Menu</button>"
  }

  function Reject_for_button(){
    document.getElementById("popUp-to-update-delete").style.visibility = "visible";
    document.getElementById("popup-topic").style.zIndex = -100;
    document.getElementById("popup-topic").style.filter = "blur(10px)";
    document.getElementById("popUp-content").style.zIndex = -100;
    document.getElementById("popUp-content").style.filter = "blur(10px)";
    document.getElementById("Msg").innerHTML = "Reject the Menu Item";
    document.getElementById("delete-update-btn").innerHTML = "<button class='deleteEmployee' id='deleteEmployee2' onclick='RejectMenuAccept()'>Reject Menu</button>"
}

  //update menu items
  function AcceptMenuItem(){
      var menuID = menuIDGlobal;
      var small_price = document.getElementById('small-price').value
      var medium_price = document.getElementById('medium-price').value;
      var large_price = document.getElementById('large-price').value;
      console.log("In update menu");
      //console.log(small_price);
      //console.log(medium_price);
      //console.log(large_price);
     // menuID = menuIDGlobal;
      console.log(menuID);
  
      $.ajax({
          type:'POST',
          url:"../RestaurantManagerMenu/AcceptMenuItem",
          dataType:'json',
          data:{
              _menuID : menuID,
              _smallPrice :small_price,
              _mediumPrice :medium_price,
              _largePrice : large_price
          },
      
          success: function(result){
              const json = result;
              console.log("Success accepted");
              
            
              
             // console.log(result);
              //location.reload()
              
          },
          error: function(result){
              alert("Update not completed");
          }
      
          
      })
      location.reload();
    
  
  }
  function RejectMenuAccept(){
      var menuID = menuIDGlobal;
      
      $.ajax({
        type:'POST',
        url:"../RestaurantManagerMenu/RejectMenuItem",
        dataType:'json',
        data:{
            _menuID : menuID,   
        },
        success: function(result){
            const json = result;
            console.log("rejected");
            
          
            
           // console.log(result);
            //location.reload()
            
        },
        error: function(result){
            alert("Update not completed");
        }
    
        
    })
    location.reload();


  }


  function update_data_in_menu(){
      console.log("In update menu function");
      //console.log(document.getElementById("form-menu-price-small").value);
     var header = document.getElementById("form-menu-header").value;
     var name = document.getElementById("form-menu-topic").value;
     var veg_nonveg = document.getElementById("form-menu-veg_nonveg").value;
  
     var description = document.getElementById("form-menu-description").value;
     var small_price = document.getElementById("form-menu-price-small").value;
     var medium_price = document.getElementById("form-menu-price-medium").value;
     var large_price = document.getElementById("form-menu-price-large").value;
  
     console.log(description);
  
     $.ajax({
      type:'POST',
      url:"RestaurantManagerMenu/update_menu_ajax",
      data:{
          _header : header,
          _name : name,
          _veg_NonVeg : veg_nonveg,
          _description : description,
          _small_price : small_price,
          _medium_price : medium_price,
          _large_price : large_price,
          _menuID : menuIDGlobal
  
      },
      success: function(result){
          console.log("Update Done!!!!");
          location.reload();
          
      },
      error: function(result){
          alert("Update not completed");
      }
  
      
  })
  
      //console.log(typeof(detail1));
  }
  function change_availability(menuID,availability){
      console.log(menuID,availability);
      $.ajax({
          type:'POST',
          url:"RestaurantManagerMenu/change_availability",
          dataType:"json",
          data :{
              _menuID : menuID,
              _availability : availability
          },
          success: function(result){
  
              console.log("success");
              location.reload();
              
          },
          error: function(result){
              alert("Update not completed");
          }
      
          
      })
  
  
  }
  function closePopup(){
      document.getElementById("popup-topic").style.visibility = "hidden";
      document.getElementById("popUp-content").style.visibility = "hidden";
      document.getElementById("navigation-area").style.opacity = 1;
      document.getElementById("main-area").style.opacity = 1;
  
      document.getElementById("small-price").style.visibility="hidden";
      document.getElementById("medium-price").style.visibility="hidden";
      document.getElementById("large-price").style.visibility="hidden";
      location.reload();
   
  
  
  }
  
  

  