<?php
session_start();
include("../../cred.php");
if(isset($_POST["name"])) {
    try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO labels (name, login) 
VALUES (".json_encode($_POST['name']).", ".json_encode($_SESSION['id']).")      
";
      $conn->exec($sql);
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
}
else {
?>
<h5>Add a Category</h5>
<form action="https://smartlist.ga/dashboard/user/labels/add.php" method="POST" id="addCategory">
    <div class="input-field">
        <label>Label Name</label>
        <input autocomplete="off" name="name" type="text" class="validate" data-length="50" required>
    </div>
    <div>
        <p>Examples: Canned Food, Appliances</p>
    </div>
    <button name="submit" class="btn blue-grey darken-2 waves-effect waves-light">Save</button>
</form>
<script>
$(".validate").characterCounter()
$("#addCategory").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
       type: "POST",
       url: url,
       data: form.serialize(),
       success: function(data)
       {
           AJAX_LOAD('#_smSettingsPage_categories', './user/settings/categories.php')
       }
     });
});
</script>
<?php } ?>