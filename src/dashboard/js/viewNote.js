/**
 * Opens a note popup
 * @param {int} id - The note ID
 */
export function viewNote(id) {
  $("#noteView").modal({ 
    dismissible: false, 
    onCloseEnd: function() {
      window.onbeforeunload = function() {return "";}
    } 
  })
  M.Modal.getInstance(document.getElementById('noteView')).open()
  document.getElementById("noteView").innerHTML = `
<div class="modal-content center">
<center style="padding-top: 100px;">
<svg class='circular' height='50' width='50'>
<circle class='path' cx='25' cy='25' r='20' fill='none' stroke-width='3' stroke-miterlimit='10' />
</svg>
</center>
</div>
`;
  $('#noteView').load('./user/notes/view.php?id='+id);
}