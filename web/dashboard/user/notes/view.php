<?php
session_start();
include("../../cred.php");
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM notes WHERE id= " . $_GET['id'];
    $users = $dbh->query($sql);
        foreach ($users as $row){
?>
<div class="modal-content">
<form method="POST" action="./user/notes/edit.php" id="editNoteForm">
    <div class="input-field">
       <label for="content">Note title</label>
       <input name="title" autocomplete="off" type="text" id="s1" required value="<?=htmlspecialchars($row['title']);?>">
    </div>
    <div class="input-field">
        <label for="content">Note Content (Max: 1000 Characters)</label>
        <textarea name="content" style="min-height: 300px;" id="s2" required class="materialize-textarea"><?=htmlspecialchars($row['content']);?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
</form>
</div>
<div class="modal-footer">
    <a onclick="$('#div1').load('./user/notes/delete.php?id=<?=$row['id']; ?>', function() {sm_page('gl'); AJAX_LOAD('#gl', './user/notes/index.php'); change_title('Notes')});" class="modal-close btn red darken-4 waves-effect">Delete</a>
    <a onclick="$('#editNoteForm').submit()" class="btn green darken-3 waves-effect">Save</a>
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
window.onbeforeunload = function() {return "";}
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
           M.toast({html: data});
           window.onbeforeunload = null
       }
     });
});
</script>