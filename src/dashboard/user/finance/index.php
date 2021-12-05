<?php 
session_start();
include('../../cred.php');
$dbh = new PDO("mysql:host=".App::server.";dbname=".App::database, App::username, App::password);
$sql = $dbh->prepare("SELECT * FROM login WHERE id=:sessid");

$sql->execute(array( ':sessid' => $_SESSION['id'] ));
$users = $sql->fetchAll();
foreach ($users as $row) { $purpose=decrypt($row['financePlan']);$goal = $row["goal"]; $welcome = $row['welcome']; $_SESSION['avatar'] = $row['user_avatar']; $theme = $row['theme']; $_SESSION['syncid'] = $row["syncid"]; $_SESSION["number_notify"] = $row['remind']; $_SESSION["welcome"] = $row['welcome']; $_SESSION["studentMode"] = $row['studentMode']; $homePage = $row['defaultpage']; }

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
.header .progress { background: #<?=$userTheme['navScrollColor'];?>; height: 10px; transform-origin: right; border-radius: 1000px; } 
.collection { border: 0; }
.scrollContainer {white-space:nowrap}
.waves-align-center .waves-ripple { top: 50% !important; left: 50% !important; }
.chipSelcted { background: rgba(200, 200, 200, 0.8) !important; }
::-webkit-scrollbar { display: none; }
.waves-ripple { background: rgba(0, 0, 0, 0.2) !important; transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s !important; }
.spacer {display: none}
nav {box-shadow: none !important;}
.fade { position : relative; }
.fade:after { content: ""; position: absolute; z-index: 1; bottom: 0; left: 0; pointer-events: none; background-image: linear-gradient(to bottom, rgba(255,255,255, 0), rgba(255,255,255, 1) 90%); width: 100%; height: 300px; border-bottom-left-radius: 20px;border-bottom-right-radius: 20px}
._darkTheme .fade::after {
   background-image: linear-gradient(to bottom, rgba(0,0,0, 0), var(--bg-color) 90%);
  }
@media only screen and (min-width: 992px) {
  .header .determinate {background: #<?=$userTheme['darkTheme'];?> !important; }
  .header {padding-bottom: 0 !important;color:#000!important;}
  .header *:not(.chip)  {color:#000!important}
  .header.green,.header.red {background: transparent !important}
}
@media only screen and (max-width: 992px) {
    #_root {padding-top: 150px} 
    .header .progress { background: rgba(200, 200, 200, 0.2); height: 10px; transform-origin: right; border-radius: 1000px; } 
    .header { -webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2); color:#fff !important; } 
    .header p {color:#fff!important} .header .determinate { background: #fff !important; } 
    .header {position:fixed;top:70px;left:0;width:100%;z-index:9; background: unset!important; margin-top: 0; }
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
    .header { top: 60px !important }
}
._darkTheme #header * {color:#fff!important}
._darkTheme #header .progress {background:rgba(255,255,255,.1)!important}
._darkTheme .header .progress .determinate {background:#fff!important}
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
        <?=json_encode(decrypt($expense['name']));?>,
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
      paymentType: <?=json_encode(decrypt($expense['paymentType']));?>,
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
fc.dates = [...new Set(fc.dates)];
fc.dates.sort(function(a,b){
  // Turn your strings into dates, and then subtract them
  // to get a value that is either negative, positive, or zero.
  return new Date(b) - new Date(a);
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
  fc.templates.dateChips += `<a data-date="${e}" href="javascript:void(0)" onclick="filterDates(this)" class="chip waves-effect">${e.replace("/" + moment().format("Y"), "")}</a>`;
});
fc.templates.dateChips+= `<a data-date="" onclick="filterDates(this)" class="chip waves-effect" href="javascript:void(0)">View all</a>`

console.log(fc.categories);

fc.templates.leftToday = `
<div class="col s12 m6" style="padding-right:2px!important">
  <div class="card">
  	<div class="card-content">
    	<h5><b>${fc.currency}${
        fc.budget - fc.spentToday >= 0 ? fc.budget - fc.spentToday : 0
      }</b></h5>
      <p>Left today</p>
  	</div>
  </div>
</div>
`;
fc.templates.spentTotal = `
<div class="col s12 m6" style="padding-left:2px!important">
  <div class="card">
  	<div class="card-content">
    	<h5><b>${fc.currency}${intToString(fc.spentTotal)}</b></h5>
      <p>Total expenditures</p>
  	</div>
  </div>
</div>
`;
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
    <a data-target="_financeDropdown${d.id}" class="dropdown-trigger nav_scaleIconOnHover secondary-content btn btn-floating btn-flat transparent waves-align-center waves-effect"><i style="color:var(--font-color)!important" class="material-icons">more_vert</i></a>
  </li>
  <ul id="_financeDropdown${d.id}" class="dropdown-content">
  	<li><a class="waves-effect" onclick="document.getElementById('_financeDropdownTrigger${d.id}').remove();document.getElementById('cardActivity').classList.remove('fade');\$('#ajaxLoader').load('/dashboard/user/finance/deleteExpense.php?id=${d.id}')" href="javascript:void(0)"><i class="material-icons">delete</i>Delete</a></li>
  </ul>
  `;
});
fc.templates.categories = `
<div class="col s12">
  <div class="card">
    <div class="card-content">
      <h5 style="margin-bottom:20px"><b>Breakdown</b></h5>
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
</div>
`
fc.templates.setBudget = `
      <div class="col s12">	
        <div class="card">
          <div class="card-content">
            <div class="section">
              <span class="card-title" style="font-weight: bold !important"><b>Set a budget</b></span>
              <p>Drag the slider below to edit the goal for your budget</p>
              ${fc.plan =='short-term' ? "<b>Your finance plan is set to \"Short Term\". Your budget must be below 100"+fc.currency+"</b>":""}
              <form action="./user/finance/setGoal.php" id="setGoal" method="POST">
                <p class="range-field">
                  <input type="range" id="test5" min="1" max="${(fc.plan == 'short-term' ? '100': '500')}" value="${fc.budget}" name="goal"/>
                </p>
                <button class="btn-round btn blue-grey darken-3 waves-effect waves-light right"><i class="material-icons left">save</i>Save</button>
                <br>
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
                  fc.templates.billList += `<center><img src="https://i.ibb.co/5rYbLQR/fogg-unsubscribed-1.png" style="width: 100%">No upcoming payments!<p class="hoverP">Illustration by <a href="https://icons8.com/illustrations/author/5bf673a26205ee0017636674">Anna Golde</a> from <a href="https://icons8.com/illustrations">Ouch!</a></p></center>`;
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
<div id="header" class="header white-text
${
  fc.spentToday > fc.budget
    ? `red darken-3 white-text`
    : `green darken-3 white-text`
}
  ${fc.plan == "medium-term" && _e.isWeekend(new Date()) ? " borderCard" : ""}
">
	<div class="container">
  <p style="color:rgba(200,200,200,.9)">Today's expenses</p>
  	<h5>${fc.currency}${
      fc.spentToday
    }<span style="font-size: 15px;color:rgba(200,200,200,.9)"> out of ${fc.currency}${
  fc.budget
}</span></h5>
<style>#d__1{animation:slide3 .5s forwards;}@keyframes slide3 {0%{width:0}100%{width: ${
      (fc.spentToday / fc.budget) * 100
    }%}}</style>
    <div class="progress">
    <div class="determinate" style="border-radius: 999px!important" id="d__1"></div>
    </div>
    <p style="color:rgba(200,200,200,.7)" class="d">${fc.plan == "medium-term" && ((new Date().getDay() == 6) || (new Date().getDay()  == 0)) ? "Today's a weekend. Your budget is lenient. Spent wisely!": ""}</p>
    <p style="color:rgba(200,200,200,.7)" class="d">${fc.plan == "long-term" && fc.spentToday>fc.budget ? "Your budget is lenient. Spent wisely!": ""}</p>
    <p style="color:rgba(200,200,200,.7)" class="d red-text lighten-2">${(fc.dates.includes(fc.dateToday) ? "": "You haven't entered today's expenses!")}</p>
<p class="d">
<a href="#/my-finances/payments" class="chip-border chip waves-effect waves-light">Payments</a>
<a href="#/my-finances/set-plan" class="chip-border chip waves-effect waves-light">Finance plan</a>
<a href="#/my-finances/calculators" class="chip-border chip waves-effect waves-light">Calculators</a>
<a href="#bmmodal" class="chip-border modal-trigger chip waves-effect waves-light">Create expense</a>
</p>
</div>
</div>
<br><br>
<div class="container">
  <p><div class="hide-on-large-only"><br><br><br></div><div class="hide-on-med-and-up"><br><br></div>
<div class="scrollContainer center" style="white-space: nowrap;width: 100%;overflow-x:scroll;">${
  fc.templates.dateChips
}</div>
<div class="card fade" id="cardActivity">
<div class="card-content">
	<h5 style="margin-bottom: 20px;"><b>Recent Activity</b></h5>
  <ul class="collection f_d" id="financeActivity">
  	${fc.templates.activity}
  </ul>
  </div>
  </div>
  </p>
  <div class="row no-padding">
  	${fc.templates.leftToday}
  	${fc.templates.spentTotal}
  	${fc.templates.categories}
  	${fc.templates.billList}
    ${fc.templates.setBudget}
  </div>
</div>
`;

$(".dropdown-trigger").dropdown({
  constrainWidth: false,
});
function filterDates(el) {
  $(".chipSelected").removeClass("chipSelected");
  $(".chip").removeClass("red");
  $(".chip").removeClass("white-text");
  setTimeout(function () {
   $(el).addClass("red");
  $(el).addClass("white-text");
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
            <a data-target="_financeDropdown${d.id}" class="dropdown-trigger nav_scaleIconOnHover secondary-content btn btn-floating btn-flat transparent waves-align-center waves-effect"><i style="color:var(--font-color)!important" class="material-icons">more_vert</i></a>
        </li>
        <ul id="_financeDropdown${d.id}" class="dropdown-content">
            <li><a class="waves-effect" onclick="document.getElementById('_financeDropdownTrigger${d.id}').remove();\$('#ajaxLoader').load('/dashboard/user/finance/deleteExpense.php?id=${d.id}')" href="javascript:void(0)"><i class="material-icons">delete</i>Delete</a></li>
        </ul>
        `;
       });
       document.getElementById("cardActivity").innerHTML = `<div class="card-content">
	<h5><b>Recent Activity</b></h5>
  <ul class="collection f_d" id="financeActivity">
  	${fc.templates.activity}
  </ul>
  </div>`;
  $(".dropdown-trigger").dropdown({constrainWidth:false})
  document.getElementById("cardActivity").classList.remove("fade")
      }
    };
    xhttp.open("GET", "./user/finance/card.php?date="+el.getAttribute("data-date"), true);
    xhttp.send();
//   document.getElementById("financeActivity").scrollIntoView();
}
document.querySelector(".scrollContainer").scrollLeft = 99999999999;
if (document.getElementById("header")) {
    if (
      document.documentElement.scrollTop > 120 ||
      document.body.scrollTop > 120
    ) {
      document.getElementById("header").classList.add("concise");
    } else {
      document.getElementById("header").classList.remove("concise");
    }
  }
// Scrolling eventListener
window.addEventListener("scroll", () => {
  if (document.getElementById("header")) {
    if (
      document.documentElement.scrollTop > 120 ||
      document.body.scrollTop > 120
    ) {
      document.getElementById("header").classList.add("concise");
    } else {
      document.getElementById("header").classList.remove("concise");
    }
  }
});

var elems  = document.querySelectorAll("input[type=range]");
M.Range.init(elems)


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
      window.scrollTo(0,0)
    }
  });
});
</script>