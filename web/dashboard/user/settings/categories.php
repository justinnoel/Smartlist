<?php 
session_start();
include("../../cred.php");
?>

<h5>Custom Categories</h5>
<p>Add custom categories, such as "Pillows", "Bottom Rack", "Jackets", etc. Note that deleting a label <b>does not items with the label.</b></p>
<ul class="collection">
 <?php
    try
    {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "SELECT * FROM labels WHERE login= " . $_SESSION['id'];
        $users = $dbh->query($sql);
            foreach ($users as $row){
                ?>
                <li class="collection-item"> 
                    <a href="javascript:void(0)" class="right btn waves-effect btn-flat" onclick="$('#div1').load('./user/labels/delete.php?id=<?=$row['id'];?>', function(){AJAX_LOAD('#_smSettingsPage_categories', './user/settings/categories.php')})"><i class="material-icons">delete</i></a>
                    <b><?=htmlspecialchars($row['name'])?></b>
                    <br>
                    <br>
                </li>
                <?php
        }
            $dbh = null;
    }
    catch(PDOexception $e)
    {
        echo "Error is: " . $e->etmessage();
    }
 ?>
</ul>
<div class="fixed-action-btn">
    <a href="javascript:void(0)" class="btn-fixed btn blue-grey darken-3 btn-large btn-floating" onclick="AJAX_LOAD('#_smSettingsPage_categories', './user/labels/add.php', 'box')">
        <i class="material-icons">add</i>
    </a>
</div>