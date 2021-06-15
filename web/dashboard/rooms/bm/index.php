<?php session_start(); include('../../cred.php'); 
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login WHERE id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
  $goal = $row["goal"];
  $welcome = $row['welcome'];
  $_SESSION['avatar'] = $row['user_avatar'];
  $theme = $row['theme'];
}
?>
<div class="container" style="padding-top: 20px;">
<a href="#bmmodal" class="right modal-trigger btn blue-grey darken-3" onclick="sm_page('News');document.getElementById('bm_amount').focus()">Add a point</a>
<h5>My Budget Meter</h5> 
<?php
try {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'] . " ORDER by id DESC";
$users = $dbh->query($sql);
echo '<table class="table"> <tr> <td>Date</td> <td>Quantity</td> <td>Spent On</td>  <td style="width:10%">Actions</td> </tr><tr id="bm_items"></tr>';
foreach ($users as $row) {
echo "<tr> <td> ".($row['login_id'] !== $_SESSION['id'] ? '<span class="sync">Synced</span>' : '')." ".decrypt($row['name'])." </td> <td> ".decrypt($row['qty'])." </td><td> ".decrypt($row['price'])." </td> <td><a onclick='$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/bm/delete.php?id=".$row['id']."\");this.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons left'>delete</i></a></td> </tr>";
$dbh = null;
}
}
catch (PDOexception $e) {
echo "Error is: " . $e->getmessage();
} ?>
</table>
<div class="section">
<h5>Set a Budget</h5>
<p>Try not to spend more than this!</p>
  <form action="./rooms/bm/setGoal.php" id="setGoal" method="POST">
    <p class="range-field">
      <input type="range" id="test5" min="0" max="500" value="<?=$goal?>" name="goal"/>
    </p>
    <button class="btn blue-grey darken-3 waves-effect waves-light">Set Goal!</button>
  </form>
</div>
</div>
<script>
    var elems  = document.querySelectorAll("input[type=range]");
    M.Range.init(elems);
    // this is the id of the form
    $("#setGoal").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {
                   M.toast({html: "Successfully Updated Goal!"})
               }
             });
    });
</script>