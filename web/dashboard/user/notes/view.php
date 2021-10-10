<?php
session_start();
include("../../cred.php");
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM notes WHERE id= " . $_GET['id'];
  $users = $dbh->query($sql);
  foreach ($users as $row){
?>
<style>
  #cke_bottom_detail,.cke_bottom{display:none}
  iframe * {
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif !important;
  }
</style>
<div class="modal-content" style="padding: 0 !important">
  <?php if(!empty($row['banner'])) {?> <img src="<?=$row['banner'];?>" onmousedown ="this.style.maxHeight = 'unset'" width="100%" style="object-fit: cover;max-height: 20vh" class="materialboxed"><?php } else echo '<img  class="materialboxed"src="https://www.solidbackgrounds.com/images/950x350/950x350-light-gray-solid-color-background.jpg" width="100%" style="object-fit: cover;max-height: 3vh">';?>
  <form method="POST" action="./user/notes/edit.php" id="editNoteForm" style="padding: 20px">
    <div class="input-field">
      <label for="content">Title</label>
      <input name="title" autocomplete="off" type="text" id="s1" required value="<?=htmlspecialchars($row['title']);?>">
    </div>
    <div class="input-field">
      <label> </label>
      <textarea name="content" style="min-height: 300px;" id="s2" class="materialize-textarea" required><?=htmlspecialchars($row['content']);?>
      </textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
  </form>
  <br>
  <br>
</div>
<div class="modal-footer" style="background: var(--bg-color);z-index: 2">
  <a onclick="$('#ajaxLoader').load('./user/notes/delete.php?id=<?=$row['id']; ?>', getHashPage);" class="left modal-close btn btn-flat  waves-effect"><i class="material-icons">delete</i></a>
  <a onclick="viewNote('<?=$row['id']; ?>');" class="left btn btn-flat  waves-effect"><i class="material-icons">refresh</i></a>
  <a onclick="$('#editNoteForm').submit()" class="btn btn-flat waves-effect modal-close">Close</a>
  <a onclick="$('#editNoteForm').submit()" class="btn green darken-3 waves-effect waves-light"><i class='material-icons left' style='color: white !important'>save</i>Save</a>
</div>
<?php
                          }
  $dbh = null;
}
catch(PDOexception $e)
{
  echo "Error is: " . $e->etmessage();
}
?>

<script>
  // var isMobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i)
  // if(!isMobile)  var simplemde = new SimpleMDE({ element: document.getElementById("s2") });
  // if(isMobile)  document.getElementById("s2").classList.add('materialize-textarea')
  // window.onbeforeunload = function() {return "";}
  M.textareaAutoResize($('#s2'));
  $("#s1").focus()
  $("#s2").focus()
  $("#s1").focus()
  $("#editNoteForm").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        M.toast({unsafeHTML: `<span>${data}</span><button class="btn-flat toast-action" onclick="viewNote('<?=$_GET['id'];?>');M.Toast.dismissAll()">View</button>`});
        window.onbeforeunload = null
      }
    });
  });
  $('.materialboxed').materialbox()
  CKEDITOR.replace('s2', {
    skin: 'moono-lisa',
    enterMode: CKEDITOR.ENTER_BR,
    shiftEnterMode:CKEDITOR.ENTER_P,
    toolbar: [{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
              { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
              { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
              { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
              { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
              { name: 'links', items: [ 'Link', 'Unlink' ] },
              { name: 'insert', items: [ 'Image'] },
              { name: 'spell', items: [ 'jQuerySpellChecker' ] },
              { name: 'table', items: [ 'Table' ] }
             ],
  });
  setInterval(() => {
    if(document.getElementById('s2')) document.getElementById('s2').value = CKEDITOR.instances.s2.getData()
  }, 10);
</script>