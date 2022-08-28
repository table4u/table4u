function filterMenu_mt() {
    let dropdown, table, rows, cells, menu, filter;
    dropdown = document.getElementById("select_menu");
    table = document.getElementById("menu_table");
    rows = table.getElementsByTagName("tr");
    filter = dropdown.value;
  
    for (let row of rows) { 
      cells = row.getElementsByTagName("td");
      menu = cells[2] || null;
      if (filter === "All" || !menu || (filter === menu.textContent)) {
        row.style.display = "";
      }
      else {
        row.style.display = "none"; 
      }
    }
  }

  function filterMenu_mt_ua() {
    let dropdown, table, rows, cells, menu, filter;
    dropdown = document.getElementById("select_menu_ua");
    table = document.getElementById("menu_table_ua");
    rows = table.getElementsByTagName("tr");
    filter = dropdown.value;
  
    for (let row of rows) { 
      cells = row.getElementsByTagName("td");
      menu = cells[2] || null;
      if (filter === "All" || !menu || (filter === menu.textContent)) {
        row.style.display = "";
      }
      else {
        row.style.display = "none"; 
      }
    }
  }

  function filter_Menu_veg() {
    let dropdown, table, rows, cells, menu, filter;
    dropdown = document.getElementById("selectmenu");
    table = document.getElementById("menu_table");
    rows = table.getElementsByTagName("tr");
    filter = dropdown.value;
  
    for (let row of rows) { 
      cells = row.getElementsByTagName("td");
      menu = cells[1] || null;
      if (filter === "All" || !menu || (filter === menu.textContent)) {
        row.style.display = "";
      }
      else {
        row.style.display = "none"; 
      }
    }
  }

  function filter_Menu_veg_ua() {
    let dropdown, table, rows, cells, menu, filter;
    dropdown = document.getElementById("selectmenu_ua");
    table = document.getElementById("menu_table_ua");
    rows = table.getElementsByTagName("tr");
    filter = dropdown.value;
  
    for (let row of rows) { 
      cells = row.getElementsByTagName("td");
      menu = cells[1] || null;
      if (filter === "All" || !menu || (filter === menu.textContent)) {
        row.style.display = "";
      }
      else {
        row.style.display = "none"; 
      }
    }
  }

function searchMenu() {
  var input, filter, table, tr, td, i, txtValue , table_ua, tr_ua, td_ua;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("menu_table");
  table_ua = document.getElementById("menu_table_ua");
  tr = table.getElementsByTagName("tr");
  tr_ua = table_ua.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  for (i = 0; i < tr_ua.length; i++) {
    td_ua = tr_ua[i].getElementsByTagName("td")[0];
    if (td_ua) {
      txtValue = td_ua.textContent || td_ua.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr_ua[i].style.display = "";
      } else {
        tr_ua[i].style.display = "none";
      }
    }
  }
}

function opentabmenu(evt, tabname) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("avl");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabname).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

// function popup(mylink, windowname) { 
//   if (! window.focus)
//     return true; 
//   var href; 
//   if (typeof(mylink) == 'string') 
//     href=mylink; 
//   else 
//     href=mylink.href; 
//   window.open(href, windowname, 'width=400,height=200,scrollbars=yes'); 
//   return false; }