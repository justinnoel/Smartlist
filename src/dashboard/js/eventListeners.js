document
  .getElementById("menuTrigger")
  .addEventListener("click", () =>
    M.Sidenav.getInstance(document.getElementById("slide-out")).open()
  );
document.getElementById("searchTrigger").addEventListener("click", () => {
  document.getElementById("searchBar").classList.toggle("hide");
  document.getElementById("search").focus();
});
document
  .getElementById("accountDropdown.close.avatar")
  .addEventListener("click", hideAccountDropdown);
document
  .getElementById("accountDropdown.close.settings")
  .addEventListener("click", hideAccountDropdown);
document.getElementById("search.close.mobile").addEventListener("click", () => {
  document
    .querySelectorAll("#searchBar, #searchResultsApp")
    .forEach((el) => el.classList.add("hide"));
  if (document.getElementById("searchResultsApp")) {
    history.back();
  }
});
document
  .getElementById("search.close.desktop")
  .addEventListener("click", () =>
    document.getElementById("searchBar").classList.add("hide")
  );
document
  .getElementById("user.profile.image.revertToDefault")
  .addEventListener("click", () => {
    document.getElementById("src").src =
      "https://3.bp.blogspot.com/-qDc5kIFIhb8/UoJEpGN9DmI/AAAAAAABl1s/BfP6FcBY1R8/s320/BlueHead.jpg";
    document.getElementById("avatar_file_upload_input").value =
      "//3.bp.blogspot.com/-qDc5kIFIhb8/UoJEpGN9DmI/AAAAAAABl1s/BfP6FcBY1R8/s320/BlueHead.jpg";
  });
document.getElementById("slide-out").oncontextmenu = function () {
  return false;
};
document.getElementById("nav.toggleRail").addEventListener("click", () => {
  document.body.classList.toggle("material-sidenav:rail"),
    localStorage.setItem(
      "sidenavRail",
      document.body.classList.contains("material-sidenav:rail")
        ? "true"
        : "false"
    );
  document
    .getElementById("nav.toggleRail")
    .getElementsByTagName("i")[0].innerHTML = document.body.classList.contains(
    "material-sidenav:rail"
  )
    ? "menu"
    : "menu_open";
});
document
  .getElementById("popup.close")
  .addEventListener("click", () =>
    localStorage.setItem("feedbackBeta", "true")
  );
document.querySelectorAll(".sidenav-highlight").forEach((el) =>
  el.addEventListener("click", (event) => {
    sidenav_highlight(event.target);
  })
);
document.querySelectorAll(".copyOnClick").forEach((el) =>
  el.addEventListener("click", (event) => {
    copyToClipboard(event.target.innerText);
  })
);
document
  .getElementById("item.edit.submit")
  .addEventListener("click", () => $("#edit_form").submit());
document
  .getElementById("addNoteFormSubmit")
  .addEventListener("click", () => $("#addNoteForm").submit());
document
  .getElementById("action_wa")
  .addEventListener("click", () =>
    window.open(
      `https://api.whatsapp.com/send/?phone&text=${encodeURIComponent(
        "I currently have" +
          document.getElementById("qty").innerHTML.replace("Quantity: ", "") +
          " " +
          document.getElementById("title").innerText
      )}&app_absent=0`
    )
  );
document
  .getElementById("croom_rclick_id")
  .addEventListener("click", (event) => {
    navigator.clipboard.writeText(event.target.innerText.replace(/\D/g, ""));
    M.toast({ html: "Copied to clipboard!" });
  });
document.getElementById("item.edit.add").addEventListener("click", () => {
  var e = document.getElementById("edit_item_qty");
  (e.value = parseInt(e.value) + 1), e.focus();
});
document.getElementById("item.edit.subtract").addEventListener("click", () => {
  var e = document.getElementById("edit_item_qty");
  (e.value = parseInt(e.value) - 1), e.focus();
});
document
  .getElementById("nav.toggleRail")
  .getElementsByTagName("i")[0].innerHTML = document.body.classList.contains(
  "material-sidenav:rail"
)
  ? "menu"
  : "menu_open";

document
  .querySelectorAll("#app, #slide-out, #_navBar, #fab, #addItem")
  .forEach((el) =>
    el.addEventListener("click", function (e) {
      document.getElementById("accountDropdown").classList.add("fadeOut");
      setTimeout(function () {
        document.getElementById("accountDropdown").classList.add("hide");
      }, 200);
    })
  );