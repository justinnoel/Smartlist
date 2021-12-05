'use strict';
document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.which == 83) {
    e.preventDefault();
    // $(".modal").modal("close");
    $("#addItem").modal("open");
  } else if (e.which == 27) {
    if ($("#edit_sidenav").is(":visible")) {
      $("#edit_sidenav").sidenav("close");
    }
  } else if (e.ctrlKey && e.which == 76) {
    e.preventDefault();
    $(".modal").modal("close");
    window.location.hash = "#/add/reminder";
  }
  else if (e.ctrlKey && e.which == 66) {
    e.preventDefault();
    $(".modal").modal("close");
    $("#bmmodal").modal("open");
  }
  else if (e.ctrlKey && !e.shiftKey && e.which == 77) {
    e.preventDefault();
    $("#slide-out").sidenav("open");
  }
  else if (e.ctrlKey && e.which == 66) {
    e.preventDefault();
    $("#bmmodal").modal("open");
  } else if (e.ctrlKey && e.which == 191) {
    e.preventDefault();
    $("#keyboardShortcuts").modal("open");
  } else if (e.ctrlKey && e.which == 188) {
    e.preventDefault();
    $(".modal").modal("close");
    window.location.hash = "#/settings";
  } else if (e.ctrlKey && e.which == 71) {
    e.preventDefault();
    $(".modal").modal("close");
    window.location.hash = "#/add/shopping-list";
  } else if ((e.shiftKey && e.which == 27) || (e.metaKey && e.which == 27)) {
    e.preventDefault();
  }
});
