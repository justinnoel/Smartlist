/** 
 * @file main.js
 * @copyright Smartlist 2021
 * @todo Write documentation for this file
 * @todo Make the `item` function more efficient
 * @todo Remove all `case` statements which are unnecessary
 */ 
/**
 * Use strict mode
 */
 'use strict';
 /**  
  * Loads a page into an element via AJAX
  *  
  * @param {string} file - The file name
  * @param {string} el - The element to load the content in
  * @param {string} options - (Optional) Options to hide loader, etc.
  */ 
 
 class loadPage {
   constructor(file, el, options) {
     this.file = file;
     this.el = el;
     this.options = options;
     if (document.querySelector(el)) {
       el = document.querySelector(el);
     } else {
       console.error(el + " does not exist!");
     }
     if (options && options.loader === false) {
     } else {
       el.innerHTML = `
       <center>
         <div class="loader">
           <svg viewBox="0 0 32 32" width="42" height="42">
             <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
           </svg>
         </div>
       </center>`;
     }
     if (options && options.callback) {
       $(el).load(file, () => options.callback);
     } else {
       $(el).load(file);
     }
   }
 }
 
 class DateFormatter extends Date {
 
   getFormattedDate() {
     const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
       'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
     return `${months[this.getMonth()]} ${this.getDate()}, ${this.getFullYear()}`;
   }
 
 }
 
 // Create a new toast at the bottom of the page when there is an error
 window.onerror = function (msg, url, linenumber) {
   // CloudFlare sometimes creates weird `DataCloneError` so hide any errors containing the word
   if (!msg.includes("DataCloneError")) {
     M.toast({html:"Error message: " + msg + "<br>Line Number: " + linenumber});
   }
   return true;
 };
 
 /**  
  * Pluralizes a word
  *  
  * @param {string} word - Initial word
  * @see https://stackoverflow.com/a/27194360/14715255
  * @return {string} this - Returns the plural subject
  */ 
 
 String.prototype.plural = (revert) => {
   var plural = {
     "(quiz)$": "$1zes",
     "^(ox)$": "$1en",
     "([m|l])ouse$": "$1ice",
     "(matr|vert|ind)ix|ex$": "$1ices",
     "(x|ch|ss|sh)$": "$1es",
     "([^aeiouy]|qu)y$": "$1ies",
     "(hive)$": "$1s",
     "(?:([^f])fe|([lr])f)$": "$1$2ves",
     "(shea|lea|loa|thie)f$": "$1ves",
     sis$: "ses",
     "([ti])um$": "$1a",
     "(tomat|potat|ech|her|vet)o$": "$1oes",
     "(bu)s$": "$1ses",
     "(alias)$": "$1es",
     "(octop)us$": "$1i",
     "(ax|test)is$": "$1es",
     "(us)$": "$1es",
     "([^s]+)$": "$1s",
   };
 
   var singular = {
     "(quiz)zes$": "$1",
     "(matr)ices$": "$1ix",
     "(vert|ind)ices$": "$1ex",
     "^(ox)en$": "$1",
     "(alias)es$": "$1",
     "(octop|vir)i$": "$1us",
     "(cris|ax|test)es$": "$1is",
     "(shoe)s$": "$1",
     "(o)es$": "$1",
     "(bus)es$": "$1",
     "([m|l])ice$": "$1ouse",
     "(x|ch|ss|sh)es$": "$1",
     "(m)ovies$": "$1ovie",
     "(s)eries$": "$1eries",
     "([^aeiouy]|qu)ies$": "$1y",
     "([lr])ves$": "$1f",
     "(tive)s$": "$1",
     "(hive)s$": "$1",
     "(li|wi|kni)ves$": "$1fe",
     "(shea|loa|lea|thie)ves$": "$1f",
     "(^analy)ses$": "$1sis",
     "((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$": "$1$2sis",
     "([ti])a$": "$1um",
     "(n)ews$": "$1ews",
     "(h|bl)ouses$": "$1ouse",
     "(corpse)s$": "$1",
     "(us)es$": "$1",
     s$: "",
   };
 
   var irregular = {
     move: "moves",
     foot: "feet",
     goose: "geese",
     sex: "sexes",
     child: "children",
     man: "men",
     tooth: "teeth",
     person: "people",
   };
 
   var uncountable = [
     "sheep",
     "fish",
     "deer",
     "moose",
     "series",
     "species",
     "money",
     "rice",
     "information",
     "equipment",
   ];
   // save some time in the case that singular and plural are the same
   if (uncountable.indexOf(this.toLowerCase()) >= 0) return this;
   // check for irregular forms
   for (word in irregular) {
     if (revert) {
       var pattern = new RegExp(irregular[word] + "$", "i");
       var replace = word;
     } else {
       var pattern = new RegExp(word + "$", "i");
       var replace = irregular[word];
     }
     if (pattern.test(this)) return this.replace(pattern, replace);
   }
 
   if (revert) var array = singular;
   else var array = plural;
   // check for matches using regular expressions
   for (reg in array) {
     var pattern = new RegExp(reg, "i");
 
     if (pattern.test(this)) return this.replace(pattern, array[reg]);
   }
 
   return this;
 };
 
 // This removes tooltips when a user focuses on the window. This is because of a previous bug, where tooltips do not disappear.
 window.addEventListener("focus", () => {
   if(document.querySelector(".material-tooltip")) {document.querySelectorAll(".material-tooltip").forEach(e=>e.remove())}
   if(window.location.hash!=="#/settings"&&window.location.hash!=="#/user-dashboard") {
     getHashPage("hide");
   }
 });
 
 // Switches the page on the `popState` event
 window.addEventListener("popstate", (e) => {
   var a = true;
   if (!$(".modal").is(":visible")) {
     getHashPage();
     a = false;
   } else {
     e.preventDefault();
     $(".modal").modal("close");
     a = true;
   }
   if (a === true) {
     history.pushState(null, null, window.location.href);
   }
   $(".sidenav-active").removeClass("sidenav-active");
 });
 
 
 /**  
  * Opens an item
  *  
  * @param {element} el - The `TR` element
  * @param {number} star - If the item is starred or not
  * @param {string} string - Labels for the item
  * @param {string} room - Specifies the room
  */ 
 function item(el, star, label, room) {
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
   form.action = "./rooms/editItem.php?room="+room;
   if(room=="kitchen") {form.action="./rooms/editItem.php?room=products"}
   if(room=="custom_room") {form.action="./rooms/custom_room/custom_item_edit.php"}
   document.getElementById("edit_item_id").value = id;
   document.getElementById("dateID").innerHTML = "<b>Last updated on:</b> <span onclick='copyToClipboard(this.innerText)'>" + el.getAttribute("data-date").replace("on", "at") + "</span><br>" + "<b>Item ID:</b><span onclick='copyToClipboard(this.innerText)'> "+id + "</span>";
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
       $('#item_sidenav').css("z-index", "9999999")
       itemState=1;
       if($(window).width() < 992) {
         if(document.documentElement.classList.contains("_darkTheme")) {
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
     onCloseStart() {
       if (document.documentElement.classList.contains("_darkTheme")) {
         document
           .querySelector('meta[name="theme-color"]')
           .setAttribute("content", "#212121");
       } else {
         document
           .querySelector('meta[name="theme-color"]')
           .setAttribute("content", '#fff');
       }
     },
     onCloseEnd() {itemState=0;$('.sidenav-overlay').css("z-index", "")}
   });
   $("#item_sidenav").sidenav("open");
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
     $("#ajaxLoader").load(
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
     $("#edit_sidenav").sidenav("open");
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
     $("#item_sidenav").sidenav("close");
     M.Toast.dismissAll();
     M.toast({
       html: "Deleted!",
     });
     el.remove();
     $("#ajaxLoader").load("./rooms/deleteItem.php?room="+room.replace("kitchen", "products").replace("laundryroom", "laundry").replace("storage", "storageroom")+"&id=" + id, getHashPage);
     if(room == "custom_room") {
       $("#ajaxLoader").load("./rooms/custom_room/custom_item_delete.php?id=" + id);
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
     $("#ajaxLoader").load("./rooms/starItem.php?room="+room.replace("kitchen", "products").replace("laundryroom", "laundry").replace("storage", "storageroom")+"&id=" + id);
     if(room == "custom_room") {
       $("#ajaxLoader").load("./rooms/custom_room/star.php?id=" + id);
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
   document.getElementById("qty").innerHTML = `Quantity: ${(qty.trim() == "" ? "(empty)": qty)}`;
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
   if(label.trim() !==""){
     label.split(",").forEach((e) => {
       document.getElementById(
         "chips"
       ).innerHTML += `<div class="chip waves-effect" onclick="copyToClipboard(this.innerText)">${e}</div>`;
     });
   }
 
 }
 
 // Register the serviceWorker
 navigator.serviceWorker.register("https://smartlist.ga/dashboard/sw.js");
 
 // Function for sending a desktop notification
 function showNotification(data) {
   Notification.requestPermission(function (result) {
     if (result === "granted") {
       navigator.serviceWorker.ready.then(function (registration) {
         registration.showNotification("Smartlist", {
           body: data,
           icon: "https://i.ibb.co/X5LcCc4/logo-z3yoqm-modified-removebg-preview-modified.png",
           vibrate: [200, 100, 200, 100, 200, 100, 200],
           // tag: 'vibration-sample'
         });
       });
     }
   });
 }
 
 /**  
  * Highlights an item in the side navigation menu
  *  
  * @param {element} el - The element to trigger
  */ 
 function sidenav_highlight(el) {
   if(document.querySelector(".sidenav-active")) document.querySelectorAll(`sidenav-active`).forEach(e=>e.classList.remove("sidenav-active"))
   setTimeout( function() {el.classList.add("sidenav-active")}, 1)
 }
 
 // Makes the navbar's box shadow greater on scroll
 var prevScrollpos = window.pageYOffset;
 window.onscroll = function () {
   var currentScrollPos = window.pageYOffset;
   var __navBar = document.getElementById("__navBar");
   if (document.documentElement.scrollTop > 0 || document.body.scrollTop > 0) {
     __navBar.classList.add('blue-grey');
     document.querySelector('meta[name="theme-color"]') .setAttribute( "content", document.documentElement.classList.contains("_darkTheme") ? "#404040" :  user.navScrollColor);
   }
   else {
     __navBar.classList.remove('blue-grey');
     document.querySelector('meta[name="theme-color"]') .setAttribute( "content", document.documentElement.classList.contains("_darkTheme") ? "#212121" : '#fff' );
   }
   if (prevScrollpos > currentScrollPos) {
     document.getElementById("fab").style.width = "150px";
     document
       .getElementById("fab")
       .getElementsByTagName("i")[0]
       .classList.remove("active_i");
     setTimeout(function () {
       document
         .getElementById("fab")
         .getElementsByTagName("span")[0].style.opacity = 1;
     }, 50);
   } else {
     document
       .getElementById("fab")
       .getElementsByTagName("span")[0].style.opacity = 0;
     setTimeout(function () {
       document.getElementById("fab").style.width = "56px";
       document
         .getElementById("fab")
         .getElementsByTagName("i")[0]
         .classList.add("active_i");
     }, 100);
   }
   prevScrollpos = currentScrollPos;
 };
 
 /**  
  * Adds an expense to the budget meter
  */ 
 function bm_add() {
   var x = document.getElementById("bm_amount");
   var e = document.getElementById("bm_select");
   $("#ajaxLoader").load(
     "https://smartlist.ga/dashboard/user/finance/addFinance.php?n=" +
     encodeURI(x.value) +
     "&label=" +
     encodeURI(e.value) +
     "&date="+ 
     encodeURIComponent(document.getElementById('budgetDate').value)
   );
   x.value = "";
   setTimeout(function() {
     new loadPage("./pages/dashboard.php", "#app", { loader: false });
   }, 200)
 }
 /**  
  * Close the item sidenav when `ESC` is pressed
  *  
  * @todo Remove the "e.keyCode"
  */ 
 window.addEventListener("keydown", (e) => {
   switch (
     e.keyCode
   ) {
     case 27: 
       $('#item_sidenav').sidenav('close'); 
       if($(window).width() < 992) {$("#slide-out").sidenav("close");}
       break;
   }
 });
 
 window.addEventListener("load", () => {
   // Initialize item sidenav
   $('#item_sidenav').sidenav({
     edge: "right",
     onOpenStart() {
       itemState = 1;
     },
     onCloseStart() {itemState = 0}
   });
   $(".tabs").tabs();
   // Initialize version 4.0 modal
   $("#feedbackBeta").modal({ dismissible: false, onOpenStart() { document .querySelector('meta[name="theme-color"]') .setAttribute( "content", document.documentElement.classList.contains("_darkTheme") ? "#101010" : '#707070' ); }, onCloseStart() { document .querySelector('meta[name="theme-color"]') .setAttribute( "content", document.documentElement.classList.contains("_darkTheme") ? "#101010" : '#707070' ); localStorage.setItem("feedbackBeta", "true"); }, }); 
 
   if (!localStorage.getItem("feedbackBeta")) { 
     setTimeout(function() {
       $("#feedbackBeta").modal({ dismissible: false})
        $("#feedbackBeta").modal("open");
     }, 1000)
   }
   // Initialize sidenav
   $(".sidenav").sidenav({
     onOpenStart() {
       // Change the top theme color on open
       document
         .querySelector('meta[name="theme-color"]')
         .setAttribute(
         "content",
         document.documentElement.classList.contains("_darkTheme")
         ? "#101010"
         : '#707070'
       );
     },
     onCloseStart() {
       // Change the top theme color on close
       if (document.documentElement.classList.contains("_darkTheme")) {
         document
           .querySelector('meta[name="theme-color"]')
           .setAttribute("content", "#212121");
       } else {
         document
           .querySelector('meta[name="theme-color"]')
           .setAttribute("content", '#fff');
       }
     },
   });
   // Initialize all modals
   $(".modal").modal({
     onOpenStart() {
       // Change the top theme color on open
       document
         .querySelector('meta[name="theme-color"]')
         .setAttribute(
         "content",
         document.documentElement.classList.contains("_darkTheme")
         ? "#101010"
         : '#707070'
       );
     },
     onCloseStart() {
       // Change the top theme color on close
       if (document.documentElement.classList.contains("_darkTheme")) {
         document
           .querySelector('meta[name="theme-color"]')
           .setAttribute("content", "#212121");
       } else {
         document
           .querySelector('meta[name="theme-color"]')
           .setAttribute("content", '#fff');
       }
     },
   });
   // Initialize custom select options
   $("select").formSelect();
   // Initialize autocomplete
   // The variable `autocompleteData` is in /dashboard/js/autocomplete.js
   $("input.autocomplete").autocomplete({
     data: autocompleteData,
     limit: 6,
   });
 });
 
 // Function for copying text to clipboard
 function copyToClipboard(data) {
   navigator.clipboard.writeText(data.toString())
   // Show success message
   M.Toast.dismissAll();
   setTimeout(() => M.toast({
     html: "Copied text to Clipboard",
   }), 200)
 }
 
 // Handle the submit event for the feedback form
 var form = document.getElementById("feedback-form");
 async function handleSubmit(event) {
   event.preventDefault();
   var status = document.getElementById("my-form-status");
   var data = new FormData(event.target);
   fetch(event.target.action, {
     method: form.method,
     body: data,
     headers: {
       Accept: "application/json",
     },
   })
     .then((response) => {
     M.Toast.dismissAll();
     M.toast({
       html: "Thanks for your submission!",
     });
     $("#_feedback").modal("close");
     form.reset();
   })
     .catch((error) => {
     status.innerHTML = "Oops! There was a problem submitting your form";
   });
 }
 form.addEventListener("submit", handleSubmit);
 
 // Really idiotic function name for filtering the search results
 function qq() {
   $("#noSearchResultsHeading").show();
   $("#noSearchResultsContainer").hide();
   var input, filter, ul, li, a, i, txtValue;
   input = document.getElementById("search");
   filter = input.value.toUpperCase();
   ul = document.getElementById("search_results");
   li = ul.getElementsByTagName("li");
   for (i = 0; i < li.length; i++) {
     a = li[i].getElementsByTagName("a")[0];
     txtValue = a.textContent || a.innerText;
     if (txtValue.toUpperCase().indexOf(filter) > -1) {
       li[i].classList.remove("hide");
     } else {
       li[i].classList.add("hide");
     }
   }
   if ($("#search_results li:not(.hide)").length == 0) {
     $("#noSearchResultsHeading").hide();
     $("#noSearchResultsContainer").show();
   }
 }
 
 /**  
  * Toggles dark theme
  */ 
 function dark_mode() {
   document.documentElement.classList.toggle("_darkTheme");
   localStorage.setItem(
     "theme",
     document.documentElement.classList.contains("_darkTheme") === true
     ? "true"
     : "false"
   );
   document.cookie = "dark="+(document.documentElement.classList.contains("_darkTheme") === true ? "true" : "false");
 }
 
 // Function for toggling dark sidenav
 function darkSidenav() {
   document.documentElement.classList.toggle("_darkSidenav");
   localStorage.setItem(
     "_darkSidenav",
     document.documentElement.classList.contains("_darkSidenav") === true
     ? "true"
     : "false"
   );
 }
 
 // Get dark themes from localStorage
 if (localStorage.getItem("theme") && localStorage.getItem("theme") == "true") {
   document.documentElement.classList.add("_darkTheme");
 }
 if (
   localStorage.getItem("_darkSidenav") &&
   localStorage.getItem("_darkSidenav") == "true"
 ) {
   document.documentElement.classList.add("_darkSidenav");
 }
 
 /**  
  * Function when chips are pressed below the "add item" feature
  *  
  * @param {element} el - The chip
  */ 
 function chipValue(el) {
   var input = el.parentElement.parentElement.getElementsByTagName("input")[0];
   input.focus();
   input.value = el.innerText;
   if(el.parentElement.parentElement.getElementsByTagName("input")[1]) el.parentElement.parentElement.getElementsByTagName("input")[1].focus();
   if(el.parentElement.parentElement.getElementsByTagName("input")[1]) el.parentElement.parentElement.getElementsByTagName("input")[1].value = 1;
 }
 
 // offline and events
 window.addEventListener("offline", () => {
   M.Toast.dismissAll();
   M.toast({ html: "You are offline. Please connect to the internet" });
 });
 window.addEventListener("online", () => {
   M.Toast.dismissAll();
   M.toast({ html: "Network connection restored!" });
 });
 
 // Handles the search form submission
 $("#searchForm").submit(function (e) {
   e.preventDefault();
 
   var form = $(this);
   var url = form.attr("action");
 
   $.ajax({
     type: "POST",
     url: url,
     data: form.serialize(),
     success: function (data) {
       var el = document.getElementById("searchResults");
       el.innerHTML = `<div class="modal-content" style="padding-top: 0!important"><a style="position: absolute;top: 20px;right: 20px"  class="right btn btn-floating btn-flat black-text waves-effect modal-close"><i class="material-icons" style="color: var(--font-color) !important">close</i></a> ${data}</div>`;
       $("#searchResults").modal("open");
       qq();
     },
   });
 });
 
 // Handles the form for for editing an item
 $("#edit_form").submit(function (e) {
   document.getElementById("date1").value = moment().format("M/D/Y");
   e.preventDefault();
   var form = $(this);
   var url = form.attr("action");
   $.ajax({
     type: "POST",
     url: url,
     data: form.serialize(),
     success: function (data) {
       $("#edit_sidenav").sidenav("close");
       document.getElementById("title").innerHTML =
         "<br><br>" + document.getElementById("edit_item_name").value;
       document.getElementById("qty").innerHTML =
         "Quantity: " + document.getElementById("edit_item_qty").value;
       document.getElementById("dateID").innerHTML =
         "<b>Last updated on: </b>"+ document.getElementById("date1").value;
       document.getElementById("edit_form").reset();
       getHashPage();
       $("#item_sidenav").sidenav("close");
     },
   });
 });
 // Changes avatar via a form
 $("#avatarChangeForm").submit(function (e) {
   e.preventDefault();
   var form = $(this);
   var url = form.attr("action");
   $.ajax({
     type: "POST",
     url: url,
     data: form.serialize(),
     success: function (data) {
       window.location.reload();
     },
   });
 });
 /**  
  * Uploads an image to imgbb
  *  
  * @see https://imgbb.com/api
  * @param {element} el - The element to trigger
  * @param {callback} callback - The callback function.
  * @return Returns an image URL
  */ 
 function fileChange(el, callback = function (e) {}) {
   var file = el;
   var form = new FormData();
   form.append("image", file.files[0]);
 
   var settings = {
     url: "https://api.imgbb.com/1/upload?key=5e97a7dae2b850713c9da081460622cf",
     method: "POST",
     timeout: 0,
     processData: false,
     mimeType: "multipart/form-data",
     contentType: false,
     data: form,
   };
 
   $.ajax(settings).done(function (response) {
     console.log(response);
     var jx = JSON.parse(response);
     callback(jx.data.url);
   });
 }
 // Initializes tabs
 $(".tabs").tabs();
 
 
 /**  
  * Callback for right clicking on a custom room
  *  
  * @param {number} id - Gets the id of the custom room
  */ 
 function croom_rclick(id) {
   document.getElementById("croom_rclick_id").innerHTML = 'Room ID: '+id
   $('#croom_rclick').modal('open');
   document.getElementById('add_croom').href='#/add/'+id;
   document.getElementById('del_croom').href='https://smartlist.ga/dashboard/rooms/custom_room/custom_room_delete.php?id='+id+'&name=cgffg'
 }
 
 // Prevents links and images from being dragged
 setInterval(() => $('a,img').attr('draggable', 'false'), 200)
 
 /**  
  * Filters results when searching
  *  
  * @param {element} el - The element for filtering
  */ 
 function filterResults(el) {
   var value = el.innerText;
   document.querySelectorAll("#search_results li").forEach(el => {
     if(el.innerText.toString().toLowerCase().includes(value.toLowerCase())) {
       el.style.display = "block"
     }
     else {
       el.style.display = "none"
     }
   })
 }
 
 // Updates the date when the user presses a key
 window.addEventListener('keyup', () => {
   document.getElementById('date1').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    
 })
 
 // Initializes item sidenavs. 
 $('#item_sidenav').sidenav({edge:'right'})
 $('#item_sidenav').sidenav("open")
 $('#item_sidenav').sidenav("close")
 setTimeout(() => {
   $('#item_sidenav').css("opacity", 1)
   $('#item_sidenav').css("pointer-events", "unset")
 }, 500)
 
 // More functions when the document loads
 window.addEventListener('load', () => {
   getHashPage('hide')
   // initializes edit sidenav
   $('#edit_sidenav').sidenav({ 
     edge:'right',
     onCloseStart() {
       if (document.documentElement.classList.contains("_darkTheme")) {
         document
           .querySelector('meta[name="theme-color"]')
           .setAttribute("content", "#212121");
       } else {
         if(itemState == 0) {
           document
             .querySelector('meta[name="theme-color"]')
             .setAttribute("content", '#fff');
         }
       }
     }
   })
 })
 
 /**  
  * Sorts a table
  *  
  * @param {number} n - Is this even used LMAO
  * @param {element} table - Table to sort
  * @param {string} dir - Direction to sort the table (ascending or descending)
  */ 
 function sortTable(n, table, dir = "asc") {
   var rows, switching, i, x, y, shouldSwitch, switchcount = 0;
   switching = true;
   /*Make a loop that will continue until
   no switching has been done:*/
   while (switching) {
     // //start by saying: no switching is done:
     switching = false;
     rows = table.rows;
     /*Loop through all table rows (except the
     first, which contains table headers):*/
     for (i = 1; i < (rows.length - 1); i++) {
       //start by saying there should be no switching:
       shouldSwitch = false;
       /*Get the two elements you want to compare,
       one from current row and one from the next:*/
       x = rows[i].getElementsByTagName("TD")[n];
       y = rows[i + 1].getElementsByTagName("TD")[n];
       //check if the two rows should switch place:
       if (dir == "asc") {
         if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
           //if so, mark as a switch and break the loop:
           shouldSwitch = true;
           break;
         }
       } else if (dir == "desc") {
         if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
           shouldSwitch = true;
           break;
         }
       }
     }
     /*If a switch has been marked, make the switch
       and mark that a switch has been done:*/
     if (shouldSwitch) {
       rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
       switching = true;
       switchcount ++;
     } else {
       if (switchcount == 0 && dir == "asc") {
         dir = "desc";
         switching = true;
       }
     }
   }
 }
 
 // Known bug: causes errors when the user scrolls
 document.documentElement.addEventListener('touchstart', (e) => {
   if (e.pageX > 10 && e.pageX < window.innerWidth - 10) return;
 
   // prevent swipe to navigate gesture
   // e.preventDefault();
 });
 
 // Handles when the note create form is submitted
 $("#addNoteForm").submit(function(e) {
   e.preventDefault();
   var form = $(this);
   var url = form.attr('action');
   $.ajax({
     type: "POST",
     url: url,
     data: form.serialize(),
     success: function(data) {
       M.toast({unsafeHTML: `<span>Success!</span>`});
       if(window.location.hash=="#/notes") {getHashPage();}
       else {window.location.hash="#/notes"}
       $(".modal").modal("close");
       window.onbeforeunload = null;
     }
   });
 });
 
 
 /**  
  * Scrolls into a search item
  *  
  * @param {number} id - ID of div to scroll into
  */ 
 function scrollInto(id) {
   $('.modal').modal("close")
   var el = document.querySelector(`[data-id='${id}']`);
   el.scrollIntoView();
   el.style.transition = "all .2s"
   el.style.background = "rgba(0, 0, 0, .2)";
   document.documentElement.scrollTop -= 200;
   setTimeout(() => {
     el.scrollIntoView();
     document.documentElement.scrollTop -= 200;
   }, 100)
   setTimeout(() => {
     el.style.background = ""
     el.style.transition = "";
   }, 2000)
 }
 
 /**  
  * Toggles an maintenance status
  *  
  * @param {element} el - Element to toggle
  */ 
 function mtoggle(el) {
   el.classList.toggle("green");
   el.classList.toggle("white-text");
 }
 // Prompt the user to install the Smartlist PWA
 var buttonInstall = document.getElementById('pwaInstallPromptAddButton');
 let deferredPrompt;
 window.addEventListener('beforeinstallprompt', (e) => {
   e.preventDefault();
   deferredPrompt = e;
   $('#pwaInstallPrompt').modal()
   $('#pwaInstallPrompt').modal('open');
   console.log(`'beforeinstallprompt' event was fired.`);
 });  
 buttonInstall.addEventListener('click', async () => {
   /* Hide the app provided install promotion */
   $('#pwaInstallPrompt').modal()
   $('#pwaInstallPrompt').modal('close')
   deferredPrompt.prompt();
   /*Wait for the user to respond to the prompt
   const { outcome } = await deferredPrompt.userChoice;
   Optionally, send analytics event with outcome of user choice
   console.log(`User response to the install prompt: ${outcome}`);*/
   deferredPrompt = null;
 });