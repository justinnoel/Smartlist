<?php 
session_start(); 
include('../../cred.php');
?>
<br><br>
<div class="container">
<form action="https://smartlist.ga/dashboard/rooms/camping/add.php" method="POST" id="camping_add_form">
        <h5>Add an item (Camping Supplies)</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" autofocus autocomplete="off" required class="validate" data-length="150">
        </div>
        <div class="input-field">
            <label>Quantity</label>
            <input type="text" name="qty" autocomplete="off">
            <?php include('../suggestion_count.php'); ?>
        </div>
        <?php include('../category_select.php');?>
            <button class="btn blue-grey darken-3">
            Submit
        </button>
    </form>
</div>
<script>
 $(document).ready(function() {
    $('.validate').characterCounter();
  });
    $("#camping_add_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        sm_page('ajax_loader');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('camping_add');
                document.getElementById('camping_add_form').reset();
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