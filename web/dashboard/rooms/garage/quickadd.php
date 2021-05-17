<?php 
session_start(); 
include('../../cred.php');
?>
<br><br>
<div class="container">
    <form action="https://smartlist.ga/dashboard/rooms/garage/add.php" method="POST" id="garage_add_form">
        <h5>Add an item (Garage)</h5>
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
        <input type="hidden" name="price" value="1" autocomplete="off" required>
        <button class="btn blue-grey darken-3">
            Submit
        </button>
        <p class="gray-text"><i class='material-icons left'>verified_user</i>All items are encrypted</p>
    </form>
</div>
<script>
window.onbeforeunload = function() {return "Close?";};
    $("#garage_add_form").submit(function(e) {
        e.preventDefault();
        sm_page('ajax_loader');
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('garage_add');
                window.onbeforeunload = null;
                document.getElementById('garage_add_form').reset()
                M.toast({html: 'Added item successfully. You can keep adding more'});
            }
        });
    });
     $(document).ready(function() {
    $('.validate').characterCounter();
    $('.autocomplete').autocomplete();
  });
</script>