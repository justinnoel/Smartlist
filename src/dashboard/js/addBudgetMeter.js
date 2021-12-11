
/**  
 * Adds an expense to the budget meter
 */
export function bm_add() {
   var x = document.getElementById("bm_amount");
   var e = document.getElementById("bm_select");
   loadURL(
      "https://smartlist.ga/dashboard/user/finance/addFinance.php?n=" +
      encodeURI(x.value) +
      "&label=" +
      encodeURI(e.value) +
      "&date=" +
      encodeURIComponent(document.getElementById('budgetDate').value)
   );
   x.value = "";
   setTimeout(function () {
      new loadPage("./user/dashboard.php", "#app", { loader: false });
   }, 200)
}