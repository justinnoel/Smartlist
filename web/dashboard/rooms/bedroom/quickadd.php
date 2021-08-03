<?php 
session_start();
include("../../cred.php");
$chips = array("Bedside Table", "Bed", "Linens", "Pillow", "Pillow Cases", "Lamps", "Alarm Clock", "Chair", "Nightlight", "Rugs", "Dresser", "Throws (blankets)", "Nightstand", "Smoke Detector", "Wall Picture", "Duvet");
$chips = array_map('ucfirst', $chips);
$rand_keys = array_rand($chips, 15);
?>

<br><br>
<div class="container">
    <form action="https://smartlist.ga/dashboard/rooms/bedroom/add.php" method="POST" id="bedroom_add_form">
        <h5>Add an item (Bedroom)</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" autofocus class="validate" id="autofocus1" data-length="150" autocomplete="off" required>
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
        <button class="btn blue-grey darken-3">
            <i class="material-icons-round left">save</i> Save
        </button>
    </form>
</div>
<script>
 $(document).ready(function() {
    $('.validate').characterCounter();
  });
    $("#bedroom_add_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        sm_page('ajax_loader');
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('bedroom_add');
                document.getElementById('autofocus1').focus()
                document.getElementById('bedroom_add_form').reset()
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