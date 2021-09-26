<h5>Pair your account</h5> <br>
<div style='background:rgba(200, 200, 200, .2);padding: 10px;'>
  <p>Step #1 - Request access</p>
  <form action="pair.php" method="GET" id="pairForm">
    <div class='input-field'>
      <label>Login ID...</label>
      <input type="text" name="pairingaccountid">
      <span style='color:#aaa'>
        To pair, you will need to know the other user's login ID. You can find yours by visiting your account settings. Want to cancel syncing? Submit this form empty
      </span>
    </div> 
    <button type="submit" class="btn purple darken-3 waves-effect">
      Change
    </button>
  </form>
</div>
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