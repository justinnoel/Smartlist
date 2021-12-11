/** 
 * @file main.js
 * @copyright Smartlist 2021
 * @author Manu G, 2021
 * @todo Write documentation for this file
 * @todo Make the `item` function more efficient
 */
/**
 * Use strict mode
 */
'use strict';
/**  
 * Loads a page into an element via AJAX
 *  
 * @constructor
 * @param {string} e - The file name
 * @param {string} c - The element to load the content in
 * @param {string} n - (Optional) Options to hide loader, etc.
 */

class loadPage {
  constructor(e, c, n) {
    (this.file = e),
      (this.el = c),
      (this.options = n),
      document.querySelector(c)
        ? (c = document.querySelector(c))
        : console.error(c + " does not exist!"),
      (n && !1 === n.loader) ||
        (c.innerHTML =
          '\n      <center>\n        <div class="loader">\n          <svg viewBox="0 0 32 32" width="42" height="42">\n            <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>\n          </svg>\n        </div>\n      </center>'),
      n && n.callback ? $(c).load(e, () => n.callback) : $(c).load(e);
  }
}
/**
 * @constructor
 * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Classes/extends
 */
class DateFormatter extends Date {
  getFormattedDate() {
    return `${["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec",][this.getMonth()]} ${this.getDate()}, ${this.getFullYear()}`;
  }
}

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

/**
 * @param {Element} e - The element to be detected
 * Detects if an elemnet is visible or not
 */

function isVisible(e) {
    return !!( e.offsetWidth || e.offsetHeight || e.getClientRects().length );
}

// Register the serviceWorker
navigator.serviceWorker.register("https://smartlist.ga/dashboard/sw.js");

/**
 * @description - Handles the avatar form submission
 * @param {*} event - The event that triggered the function
 */
document.getElementById("avatarChangeForm").addEventListener("submit", (event) =>
  sendData(event).then((res) => {
    window.location.reload();
  })
);

/**
 * 
 * @param {*} r - The message to display
 * @param {*} o - The url where the error originated from
 * @param {*} e - The line number
 * @returns true
 */
window.onerror = function (r, o, e) {
  return (
    M.Toast.dismissAll(),
    r.includes("DataCloneError") ||
      M.toast({ html: "Error message: " + r + "<br>Line Number: " + e }),
    !0
  );
};

/**  
 * Highlights an item in the side navigation menu
 *  
 * @param {element} el - The element to trigger
 */
function sidenav_highlight(el) {
   if (document.querySelector(".sidenav-active")) document.querySelectorAll(`sidenav-active`).forEach(e => e.classList.remove("sidenav-active"))
   setTimeout(function () { el.classList.add("sidenav-active") }, 1)
}

// Makes the navbar's box shadow greater on scroll
var prevScrollpos = window.pageYOffset;
 function navColor() {
   var currentScrollPos = window.pageYOffset;
   var __navBar = document.getElementById("__navBar");
   if (document.documentElement.scrollTop > 0 || document.body.scrollTop > 0) {
      __navBar.classList.add('blue-grey');
      document.querySelector('meta[name="theme-color"]').setAttribute("content", document.documentElement.classList.contains("_darkTheme") ? "#404040" : "#"+user.navScrollColor);
   }
   else {
      __navBar.classList.remove('blue-grey');
      document.querySelector('meta[name="theme-color"]').setAttribute("content", document.documentElement.classList.contains("_darkTheme") ? "#212121" : '#fff');
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
window.onscroll = navColor;

window.addEventListener("load", () => {

   // Initialize item sidenav
   M.Sidenav.init(document.querySelectorAll("#item_sidenav"), {
      edge: "right",
      onOpenStart() {
         itemState = 1;
      },
      onCloseStart() { itemState = 0 }
   });
   M.Tabs.init(document.querySelectorAll(".tabs"));
   // Initialize version 4.0 modal
   if (!localStorage.getItem("feedbackBeta")) {
      setTimeout(function () {
         $("#feedbackBeta").modal({ dismissible: false })
         M.Modal.getInstance(document.getElementById('feedbackBeta')).open()
      }, 1000)
   }
   // Initialize sidenav
    M.Sidenav.init(document.querySelectorAll('.sidenav'), {
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
      }
    });
   // Initialize all modals
    M.Modal.init(document.querySelectorAll('.modal'), {
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
      }
    });
   // Initialize custom select options
   M.FormSelect.init(document.querySelectorAll('select'));

   // Initialize autocomplete
   // The variable `autocompleteData` is in /dashboard/js/autocomplete.js
   M.Autocomplete.init(document.querySelectorAll('.autocomplete'), {
      // specify options here
      data: autocompleteData,
      limit: 5
    });

var form = document.getElementById("feedback-form");
/**
 * 
 * @param {*} event - The event that triggered the function
 */
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
         M.Modal.getInstance(document.getElementById('_feedback')).close()
         form.reset();
      })
      .catch((error) => {
         status.innerHTML = "Oops! There was a problem submitting your form";
      });
}
form.addEventListener("submit", handleSubmit);


