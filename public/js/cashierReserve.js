function showProfile() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}

function showCalender() {
    var popup = document.getElementById("popupCalen");
    popup.classList.toggle("show");
}

function showCustCalender() {
    var popup = document.getElementById("popupCustCalen");
    popup.classList.toggle("show");
}

// Start of choose time & date form

function selectdate_time(){
    document.getElementById("popupdateform").style.display = "block";
}

function closeFormtime_date(){
    document.getElementById("popupdateform").style.display = "none";
}

// End of choose time & date form

function showreservedList(){
    var popup = document.getElementById("popupupReservations");
    popup.classList.toggle("show");
}

// Start table reservation form

function closereserveForm1(){
    document.getElementById("Tform1").style.display = "none";
}

function showreserveForm1(){
    document.getElementById("Tform1").style.display = "block";
}

function changetoUnavailable1() {
    document.getElementById('unavailableT1').style.backgroundColor = '#FF9040';  
}

function closereserveForm2(){
    document.getElementById("Tform2").style.display = "none";
}

function showreserveForm2(){
    document.getElementById("Tform2").style.display = "block";
}

function changetoUnavailable2() {
    document.getElementById('unavailableT2').style.backgroundColor = '#FF9040';  
}

function closereserveForm3(){
    document.getElementById("Tform3").style.display = "none";
}

function showreserveForm3(){
    document.getElementById("Tform3").style.display = "block";
}

function changetoUnavailable3() {
    document.getElementById('unavailableT3').style.backgroundColor = '#FF9040';  
}

function closereserveForm6(){
    document.getElementById("Tform6").style.display = "none";
}

function showreserveForm6(){
    document.getElementById("Tform6").style.display = "block";
}

function changetoUnavailable6() {
    document.getElementById('unavailableT6').style.backgroundColor = '#FF9040';  
}

function closereserveForm12(){
    document.getElementById("Tform12").style.display = "none";
}

function showreserveForm12(){
    document.getElementById("Tform12").style.display = "block";
}

function changetoUnavailable12() {
    document.getElementById('unavailableT12').style.backgroundColor = '#FF9040';  
}

function closereserveForm15(){
    document.getElementById("Tform15").style.display = "none";
}

function showreserveForm15(){
    document.getElementById("Tform15").style.display = "block";
}

function changetoUnavailable15() {
    document.getElementById('unavailableT15').style.backgroundColor = '#FF9040';  
}

function closereserveForm16(){
    document.getElementById("Tform16").style.display = "none";
}

function showreserveForm16(){
    document.getElementById("Tform16").style.display = "block";
}

function changetoUnavailable16() {
    document.getElementById('unavailableT16').style.backgroundColor = '#FF9040';  
}

// End of table reservation form

// Start already reserved popup

function showalreadyReservedT4(){
    var popup = document.getElementById("popupmessageT4");
    popup.classList.toggle("show");
}

function showalreadyReservedT5(){
    var popup = document.getElementById("popupmessageT5");
    popup.classList.toggle("show");
}

function showalreadyReservedT8(){
    var popup = document.getElementById("popupmessageT8");
    popup.classList.toggle("show");
}

function showalreadyReservedT9(){
    var popup = document.getElementById("popupmessageT9");
    popup.classList.toggle("show");
}

function showalreadyReservedT10(){
    var popup = document.getElementById("popupmessageT10");
    popup.classList.toggle("show");
}

function showalreadyReservedT11(){
    var popup = document.getElementById("popupmessageT11");
    popup.classList.toggle("show");
}

function showalreadyReservedT13(){
    var popup = document.getElementById("popupmessageT13");
    popup.classList.toggle("show");
}

function showalreadyReservedT14(){
    var popup = document.getElementById("popupmessageT14");
    popup.classList.toggle("show");
}
// End already reserved popup

//  Start change to available

function changetoAvailableT4() {
    document.getElementById('unavailableT4').style.backgroundColor = '#4AF8C4';
}

function changetoAvailableT5() {
    document.getElementById('unavailableT5').style.backgroundColor = '#4AF8C4';
}

function changetoAvailableT8() {
    document.getElementById('unavailableT8').style.backgroundColor = '#4AF8C4';
}

function changetoAvailableT9() {
    document.getElementById('unavailableT9').style.backgroundColor = '#4AF8C4';
}

function changetoAvailableT10() {
    document.getElementById('unavailableT10').style.backgroundColor = '#4AF8C4';
}

function changetoAvailableT11() {
    document.getElementById('unavailableT11').style.backgroundColor = '#4AF8C4';
}

function changetoAvailableT13() {
    document.getElementById('unavailableT13').style.backgroundColor = '#4AF8C4';
}

function changetoAvailableT14() {
    document.getElementById('unavailableT14').style.backgroundColor = '#4AF8C4';
}

//  End change to available


