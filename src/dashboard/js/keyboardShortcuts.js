'use strict';
document.addEventListener("keydown", function (e) {
  if (e.ctrlKey && e.which == 83) {
    e.preventDefault();
    M.Modal.getInstance(document.getElementById('addItem')).open()
  } else if (e.which == 27) {
    M.Sidenav.getInstance(document.getElementById('edit_sidenav')).close()
  } else if (e.ctrlKey && e.which == 76) {
    e.preventDefault();
    document.querySelectorAll('.modal').forEach(el => M.Modal.getInstance(el).close())
    window.location.hash = "#/add/reminder";
  }
  else if (e.ctrlKey && e.which == 66) {
    e.preventDefault();
    document.querySelectorAll('.modal').forEach(el => M.Modal.getInstance(el).close())
    M.Modal.getInstance(document.getElementById('bmmodal')).open()
  }
  else if (e.ctrlKey && !e.shiftKey && e.which == 77) {
    e.preventDefault();
    M.Sidenav.getInstance(document.getElementById('edit_sidenav')).open()
  }
  else if (e.ctrlKey && e.which == 66) {
    e.preventDefault();
    M.Modal.getInstance(document.getElementById('bmmodal')).open()
  } else if (e.ctrlKey && e.which == 191) {
    e.preventDefault();
    M.Modal.getInstance(document.getElementById('keyboardShortcuts')).open()
  } else if (e.ctrlKey && e.which == 188) {
    e.preventDefault();
    document.querySelectorAll('.modal').forEach(el => M.Modal.getInstance(el).close())
    window.location.hash = "#/settings";
  } else if (e.ctrlKey && e.which == 71) {
    e.preventDefault();
    document.querySelectorAll('.modal').forEach(el => M.Modal.getInstance(el).close())
    window.location.hash = "#/add/shopping-list";
  } else if ((e.shiftKey && e.which == 27) || (e.metaKey && e.which == 27)) {
    e.preventDefault();
  }
});