/**
 * @description - Function for toggling dark sidenav
 */
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


   getHashPage('hide')
   // initializes edit sidenav
     M.Sidenav.init(document.querySelectorAll('#edit_sidenav'), {
      edge: 'right',
      onCloseStart() {
         if (document.documentElement.classList.contains("_darkTheme")) {
            document
               .querySelector('meta[name="theme-color"]')
               .setAttribute("content", "#212121");
         } else {
            if (itemState == 0) {
               document
                  .querySelector('meta[name="theme-color"]')
                  .setAttribute("content", '#fff');
            }
         }
      }
   });
});



/**
 * @description - Handles the edit form submission
 * @param {*} event - The event that triggered the function
 */

document.getElementById("edit_form").addEventListener("submit", (event) =>
  sendData(event).then((res) => {
    M.Sidenav.getInstance(document.getElementById('edit_sidenav')).close()
         document.getElementById("title").innerHTML =
            "<br><br>" + document.getElementById("edit_item_name").value;
         document.getElementById("qty").innerHTML =
            "Quantity: " + document.getElementById("edit_item_qty").value;
         document.getElementById("dateID").innerHTML =
            "<b>Last updated on: </b>" + document.getElementById("date1").value;
         document.getElementById("edit_form").reset();
         getHashPage();
         M.Sidenav.getInstance(document.getElementById('item_sidenav')).close()
  })
);


/**  
 * Callback for right clicking on a custom room
 *  
 * @param {number} id - Gets the id of the custom room
 */
function croom_rclick(id) {
   document.getElementById("croom_rclick_id").innerHTML = 'Room ID: ' + id
   M.Modal.getInstance(document.getElementById('croom_rclick')).open()
   document.getElementById('add_croom').href = '#/add/' + id;
   document.getElementById('del_croom').href = 'https://smartlist.ga/dashboard/rooms/custom_room/custom_room_delete.php?id=' + id + '&name=cgffg'
}

// Prevents links and images from being dragged
setInterval(() => document.querySelectorAll("a, img").forEach(el => el.setAttribute("draggable", false)), 1000)


// Updates the date when the user presses a key
window.addEventListener('keyup', () => {
   document.getElementById('date1').value = `${new Date().getMonth() + 1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`
})

// Initializes item sidenavs. 
M.Sidenav.init(document.getElementById("item_sidenav"), {
 edge: 'right'
});

M.Sidenav.getInstance(document.getElementById('item_sidenav')).open()
M.Sidenav.getInstance(document.getElementById('item_sidenav')).close()
setTimeout(() => {
   document.getElementById("item_sidenav").style.opacity = 1;
   document.getElementById("item_sidenav").style.pointerEvents = "unset";
}, 500)


// Known bug: causes errors when the user scrolls
document.documentElement.addEventListener('touchstart', (e) => {
   if (e.pageX > 10 && e.pageX < window.innerWidth - 10) return;

   // prevent swipe to navigate gesture
   // e.preventDefault();
});

// Handles when the note create form is submitted

document.getElementById("addNoteForm").addEventListener("submit", (event) =>
  sendData(event).then((res) => {
    M.toast({ unsafeHTML: `<span>Success!</span>` });
    if (window.location.hash == "#/notes") { getHashPage(); }
    else { window.location.hash = "#/notes" }
    $(".modal").modal("close");
    window.onbeforeunload = null;
  })
);

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
if(/(CrOS)/.test(navigator.userAgent)) {
   document.documentElement.classList.add("chromeOs")
}