<?php 
session_start();
include("../../cred.php");
$chips = array("artichoke", "aubergine", "asparagus", "legumes", "alfalfa sprouts", "azuki beans", "bean sprouts", "black beans", "black-eyed peas", "borlotti bean", "broad beans", "chickpeas, garbanzos, or ceci beans", "green beans", "kidney beans", "lentils", "lima beans or butter bean", "mung beans", "navy beans", "peanuts", "pinto beans", "runner beans", "split peas", "soy beans", "peas", "mangetout or snap peas", "broccoflower", "broccoli", "brussels sprouts", "cabbage", "kohlrabi", "Savoy cabbage", "red cabbage", "cauliflower", "celery", "endive", "fiddleheads", "frisee", "fennel", "greens", "bok choy", "chard", "collard greens", "kale", "mustard greens", "herbs", "anise", "basil", "caraway", "coriander", "chamomile", "daikon", "dill", "fennel", "lavender", "lemongrass", "marjoram", "oregano", "parsley", "rosemary", "thyme", "lettuce", "arugula", "mushrooms", "nettles", "New Zealand spinach", "okra", "onions", "chives", "garlic", "leek", "onion", "shallot", "scallion", "peppers", "bell pepper", "chili pepper", "jalapeño", "habanero", "paprika", "tabasco pepper", "cayenne pepper", "radicchio", "rhubarb", "root vegetables", "beetroot", "carrot", "celeriac", "corms", "eddoe", "konjac", "taro", "water chestnut", "ginger", "parsnip", "rutabaga", "radish", "wasabi", "horseradish", "Diakon or white radish", "tubers", "jicama", "jerusalem artichoke", "potato", "sweet potato", "yam", "turnip", "salsify", "skirret", "sweetcorn", "topinambur", "squashes ", "acorn squash", "bitter melon", "butternut squash", "banana squash", "Zucchini", "cucumber ", "delicata", "gem squash", "hubbard squash", "Squash", "spaghetti squash", "spinach", "tomato ", "watercress");
$chips = array_map('ucfirst', $chips);

$rand_keys = array_rand($chips, 15);
?>
<br><br>
<div class="container">
  <form action="https://smartlist.ga/dashboard/rooms/kitchen/addx.php" method="POST" id="kitchen_add_form">
    <a href="./scan/live" target="_blank" class="btn right darken-2 waves-effect btn-floating btn-flat"><i class="material-icons-round" style="color:var(--font-color)">compare</i></a>
    <h5>Add an item (Kitchen)</h5> 
    <br>
    <div class="input-field input-border">
      <label class="active" onclick="this.nextElementSibling.focus()">Name</label>
      <input type="text" name="name" id="addKitchenName" data-length="150" autocomplete="off" required>
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
      <label class="active" onclick="this.nextElementSibling.focus()">Quantity</label>
      <input type="text" id="addKitchenQty" name="qty" value="1" autocomplete="off" data-length="20" required>
      <?php include('../suggestion_count.php'); ?>
    </div>
    <?php include('../category_select.php');?>

    <button class="btn blue-grey darken-3 waves-effect waves-light btn-round">
      <i class="material-icons-round left">save</i> Save
    </button>
    <input type="hidden" id="date" name="date">
  </form>
</div>
<script>
  document.getElementById('addKitchenName').addEventListener("keyup", () => 
                                                             localStorage.setItem("addKitchenName", document.getElementById('addKitchenName').value))
  document.getElementById('addKitchenName').value = localStorage.getItem('addKitchenName') || ""

  document.getElementById('addKitchenQty').addEventListener("keyup", () => 
                                                            localStorage.setItem("addKitchenQty", document.getElementById('addKitchenQty').value))
  document.getElementById('addKitchenQty').value = localStorage.getItem('addKitchenQty') || ""
  $(document).ready(function() {
    $('.validate').characterCounter();
  });
  $("#kitchen_add_form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        localStorage.setItem('addKitchenQty', "")
        localStorage.setItem('addKitchenName', "")
        document.getElementById('kitchen_add_form').reset();
        document.getElementById('date').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    
        document.getElementById('addKitchenName').focus();
        if(data == "Item Already Exists!") {
          M.toast({html: "Item Already Exists!"});
        }
        else {
          M.toast({html: 'Added item successfully. You can keep adding more'});
        }
      }
    });
  });
  document.getElementById('addKitchenQty').focus();
  document.getElementById('addKitchenName').focus();
  document.getElementById('date').value = `${new Date().getMonth()+1}/${new Date().getDate()}/${new Date().getFullYear()} on ${new Date().getHours()}:${new Date().getMinutes()}`    
</script>
