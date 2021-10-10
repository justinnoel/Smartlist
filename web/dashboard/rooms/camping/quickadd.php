<?php 
session_start(); 
include('../../cred.php');
?>
<br><br>
<div class="container">
  <form action="https://smartlist.ga/dashboard/rooms/camping/add.php" method="POST" id="camping_add_form">
    <h5>Add an item (Camping Supplies)</h5>
    <div class="input-field">
      <label>Name</label>
      <input type="text" name="name" autofocus autocomplete="off" required class="validate" data-length="150">
    </div>
    <div class="input-field">
      <label>Quantity</label>
      <input type="text" name="qty" autocomplete="off">
      <?php include('../suggestion_count.php'); ?>
    </div>
    <?php include('../category_select.php');?>
    <input type="hidden" id="date" name="date">
    <button class="btn blue-grey darken-3">
      Submit
    </button>
  </form>
</div>
<script>
  $(document).ready(function() {
    $('.validate').characterCounter();
  });
  $("#camping_add_form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        document.getElementById('date').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    
        document.getElementById('camping_add_form').reset();
        if(data == "Item Already Exists!") {
          M.toast({html: "Item Already Exists!"});
        }
        else {
          M.toast({html: 'Added item successfully. You can keep adding more'});
        }
      }
    });
  });

</script>