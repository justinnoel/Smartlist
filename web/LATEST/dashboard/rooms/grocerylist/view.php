<?php session_start();include('../../cred.php')?><div class="container">
    <?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM grocerylist WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
$users = $dbh->query($sql);
echo '<table class="table">
<tr>
<td>Name</td>
<td>Quantity</td>

<td style="width:10%">Actions</td>
</tr>';
foreach ($users as $row)
{
echo "<tr>";
print "<td>" . $row["name"] . "</td><td>" . $row["qty"] . "";
if ($row['login_id'] != $_SESSION['id'])
{
echo "<span clas='badge red' style='float:right;color:white;padding: 4px;border-radius: 2px;background: #00695c !Important'>SYNCED</span>";
}
echo "</td><td>";
echo "<a href=\"https://smartlist.ga/dashboard/rooms/bathroom/delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete this item? This action is irreversible!')\" class='waves-effect'><i class='material-icons'>delete</i></a>
<a href='https://smartlist.ga/dashboard/rooms/share/?name=" . $row['name'] . "&personname=" . $_SESSION['name'] . "&itemqty=" . $row['qty'] . "&room=kitchen&id=" . $row['id'] . "&new=true' class='waves-effect'><i class='material-icons'>share</i></a>
                </td>
                ";
}
$dbh = null;
}
catch(PDOexception $e)
{
echo "Error is: " . $e->etmessage();
}
?>
</table>
</div>