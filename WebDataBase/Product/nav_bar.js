/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";}







function myFunction1(name_dropdown) {
  if (name_dropdown=="myDropdown1") {
    document.getElementById("myDropdown2").classList.remove('show');
    document.getElementById("myDropdown1").classList.toggle("show");
  }
  else if (name_dropdown=="myDropdown2") {
    document.getElementById("myDropdown1").classList.remove('show');
    document.getElementById("myDropdown2").classList.toggle("show");
  }
}

// Close the dropdown menu if the user clicks outside of it
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
