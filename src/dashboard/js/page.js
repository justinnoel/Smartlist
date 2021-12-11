'use strict';
function page(el) {
   document
      .querySelectorAll(".page")
      .forEach((e) => e.classList.remove("loginActive"));
   document.querySelectorAll(el).forEach((e) => e.classList.add("loginActive"));
}
