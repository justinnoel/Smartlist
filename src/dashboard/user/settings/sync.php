<h5>Pair your account</h5> <br>
<form action="/dashboard/user/settings/pair.php" method="GET" id="pairForm">
  <div class='input-border input-field'>
    <label>User IDs</label>
    <input type="text" class="materialize-textarea" name="pairingaccountid" autocomplete="off">
    <span style='color:#aaa'>
      To find a user ID, ask the person for their user ID at Smartlist. (You can find this in your settings) If you want to sync your inventory with multiple people, hit "enter" for each user id. We'll then send an invitation to sync their inventory with yours, and you're all set! <b class="red-text">Syncing your inventory gives others view, edit AND delete access! This is a potentially destructive action. Make sure you trust the person before giving the ID to them!</b>
    </span>
  </div> 
  <button type="submit" class="btn blue-grey btn-round z-depth-0 darken-4 waves-effect">
    Change
  </button>
</form>
<br>
<!--
<div style='background:#eee;padding: 10px;'>
  <a href="javascript:void(0)" onclick="AJAX_LOAD('#paira', 'https://smartlist.ga/dashboard/resources/pair_req.php')" class="right waves-effect btn purple darken-3">Refresh</a>
  <p><b>Step #2 - View requests</b></p>
  <div id='paira'></div>
</div><br>
<div style='background:#eee;padding: 10px;'> 
  <a href="javascript:void(0)" onclick="AJAX_LOAD('#pairb', 'https://smartlist.ga/dashboard/resources/pairs.php');" id="account_pair_view" class="right waves-effect btn purple darken-3">Refresh</a>
  <p><b>Step #3 - View current accounts paired to yours</b></p>
  <div id='pairb'></div>
</div>
-->
<script>
  $("#pairForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(), // serializes the form's elements.
      success: function(data)
      {
        alert(data); // show response from the php script.
      }
    });


  });

</script>