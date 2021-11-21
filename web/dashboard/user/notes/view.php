<?php
session_start();
include("../../cred.php");
try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = $dbh->prepare("SELECT * FROM notes WHERE id=:id and login_id=:sessid");

  $sql->execute(array( ':sessid' => $_SESSION['id'], ':id' => $_GET['id'] ));
  $users = $sql->fetchAll();
  foreach ($users as $row){
?>
<style>
  #cke_bottom_detail,.cke_bottom{display:none}
  iframe * {
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif !important;
  }
  .ck-content .text-tiny {
      font-size: 0.7em;
  }

  .ck-content .text-small {
      font-size: 0.85em;
  }

  .ck-content .text-big {
      font-size: 1.4em;
  }

  .ck-content .text-huge {
      font-size: 1.8em;
  }
.ck-content {
  min-height: 100vh;
  border-radius: 4px!important;
  -webkit-box-shadow:0 4px 5px 0 rgba(0,0,0,0.14),0 1px 10px 0 rgba(0,0,0,0.12),0 2px 4px -1px rgba(0,0,0,0.3);box-shadow:0 4px 5px 0 rgba(0,0,0,0.14),0 1px 10px 0 rgba(0,0,0,0.12),0 2px 4px -1px rgba(0,0,0,0.3);
  padding: 1in !important;
  /* margin-top: 100px; */
}
.ck-toolbar{border:0!important;background:white!important}
.ck-toolbar{background:white!important;box-shadow: inset 0px 0px 0px 200000000px rgba(255,255,255,1)!important;}
@media only screen and (max-width: 600px) {
  .ck-content {
    padding: 15px !important;  
  }
.ck-sticky-panel__content {
  position: fixed!important;
  bottom: 0!important;
  background: white!important;
  transition: all .2s!important;
  word-wrap: none!important;
  padding: 15px!important;
  width: 100%!important;
  z-index: 9999;
  -webkit-box-shadow:0 3px 3px 0 rgba(0,0,0,0.14),0 1px 7px 0 rgba(0,0,0,0.12),0 3px 1px -1px rgba(0,0,0,0.2)!important;box-shadow=:0 3px 3px 0 rgba(0,0,0,0.14),0 1px 7px 0 rgba(0,0,0,0.12),0 3px 1px -1px rgba(0,0,0,0.2)!important;
  left: 0;      
}
.hide-toolbar {
  bottom: -100px!important;
}
.ck-toolbar__items:last-child {
  background: white !important;
  margin-top: -100px!important
}
.ck-toolbar__items {
  /* margin-bottom: 10px !important; */
  /* -webkit-box-shadow:0 3px 3px 0 rgba(0,0,0,0.14),0 1px 7px 0 rgba(0,0,0,0.12),0 3px 1px -1px rgba(0,0,0,0.2)!important;box-shadow:0 3px 3px 0 rgba(0,0,0,0.14),0 1px 7px 0 rgba(0,0,0,0.12),0 3px 1px -1px rgba(0,0,0,0.2)!important; */
}
}
</style>
<nav class="blue-grey lighten-5 z-depth-0">
  <ul>
    <li><a href="javascript:void(0)" onclick="document.querySelector('meta[name=\'theme-color\']').setAttribute('content',  user.themeTop);" class="black-text btn-flat btn-floating btn waves-effect modal-close nav_scaleIconOnHover"><i class="material-icons spin black-text" style="margin:0!important;padding:0!important;line-height: 40px!important">close</i></a></li>
    <li><a href="javascript:void(0)" class="black-text">Edit note</a></li>
  </ul>
  <ul class="right">
    <!--<li><a href="javascript:void(0)" class="black-text btn-floating waves-effect btn-flat btn nav_scaleIconOnHover" onclick="viewNote('<?=$row['id']; ?>');"><i style="line-height:40px!important" class="material-icons black-text">refresh</i></a></li>-->
    <li><a href="javascript:void(0)" class="black-text btn-floating waves-effect btn-flat btn nav_scaleIconOnHover" onclick="if(confirm('Delete note? This action is irreversible')===true) $('#ajaxLoader').load('./user/notes/delete.php?id=<?=$row['id']; ?>', function(){getHashPage();M.toast({html:'Deleted Note!'})});"><i style="line-height:40px!important" class="material-icons black-text">delete</i></a></li>
    <li><a href="javascript:void(0)" style="margin-left: 5px!important" class="modal-close black-text btn-floating waves-effect btn-flat btn nav_scaleIconOnHover" onclick="$('#editNoteForm').submit();document.querySelector('meta[name=\'theme-color\']').setAttribute('content',  user.themeTop);"><i style="line-height:40px!important" class="material-icons black-text">check</i></a></li>
  </ul>
</nav>
<div class="modal-content" style="padding: 0 !important;overflow-x:hidden;width:100%;">
  <?php if(!empty($row['banner'])) {?> <img src="<?=decrypt($row['banner']);?>" onmousedown ="this.style.maxHeight = 'unset'" width="100%" style="object-fit: cover;max-height: 20vh" class="materialboxed"><?php } ?>
  <form method="POST" action="./user/notes/edit.php" id="editNoteForm" style="padding: 20px">
    <br><br>
    <div class="input-field input-border">
      <label for="content">Title</label>
      <input name="title" autocomplete="off" type="text" id="s1" required value="<?=htmlspecialchars(decrypt($row['title']));?>">
    </div>
    <div class="input-field textareaEditor">
      <label> </label>
      <textarea name="content" style="min-height: 300px;" id="s2" class="materialize-textarea" required><?=htmlspecialchars(decrypt($row['content']));?>
      </textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
  </form>
  <br>
  <br>
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
  document.querySelector('meta[name="theme-color"]').setAttribute('content',  (document.documentElement.classList.contains("_darkTheme") ? "#101010": "#cfd8dc"));
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
  setInterval(() => {
    if(document.getElementById('s2')) document.querySelector( '#s2' ).value = window.editor.getData();
  }, 10);

  ClassicEditor
    .create( document.querySelector( '#s2' ), {
      toolbar: ["undo", "redo", '|', 'heading', "bold", "italic", "blockQuote", "link", "|",  "ckfinder", "uploadImage", "imageStyle:full", "imageStyle:side", "indent", "outdent", "numberedList", "mediaEmbed", "insertTable", "tableColumn", "tableRow", "mergeTableCells"]
  } )
    .then( newEditor => {
    window.editor = newEditor;
    // The following line adds CKEditor 5 inspector.
    /* CKEditorInspector.attach( newEditor, {
      isCollapsed: false
    } );
    */
    if(document.querySelector(".ck-sticky-panel__content")) document.querySelector(".ck-sticky-panel__content").classList.add("hide-toolbar");
    setInterval(function() {
      if(window.editor.editing.view.document.isFocused && document.querySelector(".ck-sticky-panel__content")) {
        if(document.querySelector(".ck-sticky-panel__content")) {
        document.querySelector(".ck-sticky-panel__content").classList.remove("hide-toolbar");
        }
      }
      else {
        if(document.querySelector(".ck-sticky-panel__content")) {
        document.querySelector(".ck-sticky-panel__content").classList.add("hide-toolbar");
        }
      }
    }, 20)
  } )
    .catch( error => {
    console.error( error );
  } );
</script>