$(document).ready(function(){
    $("#select_menu").on("change",function() {
            var menu_name = $('#select_menu').find("option:selected").val();
            searchData(menu_name)
        })
    })
    function searchData(menu_name) {
        if(menu_name.toUpperCase()=='ALL'){
            $('#menu_table tbody tr').show();
        } else{
            $('#menu_table tbody tr:has(td)').each(function(){
                var rowname = $.trim($(this).find('td:eq(3)').text());
                if(rowname.toUpperCase() == menu_name.toUpperCase()){
                    $(this).show();
                } else {
                    $(this).hide();
                }
            })
        }
    }