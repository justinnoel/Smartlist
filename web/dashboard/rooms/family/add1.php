<?php 
session_start();
include("../../cred.php");
$chips = array("Wing chair", "TV stand", "Sofa", "Cushion", "Telephone", "Television", "Speaker", "End table", "Tea set", "Fireplace", "Remote", "Fan", "Floor lamp", "Carpet", "Table", "Blinds", "Curtains", "Picture", "Vase", "Grandfather clock",);
$chips = array_map('ucfirst', $chips);

$rand_keys = array_rand($chips, 15);
?><br><br>
<div class="container">
  <form action="https://smartlist.ga/dashboard/rooms/family/add.php" method="POST" id="family_add_form">
    <h5>Add an item (Family room)</h5>
    <div class="input-field input-border">
      <label>Name</label>
      <input type="text" name="name" autofocus autocomplete="off" required id="addFamilyName" data-length="150">
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
    <div class="input-field input-border">
      <label>Quantity</label>
      <input type="text" name="qty" autocomplete="off" data-length="20" id="addFamilyQty">
      <?php include('../suggestion_count.php'); ?>
    </div>
    <?php include('../category_select.php');?>
    <input type="hidden" id="date" name="date">

    <button class="btn blue-grey darken-3 waves-effect waves-light btn-round">
      <i class="material-icons-round left">save</i> Save
    </button>
  </form>
</div>
<script>
  document.getElementById('addFamilyName').addEventListener("keyup", () => 
                                                            localStorage.setItem("addFamilyName", document.getElementById('addFamilyName').value))
  document.getElementById('addFamilyName').value = localStorage.getItem('addFamilyName') || ""

  document.getElementById('addFamilyQty').addEventListener("keyup", () => 
                                                           localStorage.setItem("addFamilyQty", document.getElementById('addFamilyQty').value))
  document.getElementById('addFamilyQty').value = localStorage.getItem('addFamilyQty') || ""
  $(document).ready(function() {
    $('.validate').characterCounter();
  });
  $("#family_add_form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    localStorage.setItem('addFamilyQty', "");
    localStorage.setItem('addFamilyName', "");
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        document.getElementById('date').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    
        document.getElementById('family_add_form').reset()
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