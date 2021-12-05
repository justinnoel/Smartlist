<?php
session_start();
include "../cred.php";
function isEven($number){
    if($number % 2 == 0){
        return true; 
    }
    else{
        echo false;
    }
}
$dbh = new PDO(
    "mysql:host=".App::server.";dbname=".App::database,
    App::username,
    App::password
);
$_DATA = new stdClass();
try {
    $sql = $dbh->prepare( "SELECT * FROM grocerylist WHERE login_id=:sessid ORDER BY id DESC" );
    $sql->execute(array(':sessid' => $_SESSION['id']));
    $users = $sql->fetchAll();
    $_DATA->shoppingList = [];
    foreach ($users as $row) {
        $item = new stdClass();
        $item->id = ($row['id']);
        $item->name = decrypt($row['name']);
        $_DATA->shoppingList[] = $item;
    }
} catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}

try {
    $sql = $dbh->prepare( "SELECT * FROM todo WHERE login_id=:sessid ORDER BY id DESC" );
    $sql->execute(array(':sessid' => $_SESSION['id']));
    $users = $sql->fetchAll();
    $_DATA->reminders = [];
    foreach ($users as $row) {
        $item = new stdClass();
        $item->id = ($row['id']);
        $item->name = decrypt($row['name']);
        $item->qty = decrypt($row['qty']);
        $item->price = decrypt($row['price']);
        $item->description = decrypt($row['descs']);
        $_DATA->reminders[] = $item;
    }
} catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}
try {
    $sql = $dbh->prepare( "SELECT * FROM bm WHERE login_id=:sessid ORDER BY id ASC" );
    $sql->execute(array(':sessid' => $_SESSION['id']));
    $users = $sql->fetchAll();
    $_DATA->budgetMeter = [];
    $_DATA->budgetMeterDates = [];
    $bmCount = count($users);
    foreach ($users as $row) {
        $_DATA->budgetMeter[] = decrypt($row['qty']);
        $_DATA->budgetMeterDates[] = decrypt($row['name']);
    }
} catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}

try {
    $sql = $dbh->prepare( "SELECT * FROM listNames WHERE login=:sessid ORDER BY id DESC" );
    $sql->execute(array(':sessid' => $_SESSION['id']));
    $users = $sql->fetchAll();
    $_DATA->listNames = [];
    foreach ($users as $row) {
        $item = new stdClass();
        $item->id = ($row['id']);
        $item->name = ($row['name']);
        $item->star = ($row['star']);
        $_DATA->listNames[] = $item;
    }
} catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}

try {
    $sql = $dbh->prepare( "SELECT * FROM listItems WHERE login=:sessid ORDER BY id DESC" );
    $sql->execute(array(':sessid' => $_SESSION['id']));
    $users = $sql->fetchAll();
    $_DATA->listItems = [];
    foreach ($users as $row) {
        $item = new stdClass();
        $item->id = ($row['id']);
        $item->name = decrypt($row['name']);
        $item->desc = decrypt($row['description']);
        $item->listId = ($row['listId']);
        $_DATA->listItems[] = $item;
    }
} catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
}

