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
  if($users->rowCount() !== 1) {
    exit("<div class='container'><div class='container'><div class='container'><div class='container'><center><img src='https://i.ibb.co/0CCfgRs/images-1.png' width='100%'></center></div></div></div></div><center><br><br><b>No expenses so far!</b><br>To create an expense, click the add button next to the \"My Finances\" section in the dashboard</center>");
  }
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
  $moneyOverall = 0;
  $average= 0;
  foreach($users as $row) {
    $average += decrypt($row['qty']);
    $moneyOverall += decrypt($row['qty']);
  }
  $average = $average/$users->rowCount();
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
    .del_fade .del .dd {
      opacity: 0;
      transform: scale(.5);
      transition: all .2s;
    }
    .del_fade .del:hover .dd{
      opacity: 1;
      transform: scale(1);
    }
  }
  @media only screen and (max-width: 992px) {
    .del_fade .del .dd {
      opacity: .2;
      transform: scale(.9);
      transition: all .2s;
    }
    .del_fade .del:hover .dd{
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
    <div class="col s12 m4">
      <div class="card<?php if($moneyToday > $goal) {?> white-text<?php } if($moneyToday == $goal) {?> orange white-text<?php } ?> <?php if($moneyToday < $goal) {?> white-text <?php } ?>" <?php if($moneyToday > $goal) {?> style="background: #c62828 !important"<?php } ?><?php if($moneyToday == $goal) {?> style="background: #ef6c00 !important"<?php } ?><?php if($moneyToday < $goal) {?>style="background: #2e7d32 !important;"<?php } ?>>
        <div class="card-content">
          <span class="card-title" style="font-weight: bold !important"><b>$<?=$moneyToday;?><span style="font-size: 15px;color: rgba(200, 200, 200, .7)"> / $<?=$goal;?></span></b></span>
          <p>Spent today (<?=date("m/d/Y");?>)</p>
        </div>
      </div>
    </div>
    <div class="col s12 m4">
      <div class="card">
        <div class="card-content">
          <span class="card-title" style="font-weight: bold !important"><b>$<?=$moneyOverall;?></b></span>
          <p>Overall expenditures</p>
        </div>
      </div>
    </div>
    <div class="col s12 m4">
      <div class="card">
        <div class="card-content">
          <span class="card-title" style="font-weight: bold !important"><b>$<?=round($average, 2);?></b></span>
          <p>Daily Average</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="card" style="overflow-x:scroll">
        <div class="card-content">
          <span class="card-title" style="font-weight: bold !important"><b>Amount spent overall</b></span>
          <ul class="collection del_fade">
            <?php 
            try {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt( $_SESSION['syncid'])) . " ORDER by id DESC";
              $users = $dbh->query($sql);
              foreach($users as $row) {
                switch(decrypt($row['price'])) {
                  case "Grocery Shopping": 
                    $__icon__ = "local_grocery_store";
                    $color = "red";
                    break;
                  case "Clothes Shopping":
                    $__icon__ = "checkroom";
                    $color = "green";
                    
                    break;
                  case "Entertainment":
                    $__icon__ = "sports_esports";
                    $color = "purple";
                    
                    break;
                  case "Bills":
                    $__icon__ = "receipt";
                    $color = "blue";
                    
                    break;
                  case "Home Improvement":
                    $__icon__ = "home";
                    $color = "orange";
                    
                    break;
                  case "Education":
                    $__icon__ = "school";
                    $color = "blue-grey";
                    
                    break;
                  case "Holidays":
                    $__icon__ = "celebration";
                    $color = "yellow darken-3";
                    
                    break;
                  case "Other":
                    $__icon__ = "more_vert";
                    $color = "pink";
                    
                    break;
                }
            ?>
            <li class="collection-item avatar del" style="padding-top: 20px;">
              <i class="material-icons circle <?=$color;?>"><?=$__icon__;?></i>
              <span class="title"><b><?=decrypt(htmlspecialchars($row['price']));?></b></span>
              <p><?=decrypt(htmlspecialchars($row['name']));?>
              </p>
              <a href="javascript:void(0)" class="secondary-content">-$<?=decrypt(htmlspecialchars($row['qty']));?> <br><i class="dd material-icons red-text" style="margin-top: 10px;margin-left: 10px;" onclick='if(confirm("Delete?") === true) $("#ajaxLoader").load("./rooms/bm/delete.php?id=<?=$row['id']?>", getHashPage)'>delete</i></a>
            </li>
            <?php
                }
            }
            catch (PDOexception $e) {
              echo "Error is: " . $e->getmessage();
            }
            ?>
          </ul>
          <!--<canvas id="circleGraph"></canvas>-->
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
  /* 
  var financeConfig = {
    type: 'doughnut',
    data: financeData,
  };
  var financeData = {
    labels: [
      'Red',
      'Blue',
      'Yellow'
    ],

    datasets: [{
      label: 'My First Dataset',
      data: [300, 50, 100],
      borderWidth: 0,
      // weight: 100,
      // offset: 20,
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      // spacing: 55,
      hoverOffset: 5
    }]
  };
  var financeGraph = new Chart(document.getElementById("circleGraph").getContext("2d"), {
    type: "doughnut",
    data: financeData,
    options: {
      cutoutPercentage: 80,
      plugins: {
        legend: {
          display: false,
        },
      },
    }
  })
  */
</script>