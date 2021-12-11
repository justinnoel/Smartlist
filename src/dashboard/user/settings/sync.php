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
<script>
document.getElementById("pairForm").addEventListener("submit", (event) =>
  sendData(event)
    .then((res) => M.toast({html:res}) )
);
</script>