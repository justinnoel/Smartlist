<!DOCTYPE html>
<html>
  <head>
    <title>Add items to shopping list?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        -webkit-tap-highlight-color: transparent;
        box-sizing: border-box;
      }
      body {
        background: #b0bec5;
      }
      #app {
        position: fixed;
        top: 50%;
        left: 50%;
        background: #fff;
        padding: 40px 30px;
        display: block;
        border-radius: 9px;
        width: 450px;
        text-align: left;
        transform: translate(-50%, -50%);
        transform-origin: center;
        animation: zoom .2s forwards;
        font-family: "Outfit", sans-serif;
        opacity: 0;
      }
      @keyframes zoom {
        0% {
          transform: translate(-50%, -50%) scale(.9);
          opacity: 0;
        }
        100% {
          opacity: 1;
          transform: translate(-50%, -50%) scale(1);
        }
      }
      #app h5 {
        font-weight: bold;
        line-height: 0;
        font-size: 18px;
      }
      #app p {
        color: #505050;
        font-size: 15px;
      }
      #app button {
        font-family: "Outfit", sans-serif;
        font-size: 15px;
        margin-top: 15px;
        background: #177a40;
        color: white;
        cursor: pointer;
        user-select: none;
        padding: 13px 10px;
        border-radius: 10px;
        width: 100%;
        outline: 0;
        border: 0;
      }
      #app button:focus {
        box-shadow: 0px 0px 0px 3px #a5d6a7;
      }
      .circle {
        width: 50px;
        background: #e8f5e9;
        padding: 10px;
        border-radius: 9999px;
        height: 50px;
        display: inline-block;
        background: ;
      }
      .items {
        max-height: 30vh;
        padding-left: 10px;
        overflow: overlay;
        box-shadow: inset 0px -199px 20px -199px rgba(0,0,0,0.4);
        position: relative;
      }
      ::-webkit-scrollbar {
        width: 19px;
      }

      ::-webkit-scrollbar-thumb {
        border: 5px solid rgba(0, 0, 0, 0);
        background-clip: padding-box;
        border-radius: 9999px;
        background-color: #aaaaaa;
      }
      ::-webkit-scrollbar-thumb:hover {
        background-color: #808080;
      }
      ::-webkit-scrollbar-thumb:active {
        background-color: #707070;
      }
      .item i {
        position: relative;
        top: 5px;
        left: 15px;
      }
      .item i {
        user-select: none;
        padding: 3px;
        border: 1px solid rgba(0, 0, 0, 0);
        outline: 0;
        border-radius: 9999px;

        cursor: pointer;
      }
      .item i:hover {
        background: #eee;
      }
      .item i:focus {
        border: 1px solid rgba(0, 0, 0, 1);
        background: #eee;
      }
      @media only screen and (max-width: 500px) {
        #app {
          width: calc(100% - 10px);
        }
      }
      .loader {
        border: 2px solid #000;
        border-top: 2px solid transparent;
        width: 15px;
        height: 15px;
        border-radius: 999px;
        display: inline-block;
        animation: spin 0.5s linear infinite;
      }
      button[disabled] {
        cursor: auto !important;
        background: #eceff1 !important;
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }
    </style>
  </head>
  <body>
    <div id="app">
      <div id="main">
        <center>
          <div class="circle" style="background: #eee">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
              />
            </svg>
          </div>
          <h5 id="title">Add to my shopping list</h5>
          <p id="desc">
            Would you like to add the following items to your shopping list in
            Smartlist? You can edit your list by tapping the
            <i class="material-icons" style="font-size: 15px; line-height: 10px"
              >remove_circle_outline</i
            >
            button
          </p>
        </center>
        <div class="items" id="items"></div>
        <button onclick="addItems()" id="addButton">Add</button>
      </div>
    </div>
    <script>
      if (window.location.hash.includes("#")) {
        window.location.hash
          .replace("#/", "")
          .replace("#", "")
          .split(",")
          .forEach((e) => {
            document.getElementById("items").innerHTML += `<p class="item">
          ${decodeURI(e)
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;")}<a onclick="this.parentElement.remove()"
            ><i tabindex="0" class="material-icons">remove_circle_outline</i></a
          >
        </p>`;
          });
      } else {
        document.getElementById("items").innerHTML = `<p class="item">
          ${window.location.hash}<a onclick="this.parentElement.remove()"
            ><i tabindex="0" class="material-icons">remove_circle_outline</i></a
          >
        </p>`;
      }
      document.getElementById("items").addEventListener("scroll", function () {
        if (document.getElementById("items").scrollTop == 0) {
          document.getElementById(
            "items"
          ).style.boxShadow = `inset 0px -199px 20px -199px rgba(0,0,0,0.4)`;
        } else {
          document.getElementById(
            "items"
          ).style.boxShadow = `inset 0px 199px 20px -199px rgba(0,0,0,0.4)`;
        }
      });
      function addItems() {
        let items = [];
        document
          .querySelectorAll(".item a")
          .forEach((el) => (el.style.visibility = "hidden"));
        document
          .querySelectorAll(".item")
          .forEach((e) => items.push(e.innerText));
        console.log(items);
        let btn = document.getElementById("addButton");
        btn.disabled = true;
        btn.innerHTML = `<div class="loader"></div>`;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          document.title = "Authenticating... (Step 1/2)";
          if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "true") {
              var xhttp1 = new XMLHttpRequest();
              xhttp1.onreadystatechange = function () {
                document.title = "Verifying... (Step 2/2)";
                setTimeout(function() {
                  document.title = "Success!";
                }, 400)
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("app").style.display = "none";
                  document.getElementById("main").innerHTML = `
						<center><div class="circle"><svg class="h-6 w-6 text-green-600" stroke="#1b5e20" fill="none" viewBox="0 0 24 24" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /> </svg></div><h5>Success!</h5><p>We've added the items to your shopping list</p>${this.responseText}</center><button onclick="window.open('//smartlist.ga/dashboard/#/user-dashboard')">View</button>
						`;
                  setTimeout(function () {
                    document.getElementById("app").style.display = "block";
                  }, 1);
                }
              };
              xhttp1.open(
                "GET",
                "/dashboard/user/grocerylist/add-api.php?c=" + items.join("|"),
                true
              );
              xhttp1.withCredentials = true;
              xhttp1.send();
            } else {
            var win = window.open('https://smartlist.ga/dashboard/login.php?close'); 
          var timer = setInterval(function() { 
              if(win.closed) {
                  clearInterval(timer);
                  addItems()
              }
          }, 1000);
           }
          } 
        };

        xhttp.open("GET", "/dashboard/user/loginStatus.php", true);
        xhttp.withCredentials = true;
        xhttp.send();
      }
    </script>
  </body>
</html>