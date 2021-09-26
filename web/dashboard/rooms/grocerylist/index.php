<?php
session_start();
include('../../cred.php');
?>
<?php
        try
        {
          $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $stmt = $dbh->query('SELECT * FROM grocerylist WHERE login_id=' . $_SESSION['id']);
          $gl_row_count = $stmt->rowCount();
          //echo $gl_row_count;
          $dbh = null;
        }
        catch(PDOexception $e)
        {
          echo "Error is: " . $e->etmessage();
        }
        if ($gl_row_count > 0)
        {
          try
          {
            $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM grocerylist WHERE login_id=" . $_SESSION['id'] . " OR login_id= " . $_SESSION['syncid'];
            $users = $dbh->query($sql);
            echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Shopping List<a href=\"#\" class=\"right btn btn-flat waves-effect btn-floating\" onclick=\"AJAX_LOAD('#grocery_list', './rooms/grocerylist/index.php');\"><i class='material-icons refresh'>refresh</i></a></h5><br>";
            foreach ($users as $todo_listx)
            {
              echo '<p><label><input type="checkbox" onchange=\'$("#div1").load("https://smartlist.ga/dashboard/rooms/grocerylist/delete.php?id=' . $todo_listx['id'] . '");this.disabled=true;this.nextElementSibling.style.color = "gray";\'/><span><b>' . $todo_listx['name'] . '</b><br>Quantity: ' . $todo_listx['qty'] . '</span></label></p>';
            }
            echo "</div></div>";
          }
          catch(PDOexception $e)
          {
            echo "Error is: " . $e->etmessage();
          }
        }
        else
        {
                                    echo "<div class='card'><div class='card-content'><h5 style='margin-top:0'>Shopping List</h5><div class='container'><div class='container'><img alt='image' loading='lazy' src='https://res.cloudinary.com/smartlist/image/upload/v1615853654/b21f813da2e0c122d2950bf1b449106a-winter-woman-shopping-illustration-by-vexels_xszuie.png'width='100%' style='display:block;margin:auto;'></div></div><br><p class='center'>Nothing in your Shopping List.... Good Job! </p></div></div>";
        }
        ?>