/**  
 * Sorts a table
 *  
 * @param {number} n - Is this even used LMAO
 * @param {element} table - Table to sort
 * @param {string} dir - Direction to sort the table (ascending or descending)
 */
export function sortTable(n, table, dir = "asc") {
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
         switchcount++;
      } else {
         if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
         }
      }
   }
}