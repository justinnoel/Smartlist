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
            Submit
        </button>
    </form>
</div>
<script>
    $("#laundry_room_add_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        sm_page('ajax_loader');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('laundry_room_add');
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