try {
    $dbh = new PDO(
        "mysql:host=".App::server.";dbname=".App::database,
        App::username,
        App::password
    );
    $sql = $dbh->prepare(
        "SELECT * FROM bm WHERE login_id=:sessid ORDER BY id ASC LIMIT 1"
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
?>

<style>
  #budgetMeter * {color:rgba(150,150,150,.9)!important;}
  .material-sidenav\:list {box-shadow: none!important;border-top-left-radius: 15px!important;border-bottom-left-radius: 15px!important;border: 10px solid transparent!important;}
  @media only screen and (max-width: 992px) {
  .modal#addItem1 {
    positon: fixed;
    top: 0 !important;
    left: 0 !important;
    width: 100vw!important;
    height:100vh!important;
    max-height: 100vh !important;
    transform: none !important;
    animation: scaleOutIn .2s forwards;
    border-radius: 0!important
  }
  .material-sidenav\:list {
    width: 90vw!important
  }
  }
  .apexcharts-yaxis-annotation-label {
    margin-left: -10px!important;
    border-radius: 9999px!important;
    z-index:9999!important;
  }
  .apexcharts-yaxis-annotation-label *{
    margin-left: -10px!important;
    border-radius: 9999px!important;
    z-index:9999!important;
  }
  .apexcharts-xaxis-annotation-label {
    margin-left: -10px!important;
    border-radius: 9999px!important;
    z-index:9999!important;
  }
</style>
<div class="material-sidenav:list sidenav" id="sidenav__shoppingList" style="padding: 20px!important;">
  <h5>Shopping list</h5>
  <?php foreach ($_DATA->shoppingList as $item) {?>
  <p style="line-height: 30px">
    <label>
      <input type="checkbox" oninput="if(confirm('Delete?')===true){this.disabled=true;$('#ajaxLoader').load('./user/grocerylist/delete.php?id=<?=$item->id;?>',function(){ setTimeout(function() {getHashPage('hide')}, 200) })}else{this.checked=false}"/>
      <span><?=$item->name;?></span>
    </label>
  </p>
  <?php } ?>
</div>
<div class="material-sidenav:list sidenav" id="sidenav__todoList" style="padding: 20px!important;">
  <h5>Reminders</h5>
  <?php foreach ($_DATA->reminders as $item) {?>
  <p style="line-height: 30px">
    <label>
      <input type="checkbox" oninput="if(confirm('Delete?')===true){this.disabled=true;$('#ajaxLoader').load('./user/grocerylist/delete.php?id=<?=$item->id;?>',function(){ setTimeout(function() {getHashPage('hide')}, 200) })}else{this.checked=false}"/>
      <span><?=$item->name;?></span>
    </label>
  </p>
  <?php } ?>
</div>
<?php foreach ($_DATA->listNames as $list) {?>
  <div class="material-sidenav:list sidenav" id="sidenav__<?=$list->id;?>" style="padding: 20px!important;">
  <button onclick="$('#addItem1').modal('open');document.getElementById('addItemId').value=<?=$list->id;?>" class="btn btn-floating btn-flat right z-depth-0 waves-effect darken-4" style="background: rgba(200,200,200,.2)!important;"><i class="material-icons black-text">add</i></button>
  <button onclick="if(confirm('Delete') === true) $('#ajaxLoader').load('./user/lists/deleteList.php?id=<?=$list->id;?>', function() {getHashPage();})" class="sidenav-close btn btn-floating btn-flat right z-depth-0 waves-effect darken-4" style="background: rgba(200,200,200,.2)!important;margin-right: 5px!important"><i class="material-icons black-text">delete</i></button>
  <h5 style="margin-top: 10px;margin-bottom: 25px;"><?=$list->name?></h5>
  <?php foreach (array_slice($_DATA->listItems, 0, 10, true) as $item1) { if($item1->listId == $list->id) {?>
          <p style="line-height: 30px">
          <label>
            <input type="checkbox" oninput="if(confirm('Delete?')===true){this.disabled=true;$('#ajaxLoader').load('./user/items/deleteItem.php?id=<?=$item1->id;?>',function(){ setTimeout(function() {getHashPage('hide')}, 200) })}else{this.checked=false}"/>
            <span><?=$item1->name;?></span>
          </label>
        </p>
        <?php } }?>
</div>
  <?php
  } ?>
<div style="padding: 10px;">
  <div class="row">
    <div class="col s12">
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
          <h5 style="margin-top: 7px!important;margin-bottom: 15px!important"><b>My expenses</b> <?php if (
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
      }} ?></h5>
          <div style="width: 100%;height: 400px;" <?php if ($noExpenses) { ?>class="hide"<?php } ?>>
            <div id="budgetMeter"></div>
          </div>
          <?php if ($noExpenses) { ?>
            <center style="padding-top: 20px;padding-bottom: 20px;">
                <i class="grey-text material-icons medium">error</i><br>
                <h5 class="grey-text">No expenses yet</h5>
                <a class="modal-trigger btn black-text waves-effect blue-grey lighten-5 z-depth-0 btn-round btn-boxy" style="margin-top: 5px;" href="#bmmodal">Add one</a>
            </center>
        <?php } ?>
        </div>
      </div>
    </div>
    <div class="col s12 m6">
      <div class="card overflow:hidden">
      <div tabindex="0" class="focus-outline waves-effect" style="width:100%;padding: 25px;padding-bottom:0!important;padding-left: 30px!important;padding-right:20px!important" onclick="$('#sidenav__shoppingList').sidenav('open')"><i class="material-icons right" style="line-height: 40px;">chevron_right</i><h5 style="margin-top: 3px"><b>Shopping list</b></h5></div>
      <div class="card-content" style="padding-top: 0!important">
      <?php foreach (array_slice($_DATA->shoppingList, 0, 10, true) as $item) {
        ?>
        <p style="line-height: 30px">
          <label>
            <input type="checkbox" oninput="if(confirm('Delete?')===true){this.disabled=true;$('#ajaxLoader').load('./user/grocerylist/delete.php?id=<?=$item->id;?>',function(){ setTimeout(function() {getHashPage('hide')}, 200) })}else{this.checked=false}"/>
            <span><?=$item->name;?></span>
          </label>
        </p>
        <?php
      } 
      if(count($_DATA->shoppingList) == 0) {
        ?>
        <center>
        <img src="https://i.ibb.co/3Mz85RB/fogg-no-comments.png" style="width:100%">
        <p>No items</p>
        <p class="hoverP">Illustration by <a href="https://icons8.com/illustrations/author/5c18c58a793948000f7394ce">Marina Fedoseenko</a> from <a href="https://icons8.com/illustrations">Ouch!</a></p>
        </center>
        <?php
      }
      ?>
      </div></div>
      <?php foreach ($_DATA->listNames as $item) { if(isEven($item->id)) {?>
        <div class="card overflow:hidden" style="<?=($item->star == 'on' ? 'border-color:#e65100!important':'')?>">
        <div tabindex="0" class="focus-outline waves-effect" style="width:100%;padding: 25px;padding-bottom:0!important;padding-left: 30px!important;padding-right:20px!important" onclick="$('#sidenav__<?=$item->id;?>').sidenav('open')"><i class="material-icons right" style="line-height: 40px;">chevron_right</i><h5 style="margin-top: 3px"><b><?=$item->name;?></b></h5></div>
        <div class="card-content" style="padding-top: 0!important">
        <?php foreach (array_slice($_DATA->listItems, 0, 10, true) as $item1) {if($item1->listId == $item->id) { ?>
          <p style="line-height: 30px">
          <label>
            <input type="checkbox" oninput="if(confirm('Delete?')===true){this.disabled=true;$('#ajaxLoader').load('./user/items/delete.php?id=<?=$item1->id;?>',function(){ setTimeout(function() {getHashPage('hide')}, 200) })}else{this.checked=false}"/>
            <span><?=$item1->name;?></span>
          </label>
        </p>
        <?php }} ?>
        </div></div>
        <?php
       } } ?>
      <!-- end col 1-->
    </div>
    <div class="col s12 m6">
    <div class="card overflow:hidden">
    <div tabindex="0" class="focus-outline waves-effect" style="width:100%;padding: 25px;padding-bottom:0!important;padding-left: 30px!important;padding-right:20px!important" onclick="$('#sidenav__todoList').sidenav('open')"><i class="material-icons right" style="line-height: 40px;">chevron_right</i><h5 style="margin-top: 3px"><b>Reminders</b></h5></div>
    <div class="card-content" style="padding-top: 0!important">
      <?php foreach (array_slice($_DATA->reminders, 0, 10, true) as $item) {
        ?>
          <p style="line-height: 30px">
          <label>
            <input type="checkbox" oninput="if(confirm('Delete?')===true){this.disabled=true;$('#ajaxLoader').load('./user/todo/delete.php?id=<?=$item->id;?>',function(){ setTimeout(function() {getHashPage('hide')}, 200) })}else{this.checked=false}"/>
            <span><?=$item->name;?></span>
          </label>
        </p>
        <?php
      }
      if(count($_DATA->shoppingList) == 0) {
        ?>
        <center>
        <img src="https://i.ibb.co/0cVYGRt/fogg-success-1.png" style="width:100%">
        <p>No tasks</p>
        <p class="hoverP">Illustration by <a href="https://icons8.com/illustrations/author/5bf673a26205ee0017636674">Anna Golde</a> from <a href="https://icons8.com/illustrations">Ouch!</a></p>
        </center>
        <?php
      }
      ?>
    </div></div>
    <?php foreach ($_DATA->listNames as $item) { if(!isEven($item->id)) {?>
        <div class="card overflow:hidden">
        <div tabindex="0" class="focus-outline waves-effect" style="width:100%;padding: 25px;padding-bottom:0!important;padding-left: 30px!important;padding-right:20px!important" onclick="$('#sidenav__<?=$item->id;?>').sidenav('open')"><i class="material-icons right" style="line-height: 40px;">chevron_right</i><h5 style="margin-top: 3px"><b><?=$item->name;?></b></h5></div>
        <div class="card-content" style="padding-top: 0!important">
        <?php foreach ($_DATA->listItems as $item1) { if($item1->listId == $item->id) { ?>
          <p style="line-height: 30px">
          <label>
            <input type="checkbox" oninput="if(confirm('Delete?')===true){this.disabled=true;$('#ajaxLoader').load('./user/items/delete.php?id=<?=$item1->id;?>',function(){ setTimeout(function() {getHashPage('hide')}, 200) })}else{this.checked=false}"/>
            <span><?=$item1->name;?></span>
          </label>
        </p>
        <?php } }?>
        </div></div>
        <?php
       } } ?>
    <!-- end col 2-->
    </div>

    <div class="col s12">
    <div class="card center w-100 waves-effect focus-outline" tabindex='0' style="border-style:dashed" onclick="window.location.hash = '#/add/list'">
    <div class="card-content">
      <i class="material-icons medium" style="color:rgba(200, 200, 200, .78)">add_circle</i><br>
      <h5 style="color:rgba(200, 200, 200, .78)">Create list</h5>
    </div>
    </div>
    </div>

  </div>
