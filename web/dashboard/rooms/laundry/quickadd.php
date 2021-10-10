<?php 
session_start();
include("../../cred.php");
$chips = array("Detergent", "Bleach", "Dryer sheets", "Stain and odor removers", "Linens", "Iron Board", "Washer", "Dryer", "Micro-fiber towels", "Extra Towels", "Cleaning Supplies", "Iron", "Drying Rack", "Laundry Basket", "Hamper",);
$chips = array_map('ucfirst', $chips);
$rand_keys = array_rand($chips, 15);
?>
<br><br>
<div class="container">
  <form action="https://smartlist.ga/dashboard/rooms/laundry/add.php" method="POST" id="laundry_room_add_form">
    <h5>Add an item (Laundry Room)</h5>
    <div class="input-field">
      <label>Name</label>
      <input type="text" name="name" autofocus autocomplete="off" required>
    </div>
    <div class="chip-suggestions">
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[0]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[1]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[2]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[3]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[4]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[5]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[6]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[7]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[8]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[9]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[10]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[11]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[12]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[13]];?></div>
      <div class="chip waves-effect" onclick="chipValue(this)"><?=$chips[$rand_keys[14]];?></div>
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
  $("#laundry_room_add_form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        document.getElementById('date').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    
        document.getElementById('laundry_room_add_form').reset()
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