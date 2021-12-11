<?php 
ini_set("display_errors", 1);
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
$sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();
foreach ($users as $row) { $_SESSION['income']=(empty($row['income']) ? "" : decrypt($row['income'])); $purpose=decrypt($row['financePlan']);$goal = $row["goal"]; $welcome = $row['welcome']; $_SESSION['avatar'] = $row['user_avatar']; $theme = $row['theme']; $_SESSION['syncid'] = $row["syncid"]; $_SESSION["number_notify"] = $row['remind']; $_SESSION["welcome"] = $row['welcome']; $_SESSION["studentMode"] = $row['studentMode']; $homePage = $row['defaultpage']; }

try {
  $dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
  $sql = $dbh->prepare("SELECT * FROM bm WHERE login_id=:sessid");

  $sql->execute(array( ':sessid' => $_SESSION['id'] ));
  $res = $sql->fetchAll();
  $a = 0;
  $b = 0;
  $c = 0;
  $d = 0;
  $e = 0;
  $f = 0;
  $g = 0;
  $h = 0;
  $totalPrice = 0;
  foreach ($res as $expense) {
    switch (decrypt($expense['price'])) {
      case "Grocery Shopping": $a+=intval(decrypt($expense['qty'])); break;
      case "Clothes Shopping": $b+=intval(decrypt($expense['qty'])); break;
      case "Bills": $c+=intval(decrypt($expense['qty'])); break;
      case "Education": $d+=intval(decrypt($expense['qty'])); break;
      case "Entertainment": $e+=intval(decrypt($expense['qty'])); break;
      case "Home Improvement": $f+=intval(decrypt($expense['qty'])); break;
      case "Other": $g+=intval(decrypt($expense['qty'])); break;
      case "Holidays": $h+=intval(decrypt($expense['qty'])); break;
    }
    if(decrypt($expense['price']) !== "Bills") {
      $totalPrice+=intval(decrypt($expense['qty'])); 
    }
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
include "../../colorSwitch.php";

?>
<style>
.borderCard { background-color: transparent !important; color: var(--font-color) !important; }
.borderCard.red { box-shadow: inset 0px 0px 0px 2px #c62828 !important; border-color: #c62828 !important; background: transparent !important; color: #c62828 !important; }
.borderCard.green { background: transparent !important; box-shadow: inset 0px 0px 0px 2px #2e7d32 !important; border-color: #2e7d32 !important; color: #2e7d32 !important; }
.borderCard.orange { background: transparent !important; box-shadow: inset 0px 0px 0px 2px #ef6c00 !important; border-color: #ef6c00 !important; color: #ef6c00 !important; }
.header { max-height: 100vh; padding: 30px 0; transition: all .2s; }
.header .progress { background: rgba(0, 0, 0, .1); height: 10px; transform-origin: right; border-radius: 1000px; } 
.collection { border: 0; }
.scrollContainer {white-space:nowrap}
.waves-align-center .waves-ripple { top: 50% !important; left: 50% !important; }
.chipSelcted { background: rgba(200, 200, 200, 0.8) !important; }
::-webkit-scrollbar { display: none; }
.spacer {display: none}
nav {box-shadow: none !important;}
.fade { position : relative; }
.fade:after { content: ""; position: absolute; z-index: 1; bottom: 0; left: 0; pointer-events: none; background-image: linear-gradient(to bottom, rgba(255,255,255, 0), rgba(255,255,255, 1) 90%); width: 100%; height: 300px; border-bottom-left-radius: 20px;border-bottom-right-radius: 20px}
._darkTheme .fade::after {
   background-image: linear-gradient(to bottom, rgba(0,0,0, 0), var(--bg-color) 90%);
  }
@media only screen and (max-width: 992px) {
    #_root {padding-top: 150px} 
    .header .progress { background: rgba(200, 200, 200, 0.2); height: 10px; transform-origin: right; border-radius: 1000px; } 
    .header {color:#fff !important; } 
    .header p {color:#fff!important}
    .header {position:absolute;top:70px;left:0;width:100%;z-index:9; background: unset!important; margin-top: 0; }
    .header .chip {color:#fff!important;}
    .spacer {display: block} .header.concise { padding: 5px 0 !important; max-height: 50px; }
    .header.concise p { opacity: 0; margin-top: -25px; } 
    .header.concise .chip {display: none}
    .header.concise h5 { font-size: 15px; } 
    .header.concise h5 span { font-size: 12px!important; color: rgba(255,255,255,.8) !important; letter-spacing: .3px; margin-left: 1px; } 
    .header.concise h5 span::after { content: " today"; animation: slide-left .2s; }
    @keyframes slide-left { 0% {opacity:0;margin-left: -10px} }
    .header.concise .progress { float: right; transform: scaleX(.2) scaleY(1.1); height: 5px !important; border-radius: 9999px!important; overflow:hidden; margin-top: -20px; } 
    .progress .determinate {border-radius: 999px!important}
    .header * { transition: all .2s; } 
    .no-padding .col {padding: 0!important} 
}
@media only screen and (max-width: 600px) {
    .header { top: 63px !important }
}
.cards {
  left:300px;
  padding-right: 5px;
  top: 260px;
  width: calc(100vw - 350px);
}
.material-sidenav\:rail .cards {
  left:90px;
  padding-right: 5px;
  top: 260px;
  width: calc(100vw - 90px);
}
@media only screen and (max-width: 992px) {
  .cards {
    top: 170px;
    width: 100%;
    left:0
  }
}
.rounded-lg {border-radius: 15px;}
.cards .card-panel {--tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)!important;}
._darkTheme #header * {color:#fff!important}
._darkTheme #header .progress {background:rgba(255,255,255,.1)!important}
.header .progress .determinate {background:#fff!important}
.cards {overflow-y:visible;}
.cards .waves-ripple {transition: transform .6s, opacity .2s !important}
.cards .card-panel:hover {
--tw-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow) !important;
}
.cards .card:focus-visible {box-shadow: 0px 0px 0px 5px #1e88e5 !important;}
</style>
<div id="_root"></div>
<script>
function ordinal_suffix_of(i) {
    var j = i % 10,
        k = i % 100;
    if (j == 1 && k != 11) {
        return i + "st";
    }
    if (j == 2 && k != 12) {
        return i + "nd";
    }
    if (j == 3 && k != 13) {
        return i + "rd";
    }
    return i + "th";
}
function intToString(value) {
  var suffixes = ["", "k", "m", "b", "t"];
  var suffixNum = Math.floor(("" + value).length / 3);
  var shortValue = parseFloat(
    (suffixNum != 0 ? value / Math.pow(1000, suffixNum) : value).toPrecision(2)
  );
  if (shortValue % 1 != 0) {
    shortValue = shortValue.toFixed(1);
  }
  return shortValue + suffixes[suffixNum];
}
function orderDates(arr,diffdate) {
  return (
    arr.sort(function(a, b) {
      var distancea = Math.abs(diffdate - a);
      var distanceb = Math.abs(diffdate - b);
      return distancea - distanceb; // sort a before b when the distance is smaller
    })
  );
}
var fc = {
  budget: <?=$goal;?>,
  currency: "<?=$_SESSION['currency'];?>",
  income: "<?=$_SESSION['income'];?>",
  dateToday: moment().format("M/D/Y"),
  plan: <?=json_encode($purpose);?>,
  categories: {
    grocery: <?=$a?>,
    clothes: <?=$b?>,
    bills: <?=$c?>,
    holidays: <?=$d?>,
    education: <?=$e?>,
    entertainment: <?=$f?>,
    improvement: <?=$g?>,
    other: <?=$h?>

  },
  spentToday: 0,
  spentTotal: <?=$totalPrice;?>,
  activity: [
    <?php
    try {
      $dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
      $sql = $dbh->prepare("SELECT * FROM bm WHERE login_id=:sessid ORDER BY id DESC LIMIT 5");

      $sql->execute(array( ':sessid' => $_SESSION['id'] ));
      $res = $sql->fetchAll();
      foreach ($res as $expense) {
        ?>
          { id: <?=$expense['id'];?>, date: <?=json_encode(decrypt($expense['name']));?>, amount: <?=(decrypt($expense['qty']));?>, spentOn: <?=json_encode(decrypt($expense['price']));?> },
        <?php
      }
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    ?>
  ],
  templates: {},
  dates: [
      <?php
    try {
      $dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
      $sql = $dbh->prepare("SELECT * FROM bm WHERE login_id=:sessid ORDER BY id DESC");

      $sql->execute(array( ':sessid' => $_SESSION['id'] ));
      $res = $sql->fetchAll();
      foreach ($res as $expense) {
        ?>
        {"date": <?=json_encode(decrypt($expense['name']));?>, "amount": <?=json_encode(decrypt($expense['qty']));?>},
        <?php
      }
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    ?>
  ],
  bills: [
   <?php
    try {
      $dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
      $sql = $dbh->prepare("SELECT * FROM payment_subs WHERE login_id=:sessid");

      $sql->execute(array( ':sessid' => $_SESSION['id'] ));
      $res = $sql->fetchAll();
      foreach ($res as $expense) {
        ?>
    {
      name: <?=json_encode(decrypt($expense['name']));?>,
      price: <?=json_encode(decrypt($expense['price']));?>,
      date: new Date(`<?=json_encode(decrypt($expense['date']));?>`),
      type: <?=json_encode(decrypt($expense['type']));?>,
      paymentType: <?=json_encode(($expense['paymentType']));?>,
    },
            <?php
      }
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    ?>
    
  ],
};
console.log(fc.dateToday);

function getDaysInMonth(month, year) {
  var date = new Date(year, month, 1);
  var days = [];
  while (date.getMonth() === month) {
    days.push(`${new Date(date).getMonth()+1}/${new Date(date).getDay()}/${new Date(date).getFullYear()}`);
    date.setDate(date.getDate() + 1);
  }
  return days;
}

fc.totalMonth=0;
fc.dates.forEach(date => {
  if(getDaysInMonth(new Date().getMonth(), new Date().getFullYear()).includes(date.date)) {
    fc.totalMonth += parseInt(date.amount);
  }
})
fc.templates.monthExpenses=`
<div class="col s6">
<div class="card ${(fc.totalMonth > fc.income ? "red white-text darken-4":"")}">
<div class="card-content">
<h5><b>${fc.currency}${fc.totalMonth}</b></h5>
<p style="margin-bottom:10px;">This month</p>
</div>
</div>
</div>
<div class="col s6">
<div class="card">
<div class="card-content">
<h5><b>${fc.currency}${(fc.income-fc.totalMonth >=0 ? fc.income-fc.totalMonth : 0)}</b></h5>
<p style="margin-bottom:10px;">Saved this month</p>
</div>
</div>
</div>

<div class="col s6">
  <div class="card">
  	<div class="card-content">
    	<h5><b>${fc.currency}${
        fc.budget - fc.spentToday >= 0 ? fc.budget - fc.spentToday : 0
      }</b></h5>
      <p style="margin-bottom:10px;">Left today</p>
  	</div>
  </div>
</div>
<div class="col s6">
  <div class="card">
  	<div class="card-content">
    	<h5><b>${fc.currency}${intToString(fc.spentTotal)}</b></h5>
      <p style="margin-bottom:10px;">Total expenditures</p>
  	</div>
  </div>
</div>
`;


fc.dates = [...new Map(fc.dates.map(v => [v.date, v])).values()]
fc.dates.sort(function(a,b){
  // Turn your strings into dates, and then subtract them
  // to get a value that is either negative, positive, or zero.
  return new Date(b.date) - new Date(a.date);
});
fc.activity.forEach(e=> {
  if(e.date == moment().format("M/D/Y")) {
    if(e.spentOn !== "Bills") {
      fc.spentToday += e.amount;
    }
  }
})
fc.dates = fc.dates.reverse()
fc.templates.dateChips = "<br>";
fc.dates.forEach((e) => {
  fc.templates.dateChips += `<a data-date="${e.date}" href="javascript:void(0)" onclick="filterDates(this)" class="transparent chip-border chip waves-effect">${e.date.replace("/" + moment().format("Y"), "")}</a>`;
});
fc.templates.dateChips+= `<a data-date="" onclick="filterDates(this)" class="chip waves-effect chip-border transparent" href="javascript:void(0)">View all</a>`

console.log(fc.categories);

fc.templates.activity = "";
fc.activity.forEach((d) => {
  var $__icon__, $color;
  switch (d.spentOn) {
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
  fc.templates.activity += `
  <li class="collection-item avatar" id="_financeDropdownTrigger${d.id}" data-date="${d.date}">
  	<i class="material-icons circle ${$color} darken-3">${$__icon__}</i>
  	<b>${d.date}</b><br>
    ${d.spentOn}<br>
    ${fc.currency}${d.amount}
    ${(parseInt(d.amount) > parseInt(fc.income) ?'<br><span class="red-text">Expense exceeds monthly income!</span>':'')}
    <a data-target="_financeDropdown${d.id}" class="dropdown-trigger nav_scaleIconOnHover secondary-content btn btn-floating btn-flat transparent waves-align-center waves-effect"><i style="color:var(--font-color)!important" class="material-icons">more_vert</i></a>
  </li>
  <ul id="_financeDropdown${d.id}" class="dropdown-content">
  	<li><a class="waves-effect" onclick="document.getElementById('_financeDropdownTrigger${d.id}').remove();document.getElementById('cardActivity').classList.remove('fade');loadURL('/dashboard/user/finance/deleteExpense.php?id=${d.id}')" href="javascript:void(0)"><i class="material-icons">delete</i>Delete</a></li>
  </ul>
  `;
});
fc.templates.categories = `
<div class="card">
  <div class="card-content">
    <h5 style="margin-bottom:20px"><b>Expenses by category</b></h5>
    <p><b>Grocery Shopping</b> - ${fc.currency}${fc.categories.grocery}</p>
    <p><b>Clothes Shopping</b> - ${fc.currency}${fc.categories.clothes}</p>
    <p><b>Bills</b> - ${fc.currency}${fc.categories.bills}</p>
    <p><b>Education</b> - ${fc.currency}${fc.categories.education}</p>
    <p><b>Entertainment</b> - ${fc.currency}${fc.categories.entertainment}</p>
    <p><b>Home Improvement</b> - ${fc.currency}${fc.categories.improvement}</p>
    <p><b>Holidays</b> - ${fc.currency}${fc.categories.holidays}</p>
    <p><b>Other</b> - ${fc.currency}${fc.categories.other}</p>
  </div>
</div>
`
fc.templates.setBudget = `
      <div class="col s12 m5">	
        <div class="card">
          <div class="card-content">
            <div class="section">
              <span class="card-title" style="font-weight: bold !important"><b>Set a budget</b></span>
              ${fc.plan =='short-term' ? "<p>Your finance plan is set to \"Short Term\". Your budget must be below 100"+fc.currency+"</p>":""}
              ${fc.budget > fc.income ? "<p class=\"red-text\">Your budget is more than your income!</p>":""}
              <p>Money ${(fc.budget > fc.income ? "lost":"earned")} after budget: ${fc.currency}${(fc.income-fc.budget).toString().replace("-", "")}</p>
              <form action="./user/finance/setGoal.php" id="setGoal" method="POST">
                <p class="range-field">
                  <input type="range" id="test5" min="1" max="${(fc.plan == 'short-term' ? '100': fc.income*1.1)}" value="${fc.budget}" name="goal"/>
                </p>
                <button class="btn-round btn blue-grey darken-3 waves-effect waves-light right"><i class="material-icons left">save</i>Save</button>
                <br>
              </form>
            </div>
          </div>
        </div>
      </div>
`

fc.templates.setIncome = `
      <div class="col s12 m7">	
        <div class="card">
          <div class="card-content">
            <div class="section">
              <span class="card-title" style="font-weight: bold !important"><b>My monthly income</b></span>
              <p><b>This information is private, encrypted and NOT synced!</b> For security reasons, you should always round your number to the nearest place depending on how much you earn.</p>
              <form action="./user/finance/setIncome.php" id="setIncome" method="POST">
                <div class="input-field">
                  <input type="number" value="${fc.income}" name="income" required>
                  <label>Monthly income</label>
                </div>
                <button class="btn-round btn blue-grey darken-3 waves-effect waves-light right"><i class="material-icons left">save</i>Save</button><br>
              </form>
            </div>
          </div>
        </div>
      </div>
`

fc.templates.billList = `
      <div class="col s12">	
        <div class="card" style="overflow:hidden;">
        <div class="waves-effect" style="width:100%;padding: 25px;padding-bottom:0!important;padding-left: 30px!important;padding-right:20px!important" onclick="window.location.hash='#/my-finances/payments'"><i class="material-icons right" style="line-height: 40px;">chevron_right</i><h5 style="margin-top: 3px"><b>Upcoming payments</b></h5></div>
          <div class="card-content" style="padding-top: 0!important;margin-top:-10px;">
            <div class="section">
              <div class="row" style="margin: 3px!important;margin-bottom:0!important;">
              `;
              var upc = orderDates(fc.bills.map(a => a.date), new Date()).filter(function(d) { return d - new Date() > 0; });
              if(upc.length === 0) {
                  fc.templates.billList += `<center><img src="https://i.ibb.co/5rYbLQR/fogg-unsubscribed-1.png" style="width: 100%;max-width: 400px;display:block;">No upcoming payments!<p class="hoverP">Illustration by <a href="https://icons8.com/illustrations/author/5bf673a26205ee0017636674">Anna Golde</a> from <a href="https://icons8.com/illustrations">Ouch!</a></p></center>`;
              }
            upc.forEach(e => {
            fc.templates.billList += `
            <div class="col s12 m3" style="border-radius: 9999px;padding:10px!important;">
                <b>${fc.currency}${(fc.bills.filter(obj => { return obj.date === e }))[0].name}</b><br>
                ${["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ][e.getMonth()]} ${ordinal_suffix_of(e.getDate())}
            </div>
            `;
            })
              fc.templates.billList += `
            </div>
            </div>
          </div>
        </div>
      </div>
`

document.getElementById("_root").innerHTML = `
<div id="header" class="header white-text ${fc.spentToday > fc.budget ? `red darken-3 white-text`:`green darken-3 white-text`} ${fc.plan == "medium-term" && _e.isWeekend(new Date()) ? " borderCard" : ""}">
	<div class="container" style="padding-top: 20px">
    <p style="color:rgba(200,200,200,.9)">Today's expenses</p>
  	  <h5>
        ${fc.currency}${fc.spentToday}
        <span style="font-size: 15px;color:rgba(200,200,200,.9)"> out of ${fc.currency}${fc.budget}</span>
      </h5>
      <style>#d__1{animation:slide3 .5s forwards;}@keyframes slide3 {0%{width:0}100%{width: ${(fc.spentToday / fc.budget) * 100}%}}</style>
      <div class="progress">
        <div class="determinate" style="border-radius: 999px!important" id="d__1"></div>
      </div>
      <br><br>
      <br>
      <div class="d cards" style="position:absolute;white-space:nowrap;overflow-x:scroll!important;padding-left: 3px;"><div class="container">
        <a style="background:var(--bg-color);color:var(--font-color)!important;max-width: 250px;margin-right: 5px;transition:none!important" class="card-panel waves-effect rounded-lg sidenav-trigger" href="javascript:void(0)" data-target="insights"><h6><b>Insights</b></h6><p class="truncate black-text" style="color:var(--font-color)!important;">My financial insights</p></a>
        <a style="background:var(--bg-color);color:var(--font-color)!important;max-width: 250px;margin-right: 5px;transition:none!important" class="card-panel waves-effect rounded-lg" href="#/my-finances/payments"><h6><b>Payments</b></h6><p class="truncate black-text" style="color:var(--font-color)!important;">Manage your bills and subscriptions</p></a>
        <a style="background:var(--bg-color);color:var(--font-color)!important;max-width:250px;margin-right: 5px;transition:none!important" class="card-panel waves-effect rounded-lg" href="#/my-finances/set-plan"><h6><b>Finance plan</b></h6><p class="truncate black-text" style="color:var(--font-color)!important;">Set your finance plan and work on it</p></a>
        <a style="background:var(--bg-color);color:var(--font-color)!important;max-width:250px;margin-right: 5px;transition:none!important" class="card-panel waves-effect rounded-lg" href="#/my-finances/calculators"><h6><b>Calculators</b></h6><p class="truncate black-text" style="color:var(--font-color)!important;">Calculate tax, discount, future value, and more</p></a>
        <a style="background:var(--bg-color);color:var(--font-color)!important;max-width:250px;margin-right: 5px;transition:none!important" class="card-panel waves-effect rounded-lg modal-trigger" href="#bmmodal"><h6><b>Create expense</b></h6><p class="truncate black-text" style="color:var(--font-color)!important;">Log a new expense</p></a>
      </div>
    </div>
  </div>
</div>
<div class="material-sidenav:right w-full" id="insights" style="background:var(--bg-color)!important;">
  <nav class="blue-grey lighten-5 position:fixed" style="position:fixed!important;top:0;left:0;padding: 10px 0 !important;height:auto!important;">
    <ul>
      <li><a href="javascript:void(0)" class="nav_scaleIconOnHover btn btn-floating waves-effect btn-flat sidenav-close"><i class="material-icons black-text" style="line-height:40px!important;">arrow_back</i></a></li>
    </ul>
  </nav><br><br>
  <div class="container">
    <center style="padding: 30vh 0;">
      <h1>Insights</h1>
      <p style="color:rgba(200,200,200,.7)" class="d">${fc.plan == "medium-term" && ((new Date().getDay() == 6) || (new Date().getDay()  == 0)) ? "Today's a weekend. Your budget is lenient. Spent wisely!": ""}</p>
      <p style="color:rgba(200,200,200,.7)" class="d">${fc.plan == "long-term" && fc.spentToday>fc.budget ? "Your budget is lenient. Spent wisely!": ""}</p>
      <p style="color:rgba(200,200,200,.7);margin-bottom:10px" class="d red-text lighten-2">${(fc.dates.filter(e => e.date == fc.dateToday).length > 0 ? "": "You haven't entered today's expenses!")}</p>
    </center>
    <div class="row">
      <div class="col s12 m6">
        <div class="card">
          <div class="card-content">
            <div id="expenseCategoryChart"></div>
          </div>
        </div>
      </div>
      <div class="col s12 m6">
        ${fc.templates.categories}
      </div>
      ${fc.templates.monthExpenses}
    </div>
  </div>
</div>
<br><br>
<div class="container">
  <br><br><br><br><br>
  <div class="hide-on-large-only show-on-medium"><br><br></div>
  <div class="scrollContainer center" style="white-space: nowrap;width: 100%;overflow-x:scroll;">${fc.templates.dateChips}</div>
  <div class="row">
    <div class="col s12">
      <div class="card fade" id="cardActivity">
        <div class="card-content">
          <h5 style="margin-bottom: 20px;"><b>Recent Activity</b></h5>
          <ul class="collection f_d" id="financeActivity">
  	        ${fc.templates.activity}
          </ul>
        </div>
      </div>
    </div>
  </div>
  </p>
  <div class="row no-padding">
  	${fc.templates.billList}
    ${fc.templates.setBudget}
    ${fc.templates.setIncome}
  </div>
</div>
`;
document.getElementById("insights").style.opacity='';
document.getElementById("insights").style.pointerEvents='';

M.Dropdown.init(document.querySelectorAll(".dropdown-trigger"), {
  constrainWidth: false
})

var options = {
  toolbar: {
    enabled: false,
    show: false
  },
  tooltip: {
    theme: 'dark'
  },
  series: [{
  name: "Money",
  data: [fc.categories.grocery, fc.categories.clothes, fc.categories.bills, fc.categories.education, fc.categories.entertainment, fc.categories.improvement, fc.categories.holidays, fc.categories.other]
}],
  chart: {
  height: 220,
  type: 'bar',
  toolbar: {
    enabled: false,
    show: false
  },
  events: {
    click: function(chart, w, e) {
      // console.log(chart, w, e)
    }
  }
},
plotOptions: {
  bar: {
    columnWidth: '90%',
    distributed: true,
  }
},
dataLabels: {
  enabled: false
},
legend: {
  show: false
},
yaxis: {
   labels: {
          show: false,
          enabled: false,
   }
},
xaxis: {
  axisTicks: {
    show: false,
  },
  categories: [
    'Groceries',
    'Clothes',
    'Bills',
    'Education',
    'Entertainment',
    'Home Improvement',
    'Holidays',
    'Other',
  ],
  labels: {
    enabled: false,
    show: false,
    style: {
      fontSize: '12px'
    }
  }
}
};

var chart = new ApexCharts(document.querySelector("#expenseCategoryChart"), options);
chart.render();


function filterDates(el) {
  document.querySelector("chipSelected")&&document.querySelectorAll(".chipSelected").forEach(e=>e.classList.remove("chipSelected"));
  document.querySelector("chip")&&document.querySelectorAll(".chip").forEach(e=>e.classList.remove("red"));
  document.querySelector(".chip.black-text")&&document.querySelectorAll(".chip.black-text").forEach(e=>e.classList.remove("black-text"));
  setTimeout(function () {
   el.classList.add("red");
   el.classList.add("black-text");
  }, 200);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        fc.activity = JSON.parse(this.responseText.replace("},]", "}]"));
        fc.templates.activity = "";
        fc.activity.forEach((d) => {
        var $__icon__, $color; switch (d.spentOn) { case "Grocery Shopping": $__icon__ = "local_grocery_store"; $color = "red"; break; case "Clothes Shopping": $__icon__ = "checkroom"; $color = "green"; break; case "Entertainment": $__icon__ = "sports_esports"; $color = "purple"; break; case "Bills": $__icon__ = "receipt"; $color = "blue"; break; case "Home Improvement": $__icon__ = "home"; $color = "orange"; break; case "Education": $__icon__ = "school"; $color = "blue-grey"; break; case "Holidays": $__icon__ = "celebration"; $color = "yellow darken-3"; break; case "Other": $__icon__ = "more_vert"; $color = "pink"; break; }
        fc.templates.activity += `
        <li class="collection-item avatar" id="_financeDropdownTrigger${d.id}" data-date="${d.date}">
            <i class="material-icons circle ${$color} darken-3">${$__icon__}</i>
            <b>${d.date}</b><br>
            ${d.spentOn}<br>
            ${fc.currency}${d.amount}
            ${(parseInt(d.amount) > parseInt(fc.income) ?'<br><span class="red-text">Expense exceeds monthly income!</span>':'')}
            <a data-target="_financeDropdown${d.id}" class="dropdown-trigger nav_scaleIconOnHover secondary-content btn btn-floating btn-flat transparent waves-align-center waves-effect"><i style="color:var(--font-color)!important" class="material-icons">more_vert</i></a>
        </li>
        <ul id="_financeDropdown${d.id}" class="dropdown-content">
            <li><a class="waves-effect" onclick="document.getElementById('_financeDropdownTrigger${d.id}').remove();loadURL('/dashboard/user/finance/deleteExpense.php?id=${d.id}')" href="javascript:void(0)"><i class="material-icons">delete</i>Delete</a></li>
        </ul>
        `;
       });
       document.getElementById("cardActivity").innerHTML = `<div class="card-content">
	<h5><b>Recent Activity</b></h5>
  <ul class="collection f_d" id="financeActivity">
  	${fc.templates.activity}
  </ul>
  </div>`;
  M.Dropdown.init(document.querySelectorAll(".dropdown-trigger"), {
    constrainWidth: false
  })
  document.getElementById("cardActivity").classList.remove("fade")
      }
    };
    xhttp.open("GET", "./user/finance/card.php?date="+el.getAttribute("data-date"), true);
    xhttp.send();
//   document.getElementById("financeActivity").scrollIntoView();
}
document.querySelector(".scrollContainer").scrollLeft = 99999999999;

var elems  = document.querySelectorAll("input[type=range]");
M.Range.init(elems)


document.getElementById("setGoal").addEventListener("submit", (event) =>
  sendData(event)
    .then((res) => {
      M.toast({html: "Successfully updated goal"});
      getHashPage("hide");
      window.scrollTo(0,0)
    })
);

document.getElementById("setIncome").addEventListener("submit", (event) =>
  sendData(event)
    .then((res) => {
      M.toast({html: "Successfully updated income"});
      getHashPage("hide");
      window.scrollTo(0,0)
    })
);

setTimeout(function() {
  M.Sidenav.init(document.querySelectorAll("#insights"), {
    edge:"right",
    onOpenStart() {document.documentElement.classList.add('overflow:hidden');document.querySelector("meta[name='theme-color']").setAttribute("content", (document.documentElement.classList.contains('_darkTheme') ? "#303030":"#eceff1"));},
    onCloseStart() {document.documentElement.classList.remove('overflow:hidden');document.querySelector("meta[name='theme-color']").setAttribute("content", (document.documentElement.classList.contains('_darkTheme') ? "#212121":"#fff"));}
  })
}, 100)
window.scrollTo(0,0);
</script>