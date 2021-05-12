<div class="container">
    <form action="https://smartlist.ga/dashboard/rooms/bathroom/add.php" method="POST" id="bathroom_add_form">
        <h5>Add an item (Bathroom)</h5>
        <div class="input-field">
            <label>Name</label>
            <input type="text" name="name" class="validate" autofocus data-length="150" autocomplete="off" required>
        </div>
        <div class="input-field">
            <label>Quantity</label>
            <input type="text" name="qty" class="validate" autocomplete="off" required data-length="20">
        </div>
        <input type="hidden" name="price" value="1" autocomplete="off" required>
        <button class="btn blue-grey darken-3">
            Submit
        </button>
    </form>
</div>
<script>
    $("#bathroom_add_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                document.getElementById('bathroom_add_form').reset()
                M.toast({html: 'Added item successfully. You can keep adding more'});
            }
        });
    });
     $(document).ready(function() {
    $('.validate').characterCounter();
  });
</script>