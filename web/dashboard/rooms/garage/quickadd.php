<?php 
session_start();
include("../../cred.php");
$chips = array("Dryer","Washer","Chainsaw","Basketball","Paintbrush","Tires","Snowblower","Hoe","Gas","Box","Suv","Oil","Bin","Saw","Door","Keys","Bugs","Tent","Nuts","Wood","Tool","Shoe","Boat","Pump","Dust","Junk","Tyre","Toys","Bike","Rake","Pail","Hose","Rods","Food","Rags","Brace","Spade","Table","Bench","Torch","Radio","Shelf","Boxes","Drill","Chair","Level","Mower","Broom","Grill","Paint","Truck","Vacuum","Window","Wheels","Ladder","Cooler","Blower","Cutter","Lights","Catbox","Shovel","Fridge","Clothes","Spanner","Baubles","Shelves","Storage","Freezer","Garbage","Carramp","Cupboard","Strimmer","Umbrella","Carparts","Pegboard","Furniture","Recycling","Motoroil","Linecord","Dumbbells","Deckchair","Skateboard","Lawnedger","Fertilizer","Golfclubs","Wheelbarrow","Pottingmix","Workgloves","Waterheater","Gardentools","Bushtrimmer","Tapemeasure","Extinguisher",);
$chips = array_map('ucfirst', $chips);

$rand_keys = array_rand($chips, 15);
?>
<br><br>
<div class="container">
  <form action="https://smartlist.ga/dashboard/rooms/garage/add.php" method="POST" id="garage_add_form">
    <h5>Add an item (Garage)</h5>
    <div class="input-field input-border">
      <label>Name</label>
      <input type="text" name="name" class="autocomplete" id="addGarageName" autofocus data-length="150" autocomplete="off" required>
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
      <input type="text" name="qty" autocomplete="off" required data-length="20" id="addGarageQty">
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
  document.getElementById('addGarageName').addEventListener("keyup", () => 
                                                            localStorage.setItem("addGarageName", document.getElementById('addGarageName').value))
  document.getElementById('addGarageName').value = localStorage.getItem('addGarageName') || ""

  document.getElementById('addGarageQty').addEventListener("keyup", () => 
                                                           localStorage.setItem("addGarageQty", document.getElementById('addGarageQty').value))
  document.getElementById('addGarageQty').value = localStorage.getItem('addGarageQty') || ""
  window.onbeforeunload = function() {return "Close?";};
  $("#garage_add_form").submit(function(e) {
    e.preventDefault();
    sm_page('ajax_loader');
    var form = $(this);
    var url = form.attr('action');
    localStorage.setItem('addGarageName', "");
    localStorage.setItem('addGarageQty', "");
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        document.getElementById('date').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    
        window.onbeforeunload = null;
        document.getElementById('garage_add_form').reset()
        if(data == "Item Already Exists!") {
          M.toast({html: "Item Already Exists!"});
        }
        else {
          M.toast({html: 'Added item successfully. You can keep adding more'});
        }
      }
    });
  });
  $(document).ready(function() {
    $('.validate').characterCounter();
    $('.autocomplete').autocomplete();
  });

</script>