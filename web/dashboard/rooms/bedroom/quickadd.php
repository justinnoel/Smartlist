<br><br>
<div class="container">
    <form action="https://smartlist.ga/dashboard/rooms/bedroom/add.php" method="POST" id="bedroom_add_form">
        <h5>Add an item (Bedroom)</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" autofocus class="validate" id="autofocus1" data-length="150" autocomplete="off" required>
        </div>
        <div class="input-field">
            <label>Quantity</label>
            <input type="text" name="qty" autocomplete="off">
        </div>
        <input type="hidden" name="price" value="1" class="validate" data-length="20" autocomplete="off" required>
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
                M.toast({html: 'Added item successfully. You can keep adding more'});
            }
        });
    });
</script>