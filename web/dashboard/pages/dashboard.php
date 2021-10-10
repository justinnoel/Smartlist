<?php 
include("../header.php");
include("../cred.php");

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
  $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " ORDER BY id DESC LIMIT 1";
  $users = $dbh->query($sql);
  $moneyToday;
  foreach ($users as $row) {
    $moneyToday = decrypt($row['qty']);
  }
} catch (PDOexception $e) {
  echo "Error is: " . $e->getmessage();
}
if (empty($moneyToday) || !isset($moneyToday)) {
  $moneyToday = 0;
}
include("../colorSwitch.php");
?>

<div class="container" style="width: 95% !important">
  <div class="card">
    <div class="card-content">
      <a class="waves-effect right chip modal-trigger" href="#bmmodal"><b>Add</b></a>
      <div class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$5</div>
      <div class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$10</div>
      <div class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$15</div>
      <div class="right hide-on-small-only chip waves-effect" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$20</div>
      <div class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$50</div>
      <div class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$100</div>
      <div class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$150</div>
      <b><h5 style="margin: 5px 0;margin-bottom: 15px">My expenses &nbsp;<?php if ($moneyToday > $goal) {
  echo '<i class="material-icons red-text tooltipped" data-tooltip="Expenses are exceeding your goal" style="vertical-align: middle">warning</i>';
} else {
  echo '<i class="material-icons green-text tooltipped" data-tooltip="Expenses are below your goal" style="vertical-align: middle">check_circle</i>';
} ?></h5></b>
      <div style="height: 400px">
        <canvas id="myChart" width="400" height="300px"></canvas>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6" style="padding-left: 0 !important">
      <div class="card">
        <div class="card-content">
          <b><h5 style="margin: 5px 0;margin-bottom: 15px">Shopping List</h5></b>
          <?php
          try {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM grocerylist WHERE login_id=" . $_SESSION['id'] . " ORDER BY id ASC";
            $users = $dbh->query($sql);
            if($users->rowCount() !== 0) {
              foreach ($users as $row) {
          ?>

          <p style="margin-bottom: 10px;">
            <label>
              <input type="checkbox" oninput="if(confirm('Delete?') === true) {$('#ajaxLoader').load('https://smartlist.ga/dashboard/rooms/grocerylist/delete.php?id=<?=$row["id"];?>', () => {this.parentElement.parentElement.style.color = 'red !important'})}"/>
              <span><?=$row['name'];?></span>
            </label>
          </p>

          <?php
              }
            }
            else {
          ?> 
          <center>
            <br><br>
            <div class="container">
              <div class="container">
                <img src="https://i.ibb.co/1q8kM9z/conifer-list.png" width="100%">
              </div>
              <br>
              
              <p><b>Nothing in your shopping list... </b><a href="#/add/shopping-list">Add something?</a></p>
            </div>
          </center>
          <?php
            }
            $dbh = null;
          } catch (PDOexception $e) {
            echo "Error is: " . $e->getmessage();
          }
          ?>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <h5 style="margin-top:0;">Maintenance for this month</h5>
          <p>Content will next refresh on <?php echo date('m/d/Y', strtotime('first day of +1 month')); ?>
          </p>
          <div class="collection" style="margin-top: 10px">
            <?php $month = date('M');
            switch ($month) {
              case 'Jan': ?> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your stove</strong><br>Clean your stove. It's probably messy
            after a year</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean couches</strong><br>Clean your couches. Wash any throws and
            pillow cases</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your car</strong><br>Take your car to a car wash!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Strip
            the entire bedding of your home</strong><br>Wash every single blanket, pillow, and bed sheets
            in your home</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Inspect your pipes</strong><br>Inspect your pipes. Make sure nothing is
            leaking!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean shower heads</strong><br>Clean shower heads using vinegar. Make
            sure there isn't any hair/soap on it</a>
            <?php
                break;
              case 'Feb': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
              expired food</strong><br>Remove any stale/expired food</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your pantry</strong><br>Organize your
            entire pantry!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fridge</strong><br>Make sure to clean your entire
            fridge!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your shelves/countertops</strong><br>Wipe down shelves and
            countertops</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your dining table</strong><br>Remove any food stains</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            your rooms</strong><br>Scan for any dust and debris in your rooms</a>
            <?php
                break;
              case 'Mar': ?>
            <div style="background: rgba(200,200,200,.1);padding: 15px">Take a break! You've worked hard
              last month! Sit back, relax, and why not watch some TV?</div>
            <?php
                break;
              case 'Apr': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Spring
              Cleaning</strong><br>Make sure to check every room in your home and clean out the clutter!</a>
            <a class="collection-item" href="javascript:void(0)"> <strong>Clean out your mail</strong><br>Throw out
              any junk mail that is unnecessary<br> </a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check AC/heat filter</strong><br>Make sure
            your AC filters are working properly</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check Sprinklers</strong><br>Make sure all
            your sprinklers are fully functional.</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Dust your TV</strong><br>You wouldn't want
            dust on your TV when you're watching your favorite show!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Descale
            Coffee maker</strong><br>Make sure you descale your coffee maker every year!</a>
            <?php
                break;
              case 'May': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Make
              your beds</strong><br>Wash and fold your blankets</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Do your laundry</strong><br>Fold the clothes
            in your laundry room</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check and Vacuum floors</strong><br>Make sure that there aren't any
            loose tiles in your flooring</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your gutters</strong><br>Remove any dirt from your gutters</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            your windows</strong><br>Use glass cleaning spray, and wipe down your windows!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Prune
            your plants</strong><br>Remove any excess branches or dying branches. Let them grow the
            upcoming months</a>
            <?php
                break;
              case 'Jun': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
              your washing machine</strong><br>Run your washing machine empty with vinegar</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
            weeds</strong><br>Pull weeds out in your garden</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your nightstands</strong><br>Remove
            dust from your nightstand</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove lint from your dryer</strong><br>Pull the lint out from your
            dryer's lint compartment</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your bathroom</strong><br>Clean the shower, toilet, and sink</a>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
              your storage room</strong><br>Sort out everything in your storage room</a>
            <?php
                break;
              case 'Jul': ?>
            <div style="background: rgba(200,200,200,.1);padding: 15px">Take a break! You've worked hard
              last month! Sit back, relax, and why not watch some TV?</div>
            <?php
                break;
              case 'Aug': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Fall
              cleaning!</strong><br>Make sure to check every room in your home and clean out the clutter!</a>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
              out your mail</strong><br>Throw out any junk mail that is unnecessary</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
            AC/heat filter</strong><br>Make sure your AC filters are working properly</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
            Sprinklers</strong><br>Make sure all your sprinklers are fully functional. </a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Dust
            your TV</strong><br>You wouldn't want dust on your TV when you're watching your favorite
            show!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Descale Coffee maker</strong><br>Make sure you descale your coffee
            maker every year!</a>
            <?php
                break;
              case 'Sep': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Scan for
              loose shingles</strong><br>Scan for loose shingles on your roof</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            your grill </strong><br> Scrub all corners of the grill<br></a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fireplace</strong><br>Make sure
            there isn't any ash in your fireplace</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Drain garden hoses</strong><br>Drain your
            garden hose</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Water your plants</strong><br>Make sure your plants don't dry out!</a>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Replace
              your car's emergency kit</strong><br>This way, you're going to be prepared for any
              disaster!</a>
            <?php
                break;
              case 'Oct': ?>
            <div style="background: rgba(200,200,200,.1);padding: 15px">Take a break! You've worked hard
              last month! Sit back, relax, and why not watch some TV?</div>
            <?php
                break;
              case 'Nov': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
              expired food</strong><br>Remove stale/expired food</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your pantry</strong><br>Organize your
            entire pantry!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fridge</strong><br>Make sure to clean your entire
            fridge!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your shelves/countertops</strong><br>Wipe down shelves and
            countertops</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your dining table</strong><br>Remove any food stains</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            your rooms</strong><br>Scan for any dust and debris in your rooms</a>
            <?php
                break;
              case 'Dec': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Winter
              cleaning!</strong><br>Is this even a thing? But still, clean your rooms!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            out your mail</strong><br>Throw out any junk mail that is unnecessary</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
            AC/heat filter</strong><br>Make sure your AC filters are working properly</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
            Sprinklers</strong><br>Make sure all your sprinklers are fully functional.</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Dust
            your TV</strong><br>You wouldn't want dust on your TV when you're watching your favorite
            show!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Descale Coffee maker</strong><br>Make sure you descale your coffee
            maker every year!</a>
            <?php
                break;
              default:
                break;
            } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col s12 m6" style="padding-right: 0 !important">
      <div class="card">
        <div class="card-content">
          <b><h5 style="margin: 5px 0;margin-bottom: 15px">Todo List</h5></b>
          <?php
          try {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM todo WHERE login_id=" . $_SESSION['id'] . " ORDER BY id ASC";
            $users = $dbh->query($sql);
            if($users->rowCount() !== 0) {
              foreach ($users as $row) {
          ?>

          <p style="margin-bottom: 10px;">
            <label>
              <input type="checkbox" oninput="if(confirm('Delete Task?') === true) {$('#ajaxLoader').load('https://smartlist.ga/dashboard/rooms/todo/delete.php?id=<?=$row["id"];?>', () => {this.parentElement.parentElement.style.color = 'red !important'})}"/>
              <span><b><?=htmlspecialchars($row['name']);?></b><?=(!empty($row['descs']) ? '<br>': "")?><?=htmlspecialchars($row['descs']);?><?=(!empty($row['qty']) ? '<br>Priority: ': "")?><?=htmlspecialchars($row['qty']);?><?=(!empty($row['price']) ? '<br>Date: ': "")?><?=htmlspecialchars($row['price']);?></span>
            </label>
          </p>

          <?php
              }
            }
            else {?>
          <center>
            <br><br>
            <div class="container">
              <div class="container">
                <img src="https://i.ibb.co/bbdNjFS/clip-1448.png" width="100%">
              </div>
              <p><b>Great Job! You've finished all of your tasks! <a href="#/add/todo">Add something?</a></b></p>
            </div>
          </center>
          <?php }
            $dbh = null;
          } catch (PDOexception $e) {
            echo "Error is: " . $e->getmessage();
          }
          ?>
        </div>
      </div>
      <?php
      include('../rooms/starred.php');
      ?>
      <div class="card fade-up">
        <div class="card-content">
          <h5>Categories</h5>
          <br>
          <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Fruits, Veggies, etc. </div>
          <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Pots/Pans </div>
          <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Cutlery </div>
          <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Bottles and Cups </div>
          <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> Bowls and Plates </div>
          <?php
          try {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM labels WHERE login= " . $_SESSION['id'];
            $users = $dbh->query($sql);
            foreach ($users as $row) {
          ?>
          <div class="chip waves-effect" onclick="var e=document.getElementById('search');showsearch();e.focus();e.value=this.innerText;e.click()"> <?= htmlspecialchars($row['name']) ?> </div>
          <?php
              }
            $dbh = null;
          } catch (PDOexception $e) {
            echo "Error is: " . $e->etmessage();
          }
          ?>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  var ctx = document.getElementById("myChart").getContext("2d");
  var budgetMeter = new Chart(ctx, {
    type: "line",
    data: {
      labels: [<?php 
        try {
          $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " ORDER BY id ASC";
          $users = $dbh->query($sql);
          foreach ($users as $row) {
            echo "" . json_encode(decrypt($row['name'])) . ", ";
          }
          $dbh = null;
        } catch (PDOexception $e) {
          echo "Error is: " . $e->getmessage();
        }
        ?>],
      datasets: [
        {
          label: 'Budget',
          data: [<?php try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'];
  $users = $dbh->query($sql);
  foreach ($users as $row) {
    echo $goal . ", ";
  }
  $dbh = null;
} catch (PDOexception $e) {
  echo "Error is: " . $e->getmessage();
}
            ?>],
          type: 'line',
          order: 1,
          borderColor: '#f44336',
          borderWidth: 3,
          backgroundColor: 'rgba(245, 71, 83, 0)',
        },
        {
          label: "Amout spent",
          data: [<?php

            try {
              $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $sql = "SELECT * FROM bm WHERE login_id=" . $_SESSION['id'] . " ORDER BY id ASC";
              $users = $dbh->query($sql);
              foreach ($users as $row) {
                echo "" . trim(decrypt($row['qty'])) . ", ";
              }
              $dbh = null;
            } catch (PDOexception $e) {
              echo "Error is: " . $e->getmessage();
            }
            ?>],
          backgroundColor: (document.documentElement.classList.contains('_darkTheme') ? "rgba(255, 255, 255, .3)" : "<?=$bmBgColor;?>"),
          borderColor: (document.documentElement.classList.contains('_darkTheme') ? "#fff" : "<?=$bmBorderColor;?>"),
          borderWidth: 3,
          tension: 0.3,
          fill: true,
        },
      ],
    },
    options: {
      spanGaps: true,
      normalized: true,
      animations: false,
      maintainAspectRatio: false,
      responsive: true,
      aspectRatio: 10,
      interaction: {
        mode: "nearest",
        axis: "x",
        intersect: false,
        label: function (txt) {
          return "$" + txt;
        },
      },

      elements: {
        point: {
          radius: 0,
          display: false,
        },
      },
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          backgroundColor: "#fff",
          titleColor: "black",
          bodyColor: "black",
          usePointStyle: true,
          padding: 10,
          borderColor: "#eee",
          borderWidth: 3,
          position: "nearest",
          displayColors: false,
          cornerRadius: $(window).width() < 900 ? 10 : 6,
          titleFont: {
            size: 14,
            weight: "800",
            family:
            '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
          },
          bodyFont: {
            size: 12,
            family:
            '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
          },
          callbacks: {},
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            drawBorder: false,
          },
          ticks: {
            maxTicksLimit: 10,
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
          ticks: {
            font: {
              family:
              '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
            },
            autoSkip: true,
            maxRotation: 0,
            align: "start",
            minRotation: 0,
            maxTicksLimit: $(window).width() < 900 ? 3 : 5,
          },
          grid: {
            display: false,
            drawBorder: false,
          },
        },
      },
    },
  });
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
      .register('sw.js')
      .then(() => { console.log('Service Worker Registered'); });
  }

  function notifyMe() {
    if (!("Notification" in window)) {
      alert("This browser does not support desktop notification");
    }

    else if (Notification.permission !== "denied") {
      Notification.requestPermission().then(function (permission) {
        if (permission === "granted") {
          // var notification = new Notification("Hi there!");
        }
      });
    }
  }

  document.body.onload = notifyMe;
  function sendNotification(data, id) {
    Notification.requestPermission(function(result) {
      if (result === 'granted') {
        navigator.serviceWorker.ready.then(function(registration) {
          var __nt = registration.showNotification('EdPoll', {
            body: data,
            data: data,
            image: (poll.banner ? poll.banner : null),
            icon: "https://image.flaticon.com/icons/png/512/5455/5455405.png",
            vibrate: [200, 100, 200],
            data: {
              dateOfArrival: Date.now()
            },
            actions: [ 
              {action: `view_${id}`, title: 'View updated results',
               // icon: 'images/checkmark.png'
              },
            ]
          });

          __nt.onclick = function() {
            window.open(`https://${window.location.hostname}/r/${id}`)
          }

        });
      }
    });
  }
  $(".tooltipped").tooltip();
</script>