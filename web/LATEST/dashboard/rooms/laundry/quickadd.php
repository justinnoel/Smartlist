<div class="container">
<form action="https://smartlist.ga/dashboard/rooms/laundry/add.php" method="POST" id="laundry_room_add_form">
        <h5>Add an item (Laundry Room)</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" autofocus autocomplete="off" required>
        </div>
        <div class="input-field">
            <label>Quantity</label>
            <input type="text" name="qty" autocomplete="off">
        </div>
        <input type="hidden" name="price" value="1" autocomplete="off" required>
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
                M.toast({html: 'Added item successfully. You can keep adding more'});
            }
        });
    });
</script>