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

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id']. " ORDER BY `id` DESC LIMIT 1";
$users = $dbh->query($sql);
if($users->rowCount() !== 1) {$noBudgetToday = true;}
$noBudgetToday = false;
foreach($users as $row) {if(decrypt($row['name']) !== date('m/d/Y')) {$noBudgetToday = true;}}

if(empty($moneyToday) || !isset($moneyToday)) {
  $moneyToday = 0;
}

try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'];
  $users = $dbh->query($sql);
  $moneyOverall = 0;
  $average= 0;
  $arr = [];
  foreach($users as $row) {
    $arr[] = decrypt($row["name"]);
    $average += decrypt($row['qty']);
    $moneyOverall += decrypt($row['qty']);
  }
  $average = $average/$users->rowCount();
}
catch (PDOexception $e) {
  echo "Error is: " . $e->getmessage();
}

function date_sort($a, $b) {
  return strtotime($a) - strtotime($b);
}
if(is_array($arr)) {
  usort($arr, "date_sort");
  // print_r($arr);
  $arr = array_unique($arr);
}
function find_closest($array, $date) {
  foreach($array as $day) {
    $interval[] = abs(strtotime($date) - strtotime($day));
  }
  asort($interval);
  $closest = key($interval);
  $closest1 = key($interval);

  return $array[$closest];
}
?>
<style>
  .alert {
    padding: 10px;
    width: calc(100% - 20px);
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
  ::-webkit-scrollbar {display: none}
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
  .container1 {
    width: 90% !important;
  }
  .chip {transition: all .2s;}
  .chip:active {
    transform:scale(.95)
  }
  .red.chip {
    background: #aaa !important
  }
  .close {cursor: pointer}
  @media only screen and (max-width: 992px) {
    .container1 {width: 99% !important}
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
<div class="container container1" style="padding-top: 20px;">
  <center>
    <?php if($noBudgetToday == true) {?>
    <div class="alert red white-text darken-4">
      You haven't entered today's expenses
      <i class="close right material-icons" onclick='this.parentElement.remove()'>close</i>
    </div>
    <?php } ?>
    <?php if($moneyToday > $goal) {?>
    <div class="alert red white-text darken-4">
      You can do it! Try to spend less than your budget
      <i class="close right material-icons" onclick='this.parentElement.remove();localStorage.setItem("msg", "true");' id="msg">close</i>
    </div>
    <?php } ?>
    <?php if($moneyToday < $goal) {?>
    <div class="alert green white-text darken-4">
      <span class="hide-on-small-only">Great Job!</span> You're spending less than your budget!
      <i class="close right material-icons" onclick='this.parentElement.remove();localStorage.setItem("msg", "true");' id="msg">close</i>
    </div>
    <?php } ?>
    <?php if($moneyToday == $goal && $moneyToday !== 0) {?>
    <div class="alert orange white-text darken-4">
      Haha you spent exactly the same amount of money as your budget. Try to spend less! <img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/apple/76/face-with-stuck-out-tongue-and-winking-eye_1f61c.png" width="24px" style="vertical-align: middle">
      <i class="close right material-icons" onclick='this.parentElement.remove();localStorage.setItem("msg", "true");' id="msg">close</i>
    </div>
    <?php } ?>
  </center>
  <div class="row"><div class="col s12"><h5 class="show-on-large-only"><b>My Expenses</b></h5></div></div>
  <div class="row">
    <div class="col s12 m4 center">
      <div class="card<?php if($moneyToday > $goal) {?> white-text<?php } if($moneyToday == $goal) {?> orange white-text<?php } ?> <?php if($moneyToday < $goal) {?> white-text green darken-4<?php } ?>" <?php if($moneyToday > $goal) {?> style="background: #c62828 !important"<?php } ?><?php if($moneyToday == $goal) {?> style="background: #ef6c00 !important"<?php } ?>>
        <div class="card-content">
          <span class="card-title" style="font-weight: bold !important"><b>$<?=$moneyToday;?><span style="font-size: 15px;color: rgba(200, 200, 200, .7)"> / $<?=$goal;?></span></b></span>
          <p>Latest expense</p>
        </div>
      </div>
    </div>
    <div class="col s12 m4 center">
      <div class="card">
        <div class="card-content">
          <span class="card-title" style="font-weight: bold !important"><b>$<?=$moneyOverall;?></b></span>
          <p>Overall expenditures</p>
        </div>
      </div>
    </div>
    <div class="col s12 m4 center">
      <div class="card">
        <div class="card-content">
          <span class="card-title" style="font-weight: bold !important"><b>$<?=round($average, 2);?></b></span>
          <p>Daily Average</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-content">
          <h5><b>What I've spent on</b></h5>
          <br>
          <canvas id="circleGraph"></canvas>
        </div>
      </div>
    </div>

    <div class="col s12 m6" style="height: 100%">
      <div class="card" style="padding-bottom: 20px">
        <div class="card-content">
          <a href="#/add/subscription" class="right green-text"><i class="material-icons" style="margin-top: 10px">add</i></a>
          <h5><b>Upcoming Payments</b></h5>
          <div class="row">
            <?php

            try {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $sql = "SELECT * FROM payment_subs WHERE login_id=" . $_SESSION['id'];
              $users = $dbh->query($sql);
              if($users->rowCount() !== 0) {
                $a = $b = [];
                $next_1 = $next_2 = $next_3 = "null";
                foreach($users as $row) {
                  $row['date'] = decrypt($row['date']);
                  $a[] = $row;
                  $b[] = $row['date'];
                }
                // echo find_closest($b, date("m/d/Y"));
                if(count($b) >= 1) { 

                  if (($key = array_search(find_closest($b, date("m/d/Y")), $b)) !== false) {
                    $next_1 = ($b[$key]);
                    unset($b[$key]);
                    $b = array_values($b);
                    unset($key);
                    if(count($b) >= 2) { 
                      if (($key = array_search(find_closest($b, date("m/d/Y")), $b)) !== false) {
                        $next_2 = ($b[$key]);
                        unset($b[$key]);
                        $b = array_values($b);
                        if(count($b) >= 3) { 
                          if (($key = array_search(find_closest($b, date("m/d/Y")), $b)) !== false) {
                            $next_3 = ($b[$key]);
                            unset($b[$key]);
                            $b = array_values($b);
                          }
                        }
                      }
                    }
                  }
                }

                // $c = find_closest($cc, date("m/d/Y"));
                foreach($a as $row) {
                  if($row['date'] == $next_1 || $row['date'] == $next_2 || $row['date'] == $next_3) {
            ?> 
            <div class="col s12 m4">
              <h6><b><?=decrypt($row['name']);?></b></h6>
              <p><?=($row['date']); ?></p>
              <p>$<?=decrypt($row['price']); ?></p>
            </div>
            <?php
                  }
                }
              }
              else {
            ?> 
            <div class="col s12">
              <b>No subscriptions so far!</b><br>
              <p>Keep track of your monthly/yearly subscriptions. </p>
            </div>
            <?php
              }
            }
            catch (PDOexception $e) {
              echo "Error is: " . $e->getmessage();
            }

            ?>
          </div>
          <a href="#/my-finances/payments">View All &gt;</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col s12 center">
        <div class="card-content" style="padding-bottom: 14px">
          <div class="chip-suggestions" style="overflow:scroll !important;display: block !important;white-space: nowrap">
            <?php foreach($arr as $v) { ?>
            <div class="chip waves-effect <?=($v == date("m/d/Y") ? "blue waves-light white-text darken-3":"")?>" onclick="loadDate('<?=$v;?>', this)"><?=str_replace("09/", "9/", str_replace("08/", "8/", str_replace("07/", "7/", str_replace("06/", "6/", str_replace("05/", "5/", str_replace("04/", "4/", str_replace("03/", "3/", str_replace("02/", "2/", str_replace("01/", "1/", str_replace("/".date("Y"), "", $v))))))))));?></div>
            <?php } ?>
            <div class="chip waves-effect" onclick="$('#a').load('./user/finance/date.php');">Reset</div>
          </div>
        </div>
      </div>
      <div class="col s12" style="padding: 0 !important">
        <div class="card" style="overflow-x:scroll">
          <div class="card-content" id="a">
            <span class="card-title" style="font-weight: bold !important"><b>Amount spent overall</b></span>
            <ul class="collection del_fade">
              <?php 
              try {
                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . json_encode(decrypt( $_SESSION['syncid'])) . " ORDER by id DESC LIMIT 20";
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
                <a href="javascript:void(0)" class="secondary-content">-$<?=decrypt(htmlspecialchars($row['qty']));?> <br><i class="dd material-icons red-text" style="margin-top: 10px;margin-left: 10px;" onclick='deleteBM(this, <?=$row['id']?>)'>delete</i></a>
              </li>
              <?php
                  }
              }
              catch (PDOexception $e) {
                echo "Error is: " . $e->getmessage();
              }
              ?>
            </ul>
            Select a date from above to view the entire log
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
          M.toast({html: "Successfully Updated Goal"});
          getHashPage("hide");
          // window.scrollTo(0,0)
        }
      });
    });

    var financeConfig = {
      type: 'doughnut',
      data: financeData,
    };
    var financeData = {
      labels: ["Grocery Shopping","Clothes Shopping","Bills","Education","Entertainment","Home Improvement","Other",],
      datasets: [{
        label: '',
        data: [<?php
  $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'];
                         $users = $dbh->query($sql);
                         $a = 0;
                         $b = 0;
                         $c = 0;
                         $d = 0;
                         $e = 0;
                         $f = 0;
                         $g = 0;
                         foreach ($users as $row) {
                           switch(trim(decrypt($row['price']))) {
                             case "Grocery Shopping": $a += intval(trim(decrypt($row['qty']))); break;
                             case "Clothes Shopping": $b += intval(trim(decrypt($row['qty']))); break;
                             case "Bills": $c += intval(trim(decrypt($row['qty']))); break;
                             case "Education": $d += intval(trim(decrypt($row['qty']))); break;
                             case "Entertainment": $e += intval(trim(decrypt($row['qty']))); break;
                             case "Home Improvement": $f += intval(trim(decrypt($row['qty']))); break;
                             case "Other": $g += intval(trim(decrypt($row['qty']))); break;
                           }
                         }
                         echo $a.",".$b.",".$c.",".$d.",".$e.",".$f.",".$g.","
          ?>],
        borderWidth: 0,
        // weight: 100,
        // offset: 20,
        backgroundColor: [
          '#d32f2f',
          '#1565c0',
          '#2e7d32',
          '#37474f',
          '#3e2723',
          '#d84315',
          '#c2185b',
        ],
        spacing: -2,
        // hoverOffset: 5
      }]
    };
    var financeGraph = new Chart(document.getElementById("circleGraph").getContext("2d"), {
      type: "bar",
      data: financeData,
      options: {
        cutoutPercentage: 80,
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              drawBorder: false,
            },
            ticks: {

              maxTicksLimit: 5,
              callback: function (value, index, values) {
                return "$" + value;
              },
              font: {
                family:
                '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
              },
            },
          },
          x: {
            display: false,
            ticks: {
              font: {
                family:
                '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
              },
            },
            grid: {
              display: false,
              drawBorder: false,
            },
          },
        },
        cutoutPercentage: 80,
        plugins: {
          tooltip: {displayColors:false},
          legend: {
            display: false,
            position: "bottom",
            labels: {
              usePointStyle: true,
              pointStyle: "circle",
            }
          },
        },
      }
    })

    function loadDate(e, el) {
      $('#a').load('./user/finance/date.php?d='+encodeURI(e));
      $(".chip").removeClass('red');
      $(".chip").removeClass('blue');
      $(".chip").removeClass('white-text');
      $(".chip").removeClass('waves-light');
      el.classList.add('red');
    }
    document.querySelector('.chip-suggestions').scrollLeft = 99999999999
    if(localStorage.getItem("msg")) {
      document.getElementById('msg').parentElement.remove();
    }
    function deleteBM(el, id) {
      M.Toast.dismissAll();
      el.parentElement.parentElement.style.display = 'none';
      M.toast({
        html: `Deleted <button class="btn-flat toast-action" onclick="M.Toast.dismissAll();return false">Undo</button>`, 
        completeCallback: function() {
          $("#ajaxLoader").load("./rooms/bm/delete.php?id="+id, () => {
            getHashPage("hide")
          })
        }
      })
    }
  </script>