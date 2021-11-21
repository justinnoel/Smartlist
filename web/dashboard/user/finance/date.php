<?php session_start(); include("../../cred.php");?>

<span id="s2" class="card-title" style="font-weight: bold !important"><b><?php if(isset($_GET['d'])) { ?>Amount spent on <?=$_GET['d'];?><?php } else { ?> Amount spent overall<?php } ?></b></span>
<ul class="collection del_fade">
  <?php 
  try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("SELECT * FROM bm WHERE login_id=:sessid");

    $sql->execute(array( ':sessid' => $_SESSION['id'] ));
    $users = $sql->fetchAll();
    foreach($users as $row) {
      if((isset($_GET['d']) && decrypt($row['name']) == $_GET['d']) || !isset($_GET['d']) || empty($_GET['d'])) {
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
    <a href="javascript:void(0)" class="secondary-content">-$<?=decrypt(htmlspecialchars($row['qty']));?> <br><i class="dd material-icons red-text" style="margin-top: 10px;margin-left: 10px;" onclick='deleteBM(this, <?=$row['id']?>")'>delete</i></a>
  </li>
  <?php
        }
    }
  }
  catch (PDOexception $e) {
    echo "Error is: " . $e->getmessage();
  }
  ?>
</ul>
<script>
document.getElementById('s2').scrollIntoView();
  document.documentElement.scrollTop -= 100;
</script>