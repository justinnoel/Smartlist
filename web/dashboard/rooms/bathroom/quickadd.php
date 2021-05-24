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
        <input type="hidden" name="price" value="1" autocomplete="off" required>
            <div class="gray-text" style="padding: 0px 10px;color: gray !important"><i class='material-icons left'>verified_user</i>All items are encrypted</div><br>
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