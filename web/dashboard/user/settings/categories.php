<?php session_start(); include("../../cred.php")?>
<h5>Custom Categories</h5>
<p>Add custom categories, such as "Pillows", "Bottom Rack", "Jackets", etc...</p>
<div id="addLabel" class="modal">
    
</div>
<div class="fixed-action-btn">
    <a href="javascript:void(0)" class="btn-fixed btn blue-grey darken-3 btn-large btn-floating" onclick="AJAX_LOAD('#_smSettingsPage_categories', './user/labels/add.php', 'box')">
        <i class="material-icons">add</i>
    </a>
</div>
<?php
try {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM labels WHERE login= " . $_SESSION['id'];
    $users = $dbh->query($sql);
        foreach ($users as $row){
            ?>
            <li>
                 <?=htmlspecialchars($row['name'])?> 
                 <a href="./user/labels/delete.php?id=<?=$_SESSION['id'];?>"><?=htmlspecialchars($row['name'])?> 
           </li>
            <?php
    }
        $dbh = null;
}
catch(PDOexception $e) {
    echo "Error is: " . $e->etmessage();
}
?>
