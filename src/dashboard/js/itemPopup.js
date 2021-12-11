/**  
 * Opens an item
 *  
 * @param {element} el - The `TR` element
 * @param {number} star - If the item is starred or not
 * @param {string} string - Labels for the item
 * @param {string} room - Specifies the room
 */

export function item(el, star, label, room) {
   var id = el.getAttribute("data-id");
   document.getElementById("star").getElementsByTagName("i")[0].classList.remove("star-active")
   if (star === 1) {
      document.getElementById("star").getElementsByTagName("i")[0].classList.add("star-active")
      document.getElementById("star").getElementsByTagName("i")[0].innerHTML =
         "star";
   } else {
      document.getElementById("star").getElementsByTagName("i")[0].classList.remove("star-active")
      document.getElementById("star").getElementsByTagName("i")[0].innerHTML =
         "star_outline";
   }
   var form = document.getElementById("edit_form");
   form.action = "./rooms/editItem.php?room=" + room;
   if (room == "kitchen") { form.action = "./rooms/editItem.php?room=products" }
   if (room == "custom_room") { form.action = "./rooms/custom_room/custom_item_edit.php" }
   document.getElementById("edit_item_id").value = id;
   document.getElementById("dateID").innerHTML = "<b>Last updated on:</b> <span onclick='copyToClipboard(this.innerText)'>" + el.getAttribute("data-date").replace("on", "at") + "</span><br>" + "<b>Item ID:</b><span onclick='copyToClipboard(this.innerText)'> " + id + "</span>";
   var actions = {
      action_task: document.getElementById("action_task"),
      action_qr: document.getElementById("action_qr"),
      action_share: document.getElementById("action_share"),
      action_mail: document.getElementById("action_mail"),
      action_wa: document.getElementById("action_wa"),
      action_share_p: document.getElementById("action_share_p"),
      action_recipe: document.getElementById("action_recipe"),
      action_delete: document.getElementById("action_delete"),
      navbar: {
         star: document.getElementById("star"),
         edit: document.getElementById("edit"),
         delete: document.getElementById("delete"),
      },
   };
   $("#item_sidenav").sidenav({
      edge: "right",
      onOpenStart() {
         $('.sidenav-overlay').css("z-index", "9999")
         document.getElementById("item_sidenav").style.zIndex = 9999999;
         itemState = 1;
         if (window.innerWidth < 992) {
            if (document.documentElement.classList.contains("_darkTheme")) {
               document
                  .querySelector('meta[name="theme-color"]')
                  .setAttribute("content", "#212121");
            }
            else {
               document
                  .querySelector('meta[name="theme-color"]')
                  .setAttribute("content", "#cfd8dc");
            }
         }
         else {
            document
               .querySelector('meta[name="theme-color"]')
               .setAttribute("content", '#707070');
         }
      },
      onCloseStart: navColor,
      onCloseEnd() { itemState = 0; $('.sidenav-overlay').css("z-index", "") }
   });
   M.Sidenav.getInstance(document.getElementById('item_sidenav')).open()
   var name = el.getElementsByTagName("td")[0].innerText;
   var qty = el.getElementsByTagName("td")[1].innerText;
   action_share.href = `https://smartlist.ga/s/${room}/${encodeURIComponent(name.replace(' ', '-').toLowerCase())}/${encodeURIComponent(qty.replace(' ', '-').toLowerCase())}/${encodeURIComponent(label)}/${id}`;
   actions.action_qr.href =
      "https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=" +
      encodeURI("I currently have " + qty + " " + name + " in my inventory") + "&format=svg";
   actions.action_mail.href =
      "mailto:hello@smartlist.ga?subject=My%20Inventory%20Status%20%7C%20Smartlist&body=Hi%20_____%2C%0D%0AI'm%20currently%20having%20" +
      encodeURI(qty) +
      "%20" +
      encodeURI(name) +
      "%20in%20my%20" +
      encodeURI(room) +
      ".%0D%0A%0D%0AThank%20you%2C%0D%0ASincerely%2C%0D%0A________";
   actions.action_task.onclick = function () {
      loadURL(
         "./rooms/shopping_add.php?name=" + encodeURI(name),
         function () {
            M.Toast.dismissAll();
            M.toast({
               html: "Added to grocery list",
            });
         }
      );
   };
   actions.navbar.edit.onclick = function () {
      M.Sidenav.getInstance(document.getElementById('edit_sidenav')).open()
      document.getElementById("edit_item_name").value = name;
      document.getElementById("edit_item_qty").value = qty;
      document.getElementById("edit_item_qty").focus();
      document.getElementById("edit_item_name").focus();
   };
   if (room !== "kitchen") {
      actions.action_recipe.style.display = "none";
   } else if (room == "kitchen") {
      actions.action_recipe.style.display = "";
      actions.action_recipe.href =
         "https://www.google.com/search?q=recipes+with+" + encodeURI(name);
   }
   actions.navbar.delete.onclick = function () {
      M.Sidenav.getInstance(document.getElementById('item_sidenav')).close()
      M.Toast.dismissAll();
      M.toast({
         html: "Deleted!",
      });
      el.remove();
      loadURL("./rooms/deleteItem.php?room=" + room.replace("kitchen", "products").replace("laundryroom", "laundry").replace("storage", "storageroom") + "&id=" + id, getHashPage);
      if (room == "custom_room") {
         loadURL("./rooms/custom_room/custom_item_delete.php?id=" + id);
      }
   };
   actions.navbar.star.onclick = function () {
      if (actions.navbar.star.getElementsByTagName("i")[0].innerHTML == "star") {
         el.style.borderLeft = "none";
         document.getElementById("star").getElementsByTagName("i")[0].classList.remove("star-active")
         actions.navbar.star.getElementsByTagName("i")[0].innerHTML =
            "star_outline";
         el.onclick = function () {
            item(el, 0, label, room);
         };
      } else {
         el.style.borderLeft = "3px solid #f57f17";
         document.getElementById("star").getElementsByTagName("i")[0].classList.add("star-active")
         actions.navbar.star.getElementsByTagName("i")[0].innerHTML = "star";
         el.onclick = function () {
            item(el, 1, label, room);
         };
      }
      loadURL("./rooms/starItem.php?room=" + room.replace("kitchen", "products").replace("laundryroom", "laundry").replace("storage", "storageroom") + "&id=" + id);
      if (room == "custom_room") {
         loadURL("./rooms/custom_room/star.php?id=" + id);
      }
   };
   actions.action_share_p.onclick = function () {
      if (navigator.share) {
         document.getElementById("action_share_p").style.display = "block";
         navigator
            .share({
               title: document.title,
               text:
                  "I'm currently having " + qty + " " + name.plural().toLowerCase() + " in my inventory.",
               url: window.location.href,
            })
            .then(() => console.log("Successful share"))
            .catch((error) => console.log("Error sharing:", error));
      }
   };

   document.getElementById("title").innerHTML = "<br><br>" + name;
   document.getElementById("qty").innerHTML = `Quantity: ${(qty.trim() == "" ? "(empty)" : qty)}`;
   document.getElementById("chips").innerHTML = "";
   if (el.classList.contains("sync_tr")) {
      document.getElementById(
         "chips"
      ).innerHTML += `<div class="chip green white-text darken-3 waves-effect waves-light" onclick="copyToClipboard(this.innerText)">Synced</div>`;
   }
   if (star === 1) {
      document.getElementById(
         "chips"
      ).innerHTML += `<div class="chip orange white-text darken-3 waves-effect waves-light" onclick="copyToClipboard(this.innerText)">Starred</div>`;
   }
   if (label.trim() !== "") {
      label.split(",").forEach((e) => {
         document.getElementById(
            "chips"
         ).innerHTML += `<div class="chip waves-effect" onclick="copyToClipboard(this.innerText)">${e}</div>`;
      });
   }

}