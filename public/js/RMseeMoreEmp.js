
function DeleteEmp(NIC){

    console.log("In delete function")
    $.ajax({
        type:'POST',
        url:"../../RestaurantManagerEmployee/DeleteEmp",
        dataType:'json',
        data:{
            _NIC: NIC
        },
        success: function(result){
            console.log(result);
            console.log("Delete Succesful");
            window.location.href = '/gp1/RestaurantManagerEmployee/';

            
        },error: function(){
         
            
        }
})
}

function UpdateEmp(empID){

    console.log("In update function")
    document.getElementById("pop-up-emp").style.visibility = "hidden";
    document.getElementById("update-pop-up").style.visibility = "visible";




}
