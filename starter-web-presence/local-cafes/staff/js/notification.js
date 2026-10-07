document.addEventListener("DOMContentLoaded", function () {
    const notifBtn = document.getElementById("notifBtn");
    const notifDropdown = document.getElementById("notifDropdown");
  
    // Toggle dropdown on click
    notifBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      notifDropdown.classList.toggle("show");
    });
  
    // Close dropdown when clicking anywhere outside
    document.addEventListener("click", function (e) {
      if (!notifDropdown.contains(e.target) && !notifBtn.contains(e.target)) {
        notifDropdown.classList.remove("show");
      }
    });
  });