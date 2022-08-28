//get table details using ajax

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

var tableNo;
function table_table(tablenumber){
    tableNo = tablenumber;

    var xhr = new XMLHttpRequest();

    xhr.open('GET','RestaurantManagerTable/table_table/'+tableNo);
    //console.log(tableNo);

    xhr.onload = function() {
        if(xhr.status == 200){
            const table_detial = xhr.responseText;
            const json = JSON.parse(table_detial);
            console.log(json);
            var sizejson = Object.keys(json).length;
           // const json = table_detial;

           // console.log(json);
            //console.log(sizejson);
            
            document.getElementById('TableDetail-header').innerHTML = "Table " + json[0].tableNo;
            document.getElementById('TableDetail-maxCovers').innerHTML = "Maximum Covers " + json[0].maxCover;
            document.getElementById('TableDetail-minCovers').innerHTML = "Minimum Covers " + json[0].minCover;
            var sum_string1 ="";
            var i = 0;
            while(i<sizejson){
                if(json[i].reservationID !=null && json[i].status == "Pending" ){
                    console.log(typeof(json[i].reservationTime));
                sum_string2 = "  ON  "+json[i]._date + "  AT  "+json[i].reservationTime+ "<br>";
                sum_string1 = sum_string1 + sum_string2;
                }
                i++;
            }
            //console.log(sum_string1);
            document.getElementById("reservation-details").innerHTML = sum_string1;
            

        }
    }

    xhr.send();
    //change the color of table after clicking it
    for(i=1; i<26; i++){

        var idvalue = document.getElementById('table-'+ i); 
    
        if(idvalue != null ){
            idvalue.style.backgroundColor = "rgb(240, 236, 40)";
            
        }

        if(tableNo == i){
            document.getElementById('table-'+tableNo).style.backgroundColor = "red";
           
        }
            
        
        
    }

    document.getElementById('layout').style.width = "70%";
    document.getElementById('table-detail-id').style.visibility = "visible";
    
}
function AddNewTableAjax(){
    //console.log("in AddNewTableAjax ");
    document.getElementById('error-section').style.visibility = "hidden";

    var table_Number = document.getElementById('table_number').value;
    var max_cover = document.getElementById('max_covers').value;
    var min_cover = document.getElementById('min_covers').value ;
    var area = document.getElementById('area').value ;
    console.log(table_Number);

    $.ajax({
        type:'POST',
        url:"RestaurantManagerTable/addNewTable",
        dataType:'json',
        data:{
            _tableNumber : table_Number,
            _maxCovers : max_cover,
            _minCovers : min_cover,
            _area : area

        },
    
        success: function(result){
            console.log(result);
            console.log("success");
            location.reload();
            
            //console.log(result[0]);
            //location.reload()
            
        },
        error: function(result){
            console.log(result.responseText);
            document.getElementById('error-section').style.visibility = "visible";
            document.getElementById('error01').innerHTML = result.responseText;

            document.getElementById("add-table-id").style.filter = "blur(10px)";
            document.getElementById("layout-in-input").style.filter = "blur(10px)";
            
           // document.getElementById("main-area-id").style.filter = "blur(10px)";
           // document.getElementById("navigation-id").style.filter ="blur(10px)";

            //alert("Update not completed");
            //console.log(result.error);
        }
    
        
    })
    
    

}

//deleting table using ajax

function delete_table(){

console.log("deleteTable");
    var xhr  = new XMLHttpRequest();

    xhr.open('GET', 'RestaurantManagerTable/deleteTable/'+tableNo);

    xhr.onload = function() {
        if(xhr.status == 200){
            const delete_detial = xhr.responseText;
            console.log(delete_detial);

            if(delete_detial == '1'){
                document.getElementById('popup-success-message').style.visibility = "visible";
                document.getElementById('popup-delete').style.visibility = "hidden";
                //location.reload();
            }else{
                document.getElementById('popup-success-message').style.visibility = "visible";
                document.getElementById("deleteSec").innerHTML = delete_detial;
                document.getElementById('popup-delete').style.visibility = "hidden";
            }
            console.log(delete_detial);
           
        }
    }
    xhr.send();




}



function changeColor() {
 document.querySelector(".table_").style.backgroundColor = "red";
console.log("Suwasana");
 
}
function go_back_to_table(){
    location.reload();
}

function addNewTable(){
    document.getElementById('error-section').style.visibility = "hidden";
    document.getElementById("add-table-id").style.visibility = "visible";
    document.getElementById("layout-in-input").style.visibility = "visible";
    
    document.getElementById("main-area-id").style.filter = "blur(10px)";
    document.getElementById("navigation-id").style.filter ="blur(10px)";
    

}
function closeme(){
    document.getElementById("main-area-id").style.filter = "blur(0px)";
    document.getElementById("navigation-id").style.filter = "blur(0px)";
    document.getElementById("add-table-id").style.visibility = "hidden";
    document.getElementById("layout-in-input").style.visibility = "hidden";


}




function openEdit(){
    document.getElementById("edit_table").style.visibility = "hidden";
    document.getElementById("delete-update-btn").style.visibility = "visible";
}

function doneUpdate(){
    document.getElementById("edit_table").style.visibility = "visible";
    document.getElementById("delete-update-btn").style.visibility = "hidden";

}

function deletetable(tableno){
    window.location.href = '../.././RestaurantManagerTable/deleteTable('+tableno +')';

}
function layout_adjust(){
    document.getElementById("layout").style.width = "70%";
    

}
function deletedisplay(){
    document.getElementById("popup-delete").style.visibility= "visible";

}

function no_delete(){
    document.getElementById("popup-delete").style.visibility= "hidden";
}
