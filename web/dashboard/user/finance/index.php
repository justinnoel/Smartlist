<?php 
session_start();
include('../../cred.php'); 
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM login WHERE id=" . $_SESSION['id'];
$users = $dbh->query($sql);
foreach ($users as $row) {
  $goal = $row["goal"];
  $welcome = $row['welcome'];
  $_SESSION['avatar'] = $row['user_avatar'];
  $theme = $row['theme'];
}
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id']. " ORDER BY id DESC LIMIT 1";
    $users = $dbh->query($sql);
    $moneyToday;
    foreach($users as $row) {
            $moneyToday = decrypt($row['qty']);
    }
}
catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}
if(empty($moneyToday) || !isset($moneyToday)) {
    $moneyToday = 0;
}

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'];
    $users = $dbh->query($sql);
    $moneyThisWeek;
    foreach($users as $row) {
            $moneyThisWeek += decrypt($row['qty']);
    }
}
catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}
?>
<style>
    .alert {
        padding: 10px;
        width: 100%;
        border-radius: 3px;
        margin-bottom: 10px;
    }
    .status {
        width: 10px;
        height: 10px;
        display: inline-block;
        border-radius: 999px;
        margin-right: 10px;
    }
    @media only screen and (min-width: 992px) {
    .del_fade .del {
        width: 5%;
    }
    .del_fade .del i {
        opacity: 0;
        transform: scale(.5);
        transition: all .2s;
    }
    .del_fade:hover .del i{
        opacity: 1;
        transform: scale(1);
    }
    }
</style>
<div class="container" style="padding-top: 20px;width: 90% !important">
    <?php if($moneyToday > $goal) {?>
    <div class="alert red white-text darken-4">
        You can do it! Try to spend less than your budget
    </div>
    <?php } ?>
    <?php if($moneyToday < $goal) {?>
    <div class="alert green white-text darken-4">
        Great Job!!! You're spending less than your budget!
    </div>
    <?php } ?>
    <?php if($moneyToday == $goal && $moneyToday !== 0) {?>
    <div class="alert orange white-text darken-4">
        Haha you spent exactly the same amount of money as your budget. Try to spend less! <img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/apple/76/face-with-stuck-out-tongue-and-winking-eye_1f61c.png" width="24px" style="vertical-align: middle">
    </div>
    <?php } ?>
    <div class="row">
        <div class="col s12 m6">
            <div class="card<?php if($moneyToday > $goal) {?> white-text<?php } if($moneyToday == $goal) {?> orange white-text<?php } ?> <?php if($moneyToday < $goal) {?> white-text <?php } ?>" <?php if($moneyToday > $goal) {?> style="background: #c62828 !important"<?php } ?><?php if($moneyToday == $goal) {?> style="background: #ef6c00 !important"<?php } ?><?php if($moneyToday < $goal) {?>style="background: #2e7d32 !important;"<?php } ?>>
                <div class="card-content">
                    <span class="card-title" style="font-weight: bold !important"><b>$<?=$moneyToday;?><span style="font-size: 15px;color: #aaa"> / $<?=$goal;?></span></b></span>
                    <p>Spent today (<?=date("m/d/Y");?>)</p>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title" style="font-weight: bold !important"><b>$<?=$moneyThisWeek;?></b></span>
                    <p>Overall expenditures</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col s12">
            <div class="card" style="overflow-x:auto">
                <div class="card-content">
                    <span class="card-title" style="font-weight: bold !important"><b>Amount spent overall</b></span>
                    <?php
                        try {
                            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'] . " ORDER by id DESC";
                            $users = $dbh->query($sql);
                            if($users->rowCount() !== 0) {
                            echo '<table class="table" style="animation: none"> <tr style="border:0;height:0;overflow;hidden;display: none"><td></td><td></td> <td></td><td style="width: 5%"></td>';
                                foreach ($users as $row) {
                                echo "<tr class='del_fade'> <td> ".(decrypt($row['qty']) > $goal ? '<div class="red darken-3 status"></div>' : ""). (decrypt($row['qty']) == $goal ? '<div class="orange darken-3 status"></div>' : ""). (decrypt($row['qty']) < $goal ? '<div class="green darken-3 status"></div>' : "")."".($row['login_id'] !== $_SESSION['id'] ? '<span class="sync">Synced</span>' : '')." ".decrypt($row['name'])." </td> <td> ".decrypt($row['qty'])." </td><td><div class='chip'>".decrypt($row['price'])."</div></td>
                                <td class='del'><a onclick='$(\"#div1\").load(\"https://smartlist.ga/dashboard/rooms/bm/delete.php?id=".$row['id']."\");this.parentElement.parentElement.style.display=\"none\";' class='waves-effect'><i class='material-icons left'>delete</i></a></td>
                                </tr>";
                                $dbh = null;
                                }
                                echo '</table>
                    <br><br>';
                            }
                            else {
                                echo 'No expenses!';
                            }
                            }
                        catch (PDOexception $e) {
                            echo "Error is: " . $e->getmessage();
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col s12">
    <div class="card">
    <div class="card-content">
        <div class="section">
            <span class="card-title" style="font-weight: bold !important"><b>Set a goal</b></span>
            <p>Drag the slider below to edit the goal for your budget</p>
              <form action="./rooms/bm/setGoal.php" id="setGoal" method="POST">
                <p class="range-field">
                  <input type="range" id="test5" min="0" max="500" value="<?=$goal?>" name="goal"/>
                </p>
                <button class="btn blue-grey darken-3 waves-effect waves-light">Set Goal!</button>
              </form>
        </div>
    </div>
    </div>
    </div>
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
                   M.toast({html: "Successfully Updated Goal! Reload to see the changes"})
               }
             });
    });
</script>