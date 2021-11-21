<br><br><div class="container">
  <form action="https://smartlist.ga/dashboard/rooms/todo/add.php" method="POST" id="todo_form">
    <div class="row">
      <div class="col s12">
        <h5>Add a reminder</h5>
      </div>
      <div class="col s12 m8">
        <div class='input-field input-border'><label onclick="this.nextElementSibling.focus()">Task title</label>
          <input type="text" name="name" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="col s12 m4">
        <div class='input-field input-border'><label onclick="this.nextElementSibling.focus()">Due Date</label><input type="text" id="date" name="price" class="datepicker" autocomplete="off"></div>
      </div>
      <div class="col s12">

        <div class="input-field input-border">
          <!-- <label>Priority</label> -->
          <select name="qty" id="cars">
            <option value="Lowest">Lowest</option>
            <option value="Low">Low</option>
            <option value="Medium" selected>Medium</option>
            <option value="High">High</option>
          </select>
        </div>
        <div class="input-field input-border">
          <label onclick="this.nextElementSibling.focus()">Description</label>
          <textarea type="text" name="decs" style="left:0!important;margin:0!important;padding-top: 15px;width:101.5%!important;max-width:101.5%!important" class="materialize-textarea" autocomplete="off"></textarea>
        </div>
        <button type="submit" name="Submit" value="Add" class="btn-round waves-light btn blue-grey darken-3 waves-effect"><i class="material-icons left">save</i> Save</button>
      </div>

    </div>
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
  $('input').focus();
</script>
<style>
  .date-text {color:white !important;}
</style>