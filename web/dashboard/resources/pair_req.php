<?php 
session_start();
include_once('../cred.php');
try
{
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM login WHERE syncid= " . $_SESSION['id']. " AND accept=1";
    $users = $dbh->query($sql);
    $garage_count = $users->rowCount();
    if ($garage_count > 0)
    {
        foreach ($users as $row)
    {
      echo '
        <div>
            <a href="./resources/accept.php?id='.$row['id'].'" class="btn right waves-effect" style="background: var(--navbar-color)">Accept</a>
            <p>'.$row['email'].'</p>
        </div>
        ';
    }
        $dbh = null;
    }
    else
    {
        echo "<img alt='image' src='https://i.ibb.co/M74Pq80/pablita-list-is-empty.png' width='300px' style='display:block;margin:auto;'><br><p class='center'>No requests found!</p>";
    }
}
catch(PDOexception $e)
{
    echo "Error is: " . $e->etmessage();
}
?>
