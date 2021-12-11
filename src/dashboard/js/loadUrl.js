
/**
 * Loads a script via AJAX
 * @param {string} url - The URL to load
 * @param {string} method - The method (GET, POST, PUT, PATCH, DELETE)
 */
export function loadURL(url, method="GET", callback = ()=>{}) {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ajaxLoader").innerHTML = this.responseText;
      let arr = document.getElementById("ajaxLoader").getElementsByTagName('script')
      for (var n = 0; n < arr.length; n++) {
        Function(arr[n].innerHTML)()
      }
      callback();
    }
  };
  xhttp.open(method, url, true);
  xhttp.send();
}