<h5>Add a Category</h5>
<form action="" method="POST" id="addCategory">
    <div class="input-field">
        <label>Label Name</label>
        <input autocomplete="off" name="name">
    </div>
    <button class="btn blue-grey darken-2 waves-effect waves-light">Save</button>
</form>
<script>
$("#addCategory").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
       type: "POST",
       url: url,
       data: form.serialize(),
       success: function(data)
       {
           AJAX_LOAD('#_smSettingsPage_categories', './user/settings/categories.php')
       }
     });

    
});
</script>