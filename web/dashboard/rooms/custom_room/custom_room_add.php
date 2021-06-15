<?php 
session_start(); 
include('../../cred.php');
?>
<div class="container">
<form action="https://smartlist.ga/dashboard/rooms/custom_room/custom_room_adder.php?room=<?php echo $_GET['room']; ?>" method="POST" id="croom_form">
        <h5>Add an item</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" autofocus autocomplete="off" class="validate" required data-length="150">
        </div>
        <div class="input-field">
            <label>Quantity</label>
            <input type="text" name="qty" autocomplete="off" class="validate" data-length="20">
        </div>
        <input type="hidden" name="price" value="<?php echo $_GET['room']; ?>" autocomplete="off" required>
        <select name="label"> 
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
        <button class="btn blue-grey darken-3">
            Submit
        </button>
    </form>
</div>
<script>
 $(document).ready(function() {
    $('.validate').characterCounter();
    $("select").formSelect()
  });
    $("#croom_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        sm_page('ajax_loader');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('croom_add');
                // $('.collapsible').collapsible('open')
                document.getElementById('croom_form').reset();
                M.toast({html: 'Added item successfully. You can keep adding more'});
            }
        });
    });
</script>