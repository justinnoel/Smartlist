<?php 
session_start();
include("../../cred.php");
$chips = array("Mirror", "Wastebasket", "Natural Hand Soap ", "Bath towels", "hand towels", "washcloths", "Non-skid bath mat ", "Toothbrush holder ", "Over-the-door and/or wall hooks", "Extra toilet paper", "Toilet paper storage", "Toilet brush & container ", "Plunger", "Green cleaning supplies ", "Non-skid tub mat", "Soap dispenser or dish", "Shower curtain, liner, and rings", "Cosmetics organizers", "Wall-mounted shelving", "Clothes hamper", "Razors ", "Hair brush", "Nail clippers", "Scale", "Dental floss ", "Bath pillow", "Hair dryer", "Pain reliever",);
$chips = array_map('ucfirst', $chips);

$rand_keys = array_rand($chips, 15);
?>
<br><br>
<div class="container">
    <form action="https://smartlist.ga/dashboard/rooms/bathroom/add.php" method="POST" id="bathroom_add_form">
        <h5>Add an item (Bathroom)</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" class="validate autocomplete" autofocus data-length="150" autocomplete="off" required>
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
            <input type="text" name="qty" class="validate" autocomplete="off" required data-length="20" value=1>
            <?php include('../suggestion_count.php'); ?>
        </div>
        <select name="price"> 
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
            <script>$('select').formSelect();</script>
        <button class="btn blue-grey darken-3">
            <i class="material-icons-round left">save</i> Save
        </button>
    </form>
</div>
<script>
window.onbeforeunload = function() {return "Close?";};
    $("#bathroom_add_form").submit(function(e) {
        e.preventDefault();
        sm_page('ajax_loader');
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('bathroom_add');
                window.onbeforeunload = null;
                document.getElementById('bathroom_add_form').reset()
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