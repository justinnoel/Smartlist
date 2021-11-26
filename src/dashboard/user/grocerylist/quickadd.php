<?php 
session_start();
include("../../cred.php");
$chips = array("artichoke", "aubergine", "asparagus", "legumes", "alfalfa sprouts", "azuki beans", "bean sprouts", "black beans", "black-eyed peas", "borlotti bean", "broad beans", "chickpeas, garbanzos, or ceci beans", "green beans", "kidney beans", "lentils", "lima beans or butter bean", "mung beans", "navy beans", "peanuts", "pinto beans", "runner beans", "split peas", "soy beans", "peas", "mangetout or snap peas", "broccoflower", "broccoli", "brussels sprouts", "cabbage", "kohlrabi", "Savoy cabbage", "red cabbage", "cauliflower", "celery", "endive", "fiddleheads", "frisee", "fennel", "greens", "bok choy", "chard", "collard greens", "kale", "mustard greens", "herbs", "anise", "basil", "caraway", "coriander", "chamomile", "daikon", "dill", "fennel", "lavender", "lemongrass", "marjoram", "oregano", "parsley", "rosemary", "thyme", "lettuce", "arugula", "mushrooms", "nettles", "New Zealand spinach", "okra", "onions", "chives", "garlic", "leek", "onion", "shallot", "scallion", "peppers", "bell pepper", "chili pepper", "jalapeño", "habanero", "paprika", "tabasco pepper", "cayenne pepper", "radicchio", "rhubarb", "root vegetables", "beetroot", "carrot", "celeriac", "corms", "eddoe", "konjac", "taro", "water chestnut", "ginger", "parsnip", "rutabaga", "radish", "wasabi", "horseradish", "Diakon or white radish", "tubers", "jicama", "jerusalem artichoke", "potato", "sweet potato", "yam", "turnip", "salsify", "skirret", "sweetcorn", "topinambur", "squashes ", "acorn squash", "bitter melon", "butternut squash", "banana squash", "Zucchini", "cucumber ", "delicata", "gem squash", "hubbard squash", "Squash", "spaghetti squash", "spinach", "tomato ", "watercress");
$chips = array_map('ucfirst', $chips);

$rand_keys = array_rand($chips, 15);
?>
<br><br><div class="container">
  <form action="https://smartlist.ga/dashboard/user/grocerylist/add.php" method="POST" id="grocerylist_add_form">
    <h5>Add</h5>
    <div class="input-field input-border">
      <label onclick="this.nextElementSibling.focus()">Name</label>
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
    <input type="hidden" name="qty" autocomplete="off" value="1">
    <br>
    <button class="btn blue-grey darken-3 btn-round waves-effect waves-light">
      <i class="material-icons-round left">save</i> Save
    </button>
    <br>
  </form>
</div>
<script>
  $("#grocerylist_add_form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        document.getElementById('grocerylist_add_form').reset();
        $('input').focus();
        M.toast({html: 'Added item successfully. You can keep adding more'});
      }
    });
  });
</script>