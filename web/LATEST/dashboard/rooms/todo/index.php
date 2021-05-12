<?php
session_start();
include('../../cred.php');
?>
        <?php
        try
        {
          $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $stmt = $dbh->query('SELECT * FROM todo WHERE login_id=' . $_SESSION['id']);
          $todo_row_count = $stmt->rowCount();
          $dbh = null;
        }
        catch(PDOexception $e)
        {
          echo "Error is: " . $e->etmessage();
        }
        if ($todo_row_count > 0)
        {
          try
          {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM todo WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
            $users = $dbh->query($sql);
            echo "<div class='card-content'><h5 style='margin-top:0'>Todo <a href=\"javascript:void(0)\" class=\"right btn btn-flat waves-effect btn-floating\" onclick=\"AJAX_LOAD('#todo_container', './rooms/todo/index.php');\"><i class='material-icons refresh'>refresh</i></a></h5><br>";
            foreach ($users as $todo_listx)
            {
              echo '<p><label><input type="checkbox" onchange=\'$("#div1").load("https://smartlist.ga/dashboard/rooms/todo/delete.php?id=' . $todo_listx['id'] . '");this.disabled=true;this.nextElementSibling.style.color = "gray";\'/><span><b>' . $todo_listx['name'] . '</b><br>Priority: ' . $todo_listx['qty'] . '<br>Due on: ' . $todo_listx['price'] . '<br><div style="padding-left: 35px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Description: ' . $todo_listx['descs'] . '</div></span></label></p>';
            }
            echo "</div>";
            $dbh = null;
          }
          catch(PDOexception $e)
          {
            echo "Error is: " . $e->etmessage();
          }
        }
        else
        {
          echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Todo</h5><img alt='image' loading='lazy' src='https://res.cloudinary.com/smartlist/image/upload/v1615853475/gummy-coffee_300x300_dlc9ur.png'width='100%' style='display:block;margin:auto;'><br><p class='center'>Great job - you finished all tasks! Why not take this time to drink some coffee or go for a walk?</p></div></div>";
        }
        ?>