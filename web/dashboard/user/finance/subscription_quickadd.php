<br><br>
<div class="container">
  <form action="./user/finance/subscription_add.php" id="quickAddForm">
    <div class="row">
      <div class="col s12">
        <h5>Add a subscription</h5>
        <p>Your subscriptions are NOT synced with anyone else</p>
      </div>
      <div class="col s12 m9">
        <div class="input-field">
          <label>Subscription name</label>
          <input type="text" name="name" autocomplete="off" required onkeyup="savea(this)" id="s1">
        </div>
      </div>

      <div class="col s12 m3">
        <div class="input-field">
          <label>Subscription price</label>
          <input type="number" name="price" autocomplete="off" required onkeyup="savea(this)" id="s2">
        </div>
      </div>
      <div class="col s12">

        <div class="input-field">
          <label>Date of renewal</label>
          <input type="text" name="date" autocomplete="off" class="datepicker" onmousemove="savea(this)" id="s3">
        </div>

        <p>
          <label onclick="this.querySelector('input').focus()">
            <input class="with-gap" name="type" type="radio" value="monthly" required />
            <span>Monthly</span>
          </label>
          <br>
          <label onclick="this.querySelector('input').focus()">
            <input class="with-gap" name="type" type="radio" value="yearly" required />
            <span>Yearly</span>
          </label>
          <br>
          <label onclick="this.querySelector('input').focus()">
            <input class="with-gap" name="type" type="radio" value="weekly" required />
            <span>Weekly</span>
          </label>
        </p>    
        <button class="btn blue-grey darken-3 waves-effect waves-light"><i class="material-icons left">add</i>Add</button>
      </div>
    </div>
  </form>
</div>

<script>
  $(document).ready(function(){
    $('.datepicker').datepicker({
      // specify options here
      format: "mm/dd/yyyy",
      autoClose: true
    });
  });
  // this is the id of the form
  $("#quickAddForm").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(), // serializes the form's elements.
      success: function(data)
      {
        window.location.hash="#/my-finances/"
        M.toast({html:data}); // show response from the php script.
      }
    });


  });
  function savea(e) {
    localStorage.setItem(e.id, e.value);
  } 
  document.getElementById('s1').value=localStorage.getItem('s1')||""
  document.getElementById('s2').value=localStorage.getItem('s2')||""
  document.getElementById('s3').value=localStorage.getItem('s3')||""
  document.getElementById('s2').focus()
  document.getElementById('s3').focus()
  document.getElementById('s1').focus()
</script>