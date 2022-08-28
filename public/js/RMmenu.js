//accept menu page load
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

let acceptbtn = document.getElementById('menu-accept-id');
acceptbtn.addEventListener("click", () =>{
    window.location.href = 'RestaurantManagerMenu/acceptMenu';
});
var menuIDGlobal;

var header ;
var menuname ;
var veg_nonveg ;

var description;
var small_price ;
var medium_price;
var large_price ;

//this ajax is for available button in first page
 $.ajax({
    type:'POST',
    url:"RestaurantManagerMenu/getMenuDetailsDefault",
    dataType:'json',

    success: function(result){
        console.log("In default ajax function");
        let lenght = Object.keys(result).length;
        //console.log(lenght) ;
        for(i=0;i<lenght;i++){
            let avai = "available-btn-"+(result[i].menuItemID);
            //console.log(avai);
            let unavai = "unavailable-btn-"+(result[i].menuItemID);
            //console.log(unavai);
            if(result[i].availability == 1){
                //console.log(avai);
                document.getElementById(avai).style.backgroundColor = "green";
            }else{
                //console.log(unavai);
                document.getElementById(unavai).style.backgroundColor = "#ff6961";
            }
        }
        //console.log(result[0]);
        //location.reload()
        
    },
    error: function(result){
        alert("Update not completed");
    }

    
})







// more button in menu item list
function menumore(menuID){
  // console.log("In function menu "+menuID);

  $.ajax({
    type:'POST',
    url:"RestaurantManagerMenu/getMenuDetailsAjax",
    dataType:'json',
    data:{
        _menuID : menuID
    },

    success: function(result){
        const json = result;
        document.getElementById('menu-topic').innerHTML =   json.name;
        document.getElementById('menu-header').innerHTML =   json.name;
        document.getElementById('menu-veg_nonveg').innerHTML =  json.veg_NonVeg;
        document.getElementById('menu-description').innerHTML =   json.description; 
        document.getElementById('menu-ingredients').innerHTML =  json.ingredients; 
        document.getElementById('menu-price-small').innerHTML =  json.priceSmall; 
        document.getElementById('menu-price-medium').innerHTML =  json.priceMedium; 
        document.getElementById('menu-price-large').innerHTML =   json.priceLarge;

        
        console.log(result);
        //location.reload()
        
    },
    error: function(result){
        alert("Update not completed");
    }

    
})

   document.getElementById("popup-topic").style.visibility = "visible";
   document.getElementById("popUp-content").style.visibility = "visible";
   document.getElementById("navigation-area").style.opacity = 0.1;
   document.getElementById("main-area").style.opacity = 0.1;
   menuIDGlobal = menuID;
   
}




//update menu items
function update_menu(){
    console.log("In update menu");
    menuID = menuIDGlobal;
    console.log(menuID);

    $.ajax({
        type:'POST',
        url:"RestaurantManagerMenu/getMenuDetailsAjax",
        dataType:'json',
        data:{
            _menuID : menuID
        },
    
        success: function(result){
            const json = result;
            document.getElementById('menu-topic').innerHTML =  "<input type='text' id='form-menu-topic' value='"+json.name+"' name='form-topic'>";
           document.getElementById('menu-header').innerHTML =   "<input type='text' id='form-menu-header' value = '"+json.name+"' name='form-menu-header'>";
           document.getElementById('menu-veg_nonveg').innerHTML =  "<input type='text' id='form-menu-veg_nonveg' value='"+json.veg_NonVeg+"' name='form-menu-veg_nonveg'>";
           document.getElementById('menu-description').innerHTML =   "<textarea id='form-menu-description'  name='form-menu-descriptio' rows='4' col='50'>"+json.description+"</textarea> "; 
           //document.getElementById('menu-ingredients').innerHTML =  json.ingredients; 
           document.getElementById('menu-price-small').innerHTML =  "<input type='text' id='form-menu-price-small' value='"+json.priceSmall+"' name='form-menu-price-small'>"; 
           document.getElementById('menu-price-medium').innerHTML =  "<input type='text' id='form-menu-price-medium' value='"+json.priceMedium+"' name='form-menu-price-medium'>"; 
           document.getElementById('menu-price-large').innerHTML =  "<input type='text' id='form-menu-price-large' value='"+json.priceLarge+"' name='form-menu-price-large'>";
           document.getElementById("updateEmployee").innerHTML = "<button class='updateEmployee' id='form-updateEmployee' onclick='Accept_for_button()'>Update data</button>"
           
           
            
            console.log(result);
            //location.reload()
            
        },
        error: function(result){
            alert("Update not completed");
        }
    
        
    })
  

}


function Accept_for_button(){
     header = document.getElementById("form-menu-header").value;
     menuname = document.getElementById("form-menu-topic").value;
    veg_nonveg = document.getElementById("form-menu-veg_nonveg").value;
 
    description = document.getElementById("form-menu-description").value;
    small_price = document.getElementById("form-menu-price-small").value;
    medium_price = document.getElementById("form-menu-price-medium").value;
    large_price = document.getElementById("form-menu-price-large").value;

    document.getElementById("popUp-to-update-delete").style.visibility = "visible";
    //document.getElementById("popup-topic").style.zIndex = -100;
    document.getElementById("popup-topic").style.filter = "blur(10px)";
    //document.getElementById("popUp-content").style.zIndex = -100;
    document.getElementById("popUp-content").style.filter = "blur(10px)";
    document.getElementById("Msg").innerHTML = "Update the Menu Item";
    document.getElementById("delete-update-btn").innerHTML = "<button class='updateEmployee' id='updateEmployee3' onclick='update_data_in_menu()'>Update</button>"
}

function Reject_for_button(){
  document.getElementById("popUp-to-update-delete").style.visibility = "visible";
  document.getElementById("popup-topic").style.zIndex = -100;
  document.getElementById("popup-topic").style.filter = "blur(10px)";
  document.getElementById("popUp-content").style.zIndex = -100;
  document.getElementById("popUp-content").style.filter = "blur(10px)";
  document.getElementById("Msg").innerHTML = "Delete the Menu Item";
  document.getElementById("delete-update-btn").innerHTML = "<button class='deleteEmployee' id='deleteEmployee3' onclick='DeleteMenuItem()'>Delete</button>"
}



function update_data_in_menu(){
    console.log("In update menu function");
    //console.log(document.getElementById("form-menu-price-small").value);
   console.log(small_price);

   if(small_price >0 && medium_price > 0 && large_price >0){

   $.ajax({
    type:'POST',
    url:"RestaurantManagerMenu/update_menu_ajax",
    data:{
        _header : header,
        _name : menuname,
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
}

    //console.log(typeof(detail1));
}
function DeleteMenuItem(){
    var menuID = menuIDGlobal;

    $.ajax({
        type:'POST',
        url:"RestaurantManagerMenu/DeleteMenuItem",
        dataType:"json",
        data :{
            _menuID : menuID,
           
        },
        success: function(result){

            console.log("successfully Deleted");
            location.reload();
            
        },
        error: function(result){
            alert("Update not completed");
        }
    
        
    })



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
 


}



function getInputForSmall(){
    document.getElementById("small-price").style.visibility="visible";
    document.getElementById("small-btn").style.visibility="hidden";

}
function getInputForMedium(){
    document.getElementById("medium-price").style.visibility="visible";
    document.getElementById("medium-btn").style.visibility="hidden";

}
function getInputForLarge(){
    document.getElementById("large-price").style.visibility="visible";
    document.getElementById("large-btn").style.visibility="hidden";

}


