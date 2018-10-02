/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function foodDropdown() {
    document.getElementById("foodDropdown").classList.toggle("show");
}
function drinkDropdown() {
    document.getElementById("drinkDropdown").classList.toggle("show");
}
function offerDropdown() {
    document.getElementById("offerDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}