<div class="container">
    <form action="https://smartlist.ga/dashboard/rooms/family/add.php" method="POST" id="family_add_form">
        <h5>Add an item (Family room)</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" autofocus autocomplete="off" required class="validate" data-length="150">
        </div>
        <div class="input-field">
            <label>Quantity</label>
            <input type="text" name="qty" autocomplete="off" class="validate" data-length="20">
        </div>
        <input type="hidden" name="price" value="1" autocomplete="off" required class="validate" data-length="20">
        <button class="btn blue-grey darken-3">
            Submit
        </button>
    </form>
</div>
<script>
 $(document).ready(function() {
    $('.validate').characterCounter();
  });
    $("#family_add_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        sm_page('ajax_loader');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('family_add');
                document.getElementById('family_add_form').reset()
                M.toast({html: 'Added item successfully. You can keep adding more'});
            }
        });
    });
</script>