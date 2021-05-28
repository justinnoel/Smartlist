<?php 
session_start(); 
include('../../cred.php');
?>
<br><br>
<div class="container">
    <form action="https://smartlist.ga/dashboard/rooms/bathroom/add.php" method="POST" id="bathroom_add_form">
        <h5>Add an item (Bathroom)</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" class="validate autocomplete" autofocus data-length="150" autocomplete="off" required>
        </div>
        <div>
        </div>
        <div class="input-field">
            <label>Quantity</label>
            <input type="text" name="qty" class="validate" autocomplete="off" required data-length="20">
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
                M.toast({html: 'Added item successfully. You can keep adding more'});
            }
        });
    });
     $(document).ready(function() {
    $('.validate').characterCounter();
    $('.autocomplete').autocomplete();
  });
</script>