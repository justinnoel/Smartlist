<div class="container">
<form action="https://smartlist.ga/dashboard/rooms/grocerylist/add.php" method="POST" id="grocerylist_add_form">
        <h5>Add an item (Shopping List)</h5>
        <div class="input-field">
            <label onclick="this.nextElementSibling.focus()">Name</label>
            <input type="text" name="name" autofocus autocomplete="off" required>
        </div>
        <div class="input-field">
            <label onclick="this.nextElementSibling.focus()">Quantity</label>
            <input type="number" name="qty" autocomplete="off">
        </div>
        <button class="btn blue-grey darken-3">
            <i class="material-icons-round left">save</i> Save
        </button>
    </form>
</div>
<script>
    $("#grocerylist_add_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        sm_page('ajax_loader');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('grocerylist_add');
                document.getElementById('grocerylist_add_form').reset()
                M.toast({html: 'Added item successfully. You can keep adding more'});
            }
        });
    });
</script>