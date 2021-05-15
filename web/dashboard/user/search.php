<?php
session_start();
include('../cred.php');
$q = str_replace('"', '', trim($_POST['query']));
?>
<br>
<div class="container">
<h5>Search results for "<?php echo htmlspecialchars($q); ?>"</h5><br>
<input id='q' value="<?php echo $q; ?>" type="hidden" oninput="qq()">
<ul class="collection" id="search_results">
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c1 = $users->rowCount();
foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <b><a href='javascript:void(0)'>". htmlspecialchars(($row["name"])). "</a></b>
            <br><span>Room</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM products WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c2 = $users->rowCount();
foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "")." onclick=\"change_title('Kitchen');sm_page('Contact');AJAX_LOAD('#Contact', './rooms/kitchen/view.php');\">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."
            <b><a href='javascript:void(0)'>". htmlspecialchars(decrypt($row["name"])). "</a></b>
            <br><span>Kitchen</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM garage WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c3 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)' onclick=\"change_title('Garage');sm_page('About');AJAX_LOAD('#About', './rooms/garage/view.php')\">". htmlspecialchars(decrypt($row["name"])). "</a></b>
            <br><span>Garage</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM bedroom WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c4 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)' onclick=\"change_title('Bedroom');sm_page('Home');AJAX_LOAD('#Home', './rooms/bedroom/view.php')\">". htmlspecialchars(decrypt($row["name"])). "</a></b>
            <br><span>Bedroom</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM bathroom WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c5 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)'onclick=\" change_title('Bathroom');sm_page('bathroom');AJAX_LOAD('#bathroom', './rooms/bathroom/view.php')\">". htmlspecialchars(decrypt($row["name"])). "</a></b>
            <br><span>Bathroom</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM family WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c6 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)' onclick=\"change_title('Family Room');sm_page('family');AJAX_LOAD('#family', './rooms/family/view.php')\">". htmlspecialchars(decrypt($row["name"])). "</a></b>
            <br><span>Family Room</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM storageroom WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c7 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)' onclick=\"change_title('Storage Room');sm_page('storage');AJAX_LOAD('#storage', './rooms/storage/view.php')\">". htmlspecialchars(decrypt($row["name"])). "</a></b>
            <br><span>Storage Room</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM laundry WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c8 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)'>". htmlspecialchars(decrypt($row["name"])). "</a></b>
            <br><span>Laundry</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM dining_room WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c9 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)'>". htmlspecialchars(decrypt($row["name"])). "</a></b>
            <br><span>Dining Room</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM grocerylist WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c10 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <b><a href='javascript:void(0)'>". htmlspecialchars(($row["name"])). "</a></b>
            <br><span>Grocery List</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c11 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <b><a href='javascript:void(0)'>". htmlspecialchars(($row["name"])). "</a></b>
            <br><span>Room</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM todo WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c4 = $users->rowCount();

foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <b><a href='javascript:void(0)' onclick=\"sm_page('News');\">". htmlspecialchars(($row["name"])). "</a></b>
            <br><span>Todo</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>
<?php
try
{
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM custom_room_items WHERE login_id=" . $_SESSION['id'];
$users = $dbh->query($sql);
$c12 = $users->rowCount();
foreach ($users as $row)
{
print "<li class=\"collection-item\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <b><a href='javascript:void(0)' onclick=\"load_croom('" . str_replace('"', '', str_replace("'", "", $row['price'])) . "', '" . str_replace('"', '', str_replace("'", "", decrypt($row['name']))) . "')\"\">". htmlspecialchars(decrypt($row["name"])). "</a></b>
            <br><span>Custom room Item</span>
       </li>";
}
$dbh = null;
}
catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
?>

</ul>
</div>