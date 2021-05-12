<h5>Notifications</h5><br> <form action="./user/turn_on_notifications.php">  <div class="switch">
<label style="display: block;margin-bottom: 10px;">
Push Notifications
<input type="checkbox" name="notifications" oninput="this.parentElement.parentElement.submit()" value="on">
<span class="lever right"></span>
</label>
<label style="display: block;margin-bottom: 10px;">
Mobile Notifications (Coming Soon!)
<input type="checkbox" name="notifications1" oninput="this.parentElement.parentElement.submit()" value="on" disabled>
<span class="lever right"></span>
</label>
<label style="display: block;margin-bottom: 10px;">
Remind me only once a week
<input type="checkbox" name="notifications2" oninput="this.parentElement.parentElement.submit()" value="on" disabled checked>
<span class="lever right"></span>
</label>
</div></form><br> <form action="./user/notifications.php" method="POST"> <p>Minimum # of items per notifications</p> <p class="range-field"> <input type="range" name="remind" min="0" max="100" onmouseup="this.parentElement.parentElement.submit()" value="<?php echo $number_notify; ?>"/> </p> </form><button class="btn grey darken-3" onclick=" desktop_ping('Success!', 'Notifications are enabled!');">Test push notifications</button> 