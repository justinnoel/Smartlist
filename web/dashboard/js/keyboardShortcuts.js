document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.which == 83) {
    event.preventDefault();
    $(".modal").modal("close");
    $("#addItem").modal("open");
  } else if (e.which == 27) {
    if ($("#edit_sidenav").is(":visible")) {
      $("#edit_sidenav").sidenav("close");
    }
  } else if (e.ctrlKey && e.which == 76) {
    event.preventDefault();
    $(".modal").modal("close");
    window.location.hash = "#/add/todo";
  } else if (e.ctrlKey && e.which == 66) {
    event.preventDefault();
    $("#bmmodal").modal("open");
  } else if (e.ctrlKey && e.which == 191) {
    e.preventDefault();
    $("#keyboardShortcuts").modal("open");
  } else if (e.ctrlKey && e.which == 188) {
    event.preventDefault();
    $(".modal").modal("close");
    window.location.hash = "#/settings";
  } else if (e.ctrlKey && e.which == 71) {
    event.preventDefault();
    $(".modal").modal("close");
    window.location.hash = "#/add/shopping-list";
  } else if ((e.shiftKey && e.which == 27) || (e.metaKey && e.which == 27)) {
    event.preventDefault();
  }
});
