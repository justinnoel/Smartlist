<br><br> 
<div class="container">
    <form action="https://smartlist.ga/dashboard/addx.php" method="POST" id="kitchen_add_form">
        <a href="./scan/live" target="_blank" class="btn right blue-grey darken-2 waves-effect waves-light">Scan Items</a><h5>Add an item (Kitchen)</h5> 
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" class="validate" id="addKitchenName" data-length="150" autofocus autocomplete="off" required>
        </div>
        <div class="input-field">
            <label>Quantity</label>
            <input type="text" name="qty" class="validate" autocomplete="off" data-length="20" required>
        </div>
        <div class="input-field">
            <select name="price"> 
                <option value="Pots and Pans">Pots/Pans</option> 
                <option value="Fruits, Veggies, etc." selected>Fruits, Veggies, etc.</option> 
                <option value="Cutlery">Cutlery</option> <option value="Bottles and Cups">Bottles and Cups</option> 
                <option value="Bowls and Plates">Bowls and Plates</option> 
            </select>
        </div> 
                <div class="gray-text" style="padding: 0px 10px;color: gray !important"><i class='material-icons left'>verified_user</i>All items are encrypted</div><br>

        <button class="btn blue-grey darken-3">
            Submit
        </button>
    </form>
</div>
<script>
 $(document).ready(function() {
    $('.validate').characterCounter();
  });
    $("#kitchen_add_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        sm_page('ajax_loader');
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('addkitchen');
                document.getElementById('kitchen_add_form').reset();
                document.getElementById('addKitchenName').focus();
                M.toast({html: 'Added item successfully. You can keep adding more'});
            }
        });
    });
    $('select').formSelect();
</script>