</div>
<div id="addItem1" class="modal">
  <div class="modal-content">
    <form action="./user/lists/addItem.php" id="addItemForm">
      <h5>Create new</h5>
      <div class="input-field input-border">
        <input name="name" type="text" autocomplete="off">
        <label>Item name</label>
      </div>
        <div class="input-field input-border">
        <input name="description" type="text">
        <label>Item description</label>
      </div>
      <br><br>
      <input type="hidden" name="listId" id="addItemId">
      <div class="sm:fixed-bottom" style="padding: 20px;background: var(--bg-color);width:100%;z-index:1;text-align: right;">
      <button type="button" class="btn-border w-full-sm btn transparent modal-close waves-effect black-text btn-round" style="border:1px solid #cfd8dc!important;min-width: 100px;border-radius: 15px!important">
       Cancel
      </button>
      <button class="w-full-sm btn blue-grey lighten-4 waves-effect black-text btn-round" style="min-width: 100px;border-radius: 15px!important">
        <i class="material-icons-round left hide-on-med-and-down black-text">save</i> Save
      </button>
      </div>
    </form>
  </div>
</div>
<script>
$(document).ready(function() {
  $("#sidenav__shoppingList, #sidenav__todoList").sidenav({
    edge: "right",
    onOpenStart() {document.querySelector("meta[name='theme-color']").setAttribute("content", (document.documentElement.classList.contains("_darkTheme" ? "#101010" : "#7a7a7a")));},
    onCloseEnd() {document.querySelector("meta[name='theme-color']").setAttribute("content", (document.documentElement.classList.contains("_darkTheme" ? "#212121" : "#fff")));}
  });
   <?php foreach ($_DATA->listNames as $list) {?>
    $("#sidenav__<?=$list->id;?>").sidenav({
    edge: "right",
    onOpenStart() {document.querySelector("meta[name='theme-color']").setAttribute("content", (document.documentElement.classList.contains("_darkTheme" ? "#101010" : "#7a7a7a")));},
    onCloseEnd() {document.querySelector("meta[name='theme-color']").setAttribute("content", (document.documentElement.classList.contains("_darkTheme" ? "#212121" : "#fff")));}
  });
   <?php } ?>
})
var options = {
  legend: {
      show: false,
      position: "left"
}, 
colors: [(document.documentElement.classList.contains("_darkTheme") ? "#fff" : '#<?=$_SESSION['theme'];?>'), '#E91E63'],
  annotations: {
  yaxis: [
    {
      y: <?=$_SESSION['goal'];?>,
      borderColor: '#c62828',
      label: {
        borderColor: '#c62828',
        borderWidth: 8,
        style: {
          color: '#fff',
          background: '#c62828',
          borderRadius: "10",
          position: 'left',
          offsetY: 6,
        },
        text: '<?=$_SESSION['goal'];?>',
        position: 'left',
        offsetY: 6,
      }
    }
  ]
},
  series: [{
  name: 'Expenses',
  data: <?=json_encode($_DATA->budgetMeter);?>
}],
  chart: {
  animations: {
    enabled: true
  },
  selection: {
    enabled: true,
  },
  toolbar: {
    show: ($(window).width() < 992 ? false:true),
    export: {
      csv: {
        fileName: "expenses.csv"
      },
      png: {
        fileName: "expenses.png"
      },
      svg: {
        fileName: "expenses.svg"
      }
    },
    tools: {
          download: true,
          reset: true,
          selection: true,
          zoom: true,
          zoomin: true,
          zoomout: true,
          pan: true,
        },
    // show: false
  },
  height: 400,
  type: 'area'
},
dataLabels: {
  enabled: false
},
stroke: {
  curve: 'smooth'
},
xaxis: {
  type: 'category',
  tickAmount: 3,
  trim: true,
  
  // <?php if($bmCount >= 50) { ?>max: 50,<?php } ?>

  labels: {
    // show: false,
    // enabled: false,
    rotate: 0
  },
  categories: <?=json_encode($_DATA->budgetMeterDates);?>,
  
  tooltip: {
      enabled: false
  }
},
tooltip: {
  shared: true,
  theme: (document.documentElement.classList.contains("_darkTheme") ? "dark": "light"),
  x: {
    format: 'MM/dd/yy'
  },
   onDatasetHover: {
    highlightDataSeries: true,
  },
  marker: {
    show: false,
  },
},
};

var chart = new ApexCharts(document.querySelector("#budgetMeter"), options);
chart.render();
$("#addItem1").modal();

// this is the id of the form
$("#addItemForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               getHashPage("hide");
               $(".sidenav:not(#slide-out)").sidenav("close")
               M.toast({html:data}); // show response from the php script.
           }
         });

    
});
$("[tabindex=0]").keyup(function(e) {
  if(e.keyCode === 13) {
    e.target.click();
  }
})
</script>