<?php 
session_start();
include("../../cred.php");
$chips = array("Plates", "Plates ", "Cutlery sets", "Cutlery sets ", "Glasses", "Glasses ", "Cups", "Cups ", "Trays", "Trays ", "Napkin holders", "Napkin holders ", "Drink Coasters", "Drink Coasters ", "Sugar Bowls", "Sugar Bowls ", "Cookie jars", "Cookie jars ", "Teapots", "Teapots ", "Tea sets", "Tea sets ", "Serving bowls", "Serving bowls ", "Bowls", "Bowls ", "Salad bowls", "Salad bowls ", "Baskets", "Baskets ", "Bread Bins", "Bread Bins ", "Fruit Bowls", "Fruit Bowls ", "Egg Cups", "Egg Cups ", "Jugs", "Jugs ", "Decanters", "Decanters ", "Bottles", "Bottles ", "Corkscrew", "Corkscrew ", "Bottle openers", "Bottle openers ", "Bottle Stoppers", "Bottle Stoppers ", "Drip catchers", "Drip catchers ", "Foil cutters", "Foil cutters ", "Trivets", "Trivets ", "Table Decorations", "Table Decorations ", "Tea infusers", "Tea infusers ", "Butter dishes", "Butter dishes ", "Grated cheese bowls", "Grated cheese bowls ", "Pizza cutters", "Pizza cutters ", "Food Covers", "Food Covers ", "Knife rests", "Knife rests",);
$chips = array_map('ucfirst', $chips);
$rand_keys = array_rand($chips, 15);
?>
<br><br>
<div class="container">
<form action="https://smartlist.ga/dashboard/rooms/dining_room/add.php" method="POST" id="dining_room_add_form">
        <h5>Add an item (Dining Room)</h5>
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
 $(document).ready(function() {
    $('.validate').characterCounter();
  });
    $("#dining_room_add_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        sm_page('ajax_loader');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('dining_room_add');
                document.getElementById('dining_room_add_form').reset()
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