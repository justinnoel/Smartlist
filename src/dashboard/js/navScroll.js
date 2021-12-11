export function navColor() {
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
}