<?php 
session_start(); 
include('../../cred.php');
?>
<br><br>
<div class="container">
  <form action="https://smartlist.ga/dashboard/rooms/custom_room/custom_room_adder.php?room=<?php echo $_GET['room']; ?>" method="POST" id="croom_form">
    <h5>Add an item</h5>
    <div class="input-field input-border">
      <label>Name</label>
      <input type="text" name="name" autofocus autocomplete="off" class="autocomplete" required data-length="150">
    </div>
    <div class="input-field input-border">
      <label>Quantity</label>
      <input type="text" name="qty" autocomplete="off" data-length="20">
      <?php include('../suggestion_count.php'); ?>
    </div>
    <input type="hidden" name="price" value="<?php echo $_GET['room']; ?>" autocomplete="off" required>
    <div class="input-field input-border">
    
    <select name="label"> 
      <option disabled>Categories</option>
      <option selected value="No Category Specified">No Category Specified</option> 
      <option disabled>Other</option>
      <?php
      try
      {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "SELECT * FROM labels WHERE login= " . $_SESSION['id'];
        $users = $dbh->query($sql);
        foreach ($users as $row){
      ?>
      <option value=<?=json_encode($row['name'])?>> <?=htmlspecialchars($row['name'])?> </option>
      <?php
          }
        $dbh = null;
      }
      catch(PDOexception $e)
      {
        echo "Error is: " . $e->etmessage();
      }
      ?>
    </select>
</div>
    <input type="hidden" id="date" name="date">
    <button class="btn blue-grey darken-3 waves-effect waves-light btn-round">
      <i class="material-icons-round left">save</i> Save
    </button>
  </form>
</div>
<script>
  $(document).ready(function() {
    $('.validate').characterCounter();
    $("select").formSelect();
    $('input.autocomplete').autocomplete({
      // specify options here
      data: autocompleteData,
      limit: 5,
    });
  });
  $("#croom_form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        document.getElementById('date').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    
        document.getElementById('croom_form').reset();
        if(data == "Item Already Exists!") {
          M.toast({html: "Item Already Exists!"});
        }
        else {
          M.toast({html: 'Added item successfully. You can keep adding more'});
        }
      }
    });
  });
  document.getElementById('date').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    

</script>