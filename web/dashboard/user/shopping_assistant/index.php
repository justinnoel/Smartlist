<?php
session_start();
include("../../cred.php");
$number_notify = $_SESSION['number_notify'];
?>
<style>
  .rc .collection-item:not(.active) {
    line-height: 40px !important;
  }

  .rc .collection .collection-item {
    transition: all .4s !important;
  }

  .rc .collection-item:hover {
    /*background: rgba(0, 0, 0, .1) !important;*/
  }

  @media only screen and (max-width: 600px) {
    .rc {
      width: 100% !important;
    }

    .rc h5 {
      margin-left: 10px;
    }
  }

  .rc .collection .collection-item:first-child {
    font-size: 30px !important;
    border: 0;
    transition: margin-left .2s !important;
    box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    margin: 40px 10px;
    padding: 20px !important;
    margin-bottom: 50px;
    border-radius: 3px;
    text-align: center;
  }

  .rc .collection .collection-item:first-child .waves-ripple:first-child {
    display: none !important
  }

  .cancel {
    display: none
  }

  .rc .collection .collection-item:first-child .cancel {
    margin-top: 30px;
    display: inline-block
  }

  .rc .collection .collection-item:not(:first-child) {
    opacity: .5
  }

  * {
    -webkit-user-drag: none;
  }
</style>
<div class="container rc">
  <br><br>
  <div class="collection">
    <?php
    try {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "
                    SELECT * FROM grocerylist WHERE login_id= " . $_SESSION['id'] . "
                    ";
      $users = $dbh->query($sql);
      foreach ($users as $row) {
        // var_dump( $row);
    ?>
    <a href="javascript:void(0)" id="sl_<?= $row['id'] ?>" class="collection-item waves'-effect">
      <?= htmlspecialchars(($row['name'])); ?>
      <br>
      <div class="chip">Shopping List</div><br>
      <button class="cancel btn circle btn-floating btn-flat waves-effect"><i class="material-icons" style="color: black !important">close</i></button>
    </a>
    <?php
      }
      $dbh = null;
    } catch (PDOexception $e) {
      echo "Error is: " . $e->etmessage();
    }
    ?>
    <?php
    try {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "
                    SELECT * FROM products WHERE login_id= " . $_SESSION['id'] . "
                    UNION
                    SELECT * FROM garage WHERE login_id= " . $_SESSION['id'] . "
                    UNION
                    SELECT * FROM bedroom WHERE login_id= " . $_SESSION['id'] . "
                    UNION
                    SELECT * FROM bathroom WHERE login_id= " . $_SESSION['id'] . "
                    UNION
                    SELECT * FROM laundry WHERE login_id= " . $_SESSION['id'] . "
                    UNION
                    SELECT * FROM family WHERE login_id= " . $_SESSION['id'] . "
                    ";
      $users = $dbh->query($sql);
      foreach ($users as $row) {
        if (intval(preg_replace("/[^0-9]/", "", decrypt($row['qty']))) < $number_notify) {
          // var_dump( $row );
    ?>
    <a href="javascript:void(0)" id="kitchenP_<?= $row['id'] ?>" class="collection-item waves-effect">
      <?= htmlspecialchars(decrypt($row['name'])); ?><br>
      <button class="cancel btn circle btn-floating btn-flat waves-effect"><i class="material-icons" style="color: black !important">close</i></button>
      <button class="cancel btn circle btn-floating btn-flat waves-effect" onclick="$('#div1').load('./rooms/todo_qadd.php?name='+this.parentElement.innerText.replace('close', ''), function() {M.toast({html: 'Added to Shopping List!'})})"><i class="material-icons" style="color: black !important">receipt_long</i></button>
    </a>
    <?php
        }
      }
      $dbh = null;
    } catch (PDOexception $e) {
      echo "Error is: " . $e->etmessage();
    }
    ?>
  </div>
  <a href='javascript:void(0)' onclick="localStorage.clear()" class='right'>Restart</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>

<script>
  $(document).ready(function() {
    if (localStorage.getItem('done')) {
      var done = JSON.parse(localStorage.getItem("done"))
      done.forEach((el) => {
        document.getElementById(el).remove()
      })
    } else {
      localStorage.setItem("done", "[]")
      var done = JSON.parse(localStorage.getItem("done"))
      }
    $(".rc .collection-item").click(function(e) {
      done.push(this.id)
      localStorage.setItem("done", JSON.stringify(done))
      // this.style.position = 'relative';
      this.style.width = this.style.width;
      this.style.whiteSpace = "nowrap"
      this.style.marginLeft = "150vw";
      this.style.lineHeight = "1px !important"
      // this.classList.add('active')
      this.style.padding = 0;
      this.style.fontSize = "0"
      setTimeout(() => {
        this.style.maxHeight = "0"
        setTimeout(() => {
          this.remove()
        }, 200)
      }, 400)
    })
  });
</script>