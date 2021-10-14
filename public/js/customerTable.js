let table = document.querySelectorAll(".table");
let details = document.querySelectorAll(".table-det");

for (let i = 0; i < table.length; i++) {
  table[i].addEventListener("click", function () {
    console.log(table[i]);
    console.log(details[i]);
    for (let j = 0; j < table.length; j++) {
      table[j].classList.remove("select");
      details[j].classList.add("inactive");
    }
    table[i].classList.add("select");
    details[i].classList.add("active");
    details[i].classList.remove("inactive");
  });
}
