<div class="container">
    <form action="https://smartlist.ga/dashboard/rooms/foodwaste/add.php" method="POST" id="fw_add_form">
        <h5>Food Wastage</h5>
        <div class="input-field">
            <label>Date</label>
            <input type="text" name="name" value="<?php echo date('m/d/Y'); ?>" readonly autofocus autocomplete="off" required>
        </div>
        <div class="input-field">
            <label>Quantity wasted</label>
            <input type="number" name="qty" autocomplete="off">
        </div>
        <input type="hidden" name="price" value="1" autocomplete="off" required>
        <button class="btn blue-grey darken-3">
            Submit
        </button>
    </form>
</div>
<script>
    $("#fw_add_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                document.getElementById('fw_add_form').reset()
                M.toast({html: 'Added data successfully '});
            }
        });
    });
</script>