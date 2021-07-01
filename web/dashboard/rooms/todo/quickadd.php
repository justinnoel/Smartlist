<div class="container">
<form action="https://smartlist.ga/dashboard/rooms/todo/add.php" method="POST" id="todo_form">
        <h5>Add an task</h5>
        <div class='input-field'><label onclick="this.nextElementSibling.focus()">Task title</label>
        <input type="text" name="name" class="form-control" autocomplete="off">
        </div>
        <div class="input-field">
        <!-- <label>Priority</label> -->
        <select name="qty" id="cars">
          <option value="Lowest">Lowest</option>
          <option value="Low">Low</option>
          <option value="Medium" selected>Medium</option>
          <option value="High">High</option>
        </select>
        </div>
        <div class="input-field"><label onclick="this.nextElementSibling.focus()">Description</label><textarea type="text" name="decs" class="materialize-textarea" autocomplete="off"></textarea></div>
        <div class='input-field'><label onclick="this.nextElementSibling.focus()">Due Date</label><input type="text" id="date" name="price" class="datepicker" autocomplete="off"></div>
        <button type="submit" name="Submit" value="Add" class="btn purple waves-effect">Add</button>
    </form>
</div>
<script>
    document.getElementById('date').value = new Date().toISOString().substring(0, 10);
    $("#todo_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        sm_page('ajax_loader');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                sm_page('todo_add');
                document.getElementById('todo_form').reset();
                if(data == "Item Already Exists!") {
                    M.toast({html: "Task Already Exists!"});
                }
                else {
                    M.toast({html: 'Added task successfully. You can keep adding more'});
                }
            }
        });
    });
    $('select').formSelect();
    $('.datepicker').datepicker();
</script>
<style>
    .date-text {color:white !important;}
</style>