/**  
 * Function when chips are pressed below the "add item" feature
 *  
 * @param {element} el - The chip
 */
export function chipValue(el) {
   var input = el.parentElement.parentElement.getElementsByTagName("input")[0];
   input.focus();
   input.value = el.innerText;
   if (el.parentElement.parentElement.getElementsByTagName("input")[1]) el.parentElement.parentElement.getElementsByTagName("input")[1].focus();
   if (el.parentElement.parentElement.getElementsByTagName("input")[1]) el.parentElement.parentElement.getElementsByTagName("input")[1].value = 1;
}