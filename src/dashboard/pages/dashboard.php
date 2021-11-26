<?php
include "../header.php";
include "../cred.php";
$noExpenses = false;
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
$sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");
$sql->execute(array(':sessid' => $_SESSION['id']));
$users = $sql->fetchAll();
foreach ($users as $row) {
    $goal = $row["goal"];
    $welcome = $row['welcome'];
    $_SESSION['avatar'] = $row['user_avatar'];
    $theme = $row['theme'];
    $_SESSION['purpose'] = $row['purpose'];
    if (!empty($row['financePlan'])) {
        $financePlan = decrypt($row['financePlan']);
    } else {
        $financePlan = "none";
    }
}
try {
    $dbh = new PDO(
        "mysql:host=".App::server.";dbname=".App::database,
        App::username,
        App::password
    );
    $sql = $dbh->prepare(
        "SELECT * FROM bm WHERE login_id=:sessid ORDER BY id DESC LIMIT 1"
    );
    $sql->execute(array(':sessid' => $_SESSION['id']));
    $users = $sql->fetchAll();
    $moneyToday;
    if (count($users) > 0) {
        foreach ($users as $row) {
            $moneyToday = decrypt($row['qty']);
        }
    } else {
        $moneyToday = 0;
        $noExpenses = true;
    }
} catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}
if (empty($moneyToday) || !isset($moneyToday)) {
    $moneyToday = 0;
}
try {
    $dbh = new PDO(
        "mysql:host=".App::server.";dbname=".App::database,
        App::username,
        App::password
    );
    $sql = $dbh->prepare(
        "SELECT * FROM bm WHERE login_id=:sessid ORDER BY id ASC"
    );
    $sql->execute(array(':sessid' => $_SESSION['id']));
    $users = $sql->fetchAll();
    $moneyOverall = 0;
    $average = 0;
    $arr = [];
    if (count($users) > 0) {
        foreach ($users as $row) {
            $arr[] = decrypt($row["name"]);
            $average += decrypt($row['qty']);
            $moneyOverall += decrypt($row['qty']);
        }
        $average = $average / count($users);
    }
} catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}
include "../colorSwitch.php";
?>
<style>.disabled {opacity: .7!important;pointer-events: none}</style>
<div class="container" style="width: 95% !important">
  <div style="padding-top: 10px;width:100%" class="hide-on-small-only"></div>
  <div class="card">
    <div class="card-content">
    <?php if (!$noExpenses) { ?>
      <a class="waves-effect right chip modal-trigger" href="#bmmodal"><b>Add</b></a>
      <a href="javascript:void(0)" class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$5</a>
      <a href="javascript:void(0)" class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$10</a>
      <a href="javascript:void(0)" class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$15</a>
      <a href="javascript:void(0)" class="right hide-on-small-only chip waves-effect" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$20</a>
      <a href="javascript:void(0)" class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$50</a>
      <a href="javascript:void(0)" class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$100</a>
      <a href="javascript:void(0)" class="right chip waves-effect hide-on-small-only" onclick="document.getElementById('bm_amount').value=this.innerText.replace('$', '');bm_add();M.toast({html: 'Added data successfully!'});">$150</a>
      <b><h5 style="margin: 5px 0;margin-bottom: 15px"><b>Expenses</b> &nbsp;<?php if (
          intval($moneyToday) === 0
      ) {
          echo '<i class="material-icons orange-text tooltipped" data-tooltip="Hooray! You didn\'t spend any money today!" style="vertical-align: middle">celebration</i>';
      } elseif ($moneyToday > $goal) {
          if ($financePlan == "medium-term") {
              echo '<i class="material-icons red-text tooltipped" data-tooltip="Expenses are exceeding your goal, however your budget is lenient on weekends. " style="vertical-align: middle">running_with_errors</i>';
          } elseif ($financePlan == "long-term") {
              echo '<i class="material-icons red-text tooltipped" data-tooltip="Try not to spend more than this amount!" style="vertical-align: middle">warning</i>';
          } else {
              echo '<i class="material-icons red-text tooltipped" data-tooltip="Expenses are exceeding your goal" style="vertical-align: middle">trending_up</i>';
          }
      } else {
          echo '<i class="material-icons green-text tooltipped" data-tooltip="Expenses are below your goal" style="vertical-align: middle">check_circle</i>';
      }} ?></h5></b>
      <div style="<?php if (!$noExpenses) { ?>height: 400px<?php } ?>">
        <canvas id="myChart" width="400" height="300px" <?php if($noExpenses == true) {?>style="display:none"<?php } ?> ></canvas>
        <?php if ($noExpenses) { ?>
            <center style="padding-top: 20px;padding-bottom: 20px;">
                <i class="grey-text material-icons medium">error</i><br>
                <h5 class="grey-text">No expenses yet</h5>
                <a class="modal-trigger grey-text text-darken-2" href="#bmmodal">Add one</a>
            </center>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="row" style="margin-bottom: 0 !important">
    <div class="col s12 m6" style="padding: 3px !important">
      <div class="card">
        <div class="card-content">
          <a href="#/add/shopping-list" class="btn right btn-floating btn-flat waves-effect"><i style="color:var(--font-color)!important" class="material-icons">add</i></a>
          <h5 style="margin: 5px 0;margin-bottom: 15px"><b>Shopping List</b></h5>
          <?php try {
              $dbh = new PDO(
                  "mysql:host=".App::server.";dbname=".App::database,
                  App::username,
                  App::password
              );
              $sql = $dbh->prepare(
                  "SELECT * FROM grocerylist WHERE login_id=:sessid ORDER BY id ASC"
              );
              $sql->execute(array(':sessid' => $_SESSION['id']));
              $users = $sql->fetchAll();
              if (count($users) !== 0) {
                  foreach ($users as $row) { ?>

          <p style="margin-bottom: 10px;">
            <label>
              <input type="checkbox" oninput="if(confirm('Delete?') === true) {this.parentElement.parentElement.parentElement.classList.add('disabled');$('#ajaxLoader').load('https://smartlist.ga/dashboard/user/grocerylist/delete.php?id=<?= $row[
                  "id"
              ] ?>', () => {this.parentElement.parentElement.parentElement.classList.remove('disabled');})}"/>
              <span class="truncate"><?= decrypt($row['name']) ?></span>
            </label>
          </p>

          <?php }
              } else {
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
          } ?>
        </div>
      </div>
      <?php if ($_SESSION["studentMode"] !== "true") {
          if ($_SESSION['purpose'] !== 'business') { ?>
      <div class="card">
        <div class="card-content">
          <h5 style="margin-top:0;"><b>Maintenance for this month</b></h5>
          <p>Content will next refresh on <?php echo date(
              'm/d/Y',
              strtotime('first day of +1 month')
          ); ?>
          </p>
          <div class="collection" style="margin-top: 10px">
            <?php
            $month = date('M');
            switch (
                $month
            ) { case 'Jan': ?> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your stove</strong><br>Clean your stove. It's probably messy
            after a year</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean couches</strong><br>Clean your couches. Wash any throws and
            pillow cases</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your car</strong><br>Take your car to a car wash!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Strip
            the entire bedding of your home</strong><br>Wash every single blanket, pillow, and bed sheets
            in your home</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Inspect your pipes</strong><br>Inspect your pipes. Make sure nothing is
            leaking!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean shower heads</strong><br>Clean shower heads using vinegar. Make
            sure there isn't any hair/soap on it</a>
            <?php break;case 'Feb': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
              expired food</strong><br>Remove any stale/expired food</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your pantry</strong><br>Organize your
            entire pantry!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fridge</strong><br>Make sure to clean your entire
            fridge!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your shelves/countertops</strong><br>Wipe down shelves and
            countertops</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your dining table</strong><br>Remove any food stains</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            your rooms</strong><br>Scan for any dust and debris in your rooms</a>
            <?php break;case 'Mar': ?>
            <div style="background: rgba(200,200,200,.1);padding: 15px">Take a break! You've worked hard
              last month! Sit back, relax, and watch some TV?</div>
            <?php break;case 'Apr': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Spring
              Cleaning</strong><br>Make sure to check every room in your home and clean out the clutter!</a>
            <a class="collection-item" href="javascript:void(0)"> <strong>Clean out your mail</strong><br>Throw out
              any junk mail that is unnecessary<br> </a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check AC/heat filter</strong><br>Make sure
            your AC filters are working properly</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check Sprinklers</strong><br>Make sure all
            your sprinklers are fully functional.</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Dust your TV</strong><br>You wouldn't want
            dust on your TV when you're watching your favorite show!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Descale
            Coffee maker</strong><br>Make sure you descale your coffee maker every year!</a>
            <?php break;case 'May': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Make
              your beds</strong><br>Wash and fold your blankets</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Do your laundry</strong><br>Fold the clothes
            in your laundry room</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check and Vacuum floors</strong><br>Make sure that there aren't any
            loose tiles in your flooring</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your gutters</strong><br>Remove any dirt from your gutters</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            your windows</strong><br>Use glass cleaning spray, and wipe down your windows!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Prune
            your plants</strong><br>Remove any excess branches or dying branches. Let them grow the
            upcoming months</a>
            <?php break;case 'Jun': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
              your washing machine</strong><br>Run your washing machine empty with vinegar</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
            weeds</strong><br>Pull weeds out in your garden</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your nightstands</strong><br>Remove
            dust from your nightstand</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove lint from your dryer</strong><br>Pull the lint out from your
            dryer's lint compartment</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your bathroom</strong><br>Clean the shower, toilet, and sink</a>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
              your storage room</strong><br>Sort out everything in your storage room</a>
            <?php break;case 'Jul': ?>
            <div style="background: rgba(200,200,200,.1);padding: 15px">Take a break! You've worked hard
              last month! Sit back, relax, and why not watch some TV?</div>
            <?php break;case 'Aug': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Fall
              cleaning!</strong><br>Make sure to check every room in your home and clean out the clutter!</a>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
              out your mail</strong><br>Throw out any junk mail that is unnecessary</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
            AC/heat filter</strong><br>Make sure your AC filters are working properly</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
            Sprinklers</strong><br>Make sure all your sprinklers are fully functional. </a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Dust
            your TV</strong><br>You wouldn't want dust on your TV when you're watching your favorite
            show!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Descale Coffee maker</strong><br>Make sure you descale your coffee
            maker every year!</a>
            <?php break;case 'Sep': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Scan for
              loose shingles</strong><br>Scan for loose shingles on your roof</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            your grill </strong><br> Scrub all corners of the grill<br></a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fireplace</strong><br>Make sure
            there isn't any ash in your fireplace</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Drain garden hoses</strong><br>Drain your
            garden hose</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Water your plants</strong><br>Make sure your plants don't dry out!</a>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Replace
              your car's emergency kit</strong><br>This way, you're going to be prepared for any
              disaster!</a>
            <?php break;case 'Oct': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
              expired food</strong><br>Remove any stale/expired food</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your pantry</strong><br>Organize your
            entire pantry!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fridge</strong><br>Make sure to clean your entire
            fridge!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your shelves/countertops</strong><br>Wipe down shelves and
            countertops</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your dining table</strong><br>Remove any food stains</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            your rooms</strong><br>Scan for any dust and debris in your rooms</a>
            <?php break;case 'Nov': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Remove
              expired food</strong><br>Remove stale/expired food</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your pantry</strong><br>Organize your
            entire pantry!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your fridge</strong><br>Make sure to clean your entire
            fridge!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your shelves/countertops</strong><br>Wipe down shelves and
            countertops</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean your dining table</strong><br>Remove any food stains</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            your rooms</strong><br>Scan for any dust and debris in your rooms</a>
            <?php break;case 'Dec': ?>
            <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Winter
              cleaning!</strong><br>Is this even a thing? But still, clean your rooms!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Clean
            out your mail</strong><br>Throw out any junk mail that is unnecessary</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
            AC/heat filter</strong><br>Make sure your AC filters are working properly</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Check
            Sprinklers</strong><br>Make sure all your sprinklers are fully functional.</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Dust
            your TV</strong><br>You wouldn't want dust on your TV when you're watching your favorite
            show!</a> <a class="collection-item mtoggle" href="javascript:void(0)" onclick="mtoggle(this)"><strong>Descale Coffee maker</strong><br>Make sure you descale your coffee
            maker every year!</a>
            <?php break;default:
                    break;
            }
            ?>
          </div>
        </div>
      </div>
      <?php }
      } ?>
    </div>
    <div class="col s12 m6" style="padding: 3px !important">
      <div class="card">
        <div class="card-content">
          <a href="#/add/reminder" class="btn right btn-floating btn-flat waves-effect"><i style="color:var(--font-color)!important" class="material-icons">add</i></a>
          <h5 style="margin: 5px 0;margin-bottom: 15px"><b>Reminders</b></h5>
          <?php try {
              $dbh = new PDO(
                  "mysql:host=".App::server.";dbname=".App::database,
                  App::username,
                  App::password
              );
              $sql = $dbh->prepare(
                  "SELECT * FROM todo WHERE login_id=:sessid ORDER BY id ASC"
              );
              $sql->execute(array(':sessid' => $_SESSION['id']));
              $users = $sql->fetchAll();
              if (count($users) !== 0) {
                  foreach ($users as $row) { ?>

          <p style="margin-bottom: 10px;">
            <label>
              <input type="checkbox" oninput="if(confirm('Delete Task?') === true) {this.parentElement.parentElement.parentElement.classList.add('disabled');$('#ajaxLoader').load('https://smartlist.ga/dashboard/user/todo/delete.php?id=<?= $row[
                  "id"
              ] ?>', () => {this.parentElement.parentElement.parentElement.classList.remove('disabled');})}"/>
              <span class="truncate"><b><?=htmlspecialchars(decrypt($row['name']));?></b><?=(!empty($row['descs']) ? '<br>': "")?><?=htmlspecialchars(decrypt($row['descs']));?><?=(!empty($row['qty']) ? '<br>Priority: ': "")?><?=decrypt(htmlspecialchars($row['qty']));?><?=(!empty($row['price']) ? '<br>Date: ': "")?><?=htmlspecialchars(decrypt($row['price']));?></span>
            </label>
          </p>

          <?php }
              } else {
                   ?>
          <center>
            <br><br>
            <div class="container">
              <div class="container">
                <img src="https://i.ibb.co/bbdNjFS/clip-1448.png" width="100%">
              </div>
              <p><b>Great Job! You've finished all of your tasks! <a href="#/add/todo">Add something?</a></b></p>
            </div>
          </center>
          <?php
              }
              $dbh = null;
          } catch (PDOexception $e) {
              echo "Error is: " . $e->getmessage();
          } ?>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <a href="#addNote" class="btn right btn-floating btn-flat waves-effect modal-trigger"><i style="color:var(--font-color)!important" class="material-icons">add</i></a>
          <h5 style='margin-left:0'><b>Recent Notes</b></h5>
          <div class="row">
            <?php try {
                $dbh = new PDO(
                    "mysql:host=".App::server.";dbname=".App::database,
                    App::username,
                    App::password
                );
                $sql = $dbh->prepare(
                    "SELECT * FROM notes WHERE login_id=:sessid ORDER BY id DESC LIMIT 6"
                );
                $sql->execute(array(':sessid' => $_SESSION['id']));
                $users = $sql->fetchAll();
                if (count($users) == 0) { ?>
            <div class="col s12 m6 waves-effect" style="padding: 10px;margin:0!important;border-radius: 9999px;">
              <p><b>No notes yet... Create one?</b></p>
            </div>
        <?php } else {foreach ($users as $row) { ?>
            <div class="col s12 m6 waves-effect"  onclick="viewNote('<?= $row[
                'id'
            ] ?>')" style="border-radius: 9999px;padding: 10px;margin:0!important">
              <p><b><?= decrypt($row['title']) ?></b></p>
              <p><?= substr(
                  strip_tags(decrypt($row['content'])),
                  0,
                  20
              ) ?>...</p>
            </div>
            <?php }}
                $dbh = null;
            } catch (PDOexception $e) {
                echo "Error is: " . $e->etmessage();
            } ?>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <a href="#/settings" class="btn right btn-floating btn-flat waves-effect"><i style="color:var(--font-color)!important" class="material-icons">add</i></a>
          <h5><b>Categories</b></h5>
          <br>
          <a href="javascript:void(0)" class="waves-light chip waves-effect"> Fruits, Veggies, etc. </a>
          <a href="javascript:void(0)" class="waves-light chip waves-effect"> Pots/Pans </a>
          <a href="javascript:void(0)" class="waves-light chip waves-effect"> Cutlery </a>
          <a href="javascript:void(0)" class="waves-light chip waves-effect"> Bottles and Cups </a>
          <a href="javascript:void(0)" class="waves-light chip waves-effect"> Bowls and Plates </a>
          <?php try {
              $dbh = new PDO(
                  "mysql:host=".App::server.";dbname=".App::database,
                  App::username,
                  App::password
              );
              $sql = $dbh->prepare(
                  "SELECT * FROM labels WHERE login=:sessid ORDER BY id DESC"
              );
              $sql->execute(array(':sessid' => $_SESSION['id']));
              $users = $sql->fetchAll();
              foreach ($users as $row) { ?>
          <a class="chip waves-effect waves-light" href="javascript:void(0)"> <?= htmlspecialchars(
              $row['name']
          ) ?> </a>
          <?php }
              $dbh = null;
          } catch (PDOexception $e) {
              echo "Error is: " . $e->etmessage();
          } ?>
        </div>

      </div>
      <!-- end col 1 -->
      <!-- begin col 2 -->
      <div class="col s12" style="padding: 3px !important">
      </div>
      <!-- end col 2 -->
    </div>
    <!-- End row 2 -->


    <!-- End container -->
  </div>
  <script>
    var ctx = document.getElementById("myChart").getContext("2d");
    var budgetMeter = new Chart(ctx, {
      type: "line",
      data: {
        labels: [<?php try {
            $dbh = new PDO(
                "mysql:host=".App::server.";dbname=".App::database,
                App::username,
                App::password
            );
            $sql = $dbh->prepare(
                "SELECT * FROM bm WHERE login_id=:sessid ORDER BY id ASC"
            );
            $sql->execute(array(':sessid' => $_SESSION['id']));
            $users = $sql->fetchAll();
            foreach ($users as $row) {
              if(decrypt($row['price']) !== "Bills") {
                echo "" . json_encode(decrypt($row['name'])) . ", ";
              }
            }
            $dbh = null;
        } catch (PDOexception $e) {
            echo "Error is: " . $e->getmessage();
        } ?>],
        datasets: [
          {
            label: 'Budget',
            data: [<?php try {
                $dbh = new PDO(
                    "mysql:host=".App::server.";dbname=".App::database,
                    App::username,
                    App::password
                );
                $sql = $dbh->prepare(
                    "SELECT * FROM bm WHERE login_id=:sessid ORDER BY id ASC"
                );
                $sql->execute(array(':sessid' => $_SESSION['id']));
                $users = $sql->fetchAll();
                foreach ($users as $row) {
                  if(decrypt($row['price']) !== "Bills") {
                    echo $goal . ", ";
                  }
                }
                $dbh = null;
            } catch (PDOexception $e) {
                echo "Error is: " . $e->getmessage();
            } ?>],
            type: 'line',
            order: 1,
            borderColor: '#f44336',
            borderWidth: 3,
            backgroundColor: 'rgba(245, 71, 83, 0)',
          },
          {
            label: "Money spent",
            data: [<?php try {
                $dbh = new PDO(
                    "mysql:host=".App::server.";dbname=".App::database,
                    App::username,
                    App::password
                );
                $sql = $dbh->prepare(
                    "SELECT * FROM bm WHERE login_id=:sessid ORDER BY id ASC"
                );
                $sql->execute(array(':sessid' => $_SESSION['id']));
                $users = $sql->fetchAll();
                foreach ($users as $row) {
                  if(decrypt($row['price']) !== "Bills") {
                    echo "" . trim(decrypt($row['qty'])) . ", ";
                  }
                }
                $dbh = null;
            } catch (PDOexception $e) {
                echo "Error is: " . $e->getmessage();
            } ?>],
            backgroundColor: (document.documentElement.classList.contains('_darkTheme') ? "rgba(255, 255, 255, .3)" : "<?= $bmBgColor ?>"),
            borderColor: (document.documentElement.classList.contains('_darkTheme') ? "#fff" : "<?= $bmBorderColor ?>"),
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
    $("#addNoteForm").submit(function(e) {
      e.preventDefault();
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data) {
          M.toast({unsafeHTML: `<span>${data}</span><button class="btn-flat toast-action">Undo</button>`});
          $(".modal").modal("close");
          sm_page('gl');
          window.onbeforeunload = null;
          AJAX_LOAD('#gl', './user/notes/index.php');
          change_title('Notes')
        }
      });
    });
    function viewNote(id) {
      $("#noteView").modal({ 
        dismissible: false, 
        onCloseEnd: function() {
          window.onbeforeunload = function() {return "";}
        } 
      })
      $('#noteView').modal('open');
      document.getElementById("noteView").innerHTML = `
<div class="modal-content center">
<center style="padding-top: 100px;">
<svg class='circular' height='50' width='50'>
<circle class='path' cx='25' cy='25' r='20' fill='none' stroke-width='3' stroke-miterlimit='10' />
    </svg>
    </center>
    </div>
`;
      $('#noteView').load('./user/notes/view.php?id='+id);
    }
</script>