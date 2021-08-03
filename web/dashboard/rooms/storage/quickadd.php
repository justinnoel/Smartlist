<?php 
session_start();
include("../../cred.php");
$chips = array("Lysol", "Clorox", "Picture Frames", "HDMI cables", "USB chargers", "Computer mouse", "Keyboard", "Apron", "Shower Curtain", "Suitcase", "Chairs", "Fold tables", "Paper Cups", "Plastic utensils", "Plastic forks", "Disposable masks", "Disposable gloves", "Rake", "Car tires", "Bicycle", "Face shield", "Glass Cleaner", "Oil Degreaser", "BBQ tool set", "Barbeque", "Shovel",);
$chips = array_map('ucfirst', $chips);
$rand_keys = array_rand($chips, 15);
?>


<br><br>
<div class="container">
    <form action="https://smartlist.ga/dashboard/rooms/storage/add.php" method="POST" id="storage_add_form">
        <h5>Add an item (Storage room)</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" autofocus autocomplete="off" required class="validate" data-length="150">
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
        </div>        <?php include('../category_select.php');?>

            <button class="btn blue-grey darken-3">
            Submit
        </button>
    </form>
</div>
<script>
 $(document).ready(function() {
    $('.validate').characterCounter();
  });
    $("#storage_add_form").submit(function(e) {
        e.preventDefault();
        sm_page("ajax_loader");
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page("storage_add")
                document.getElementById('storage_add_form').reset()
                $('select').formSelect(); if(localStorage.getItem("categorySelect")) { var x = document.getElementById('categorySelect'); $('select').formSelect(); x.value = ''; $('select').formSelect(); x.value = localStorage.getItem("categorySelect"); console.log(localStorage.getItem("categorySelect")); $('select').formSelect(); }
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