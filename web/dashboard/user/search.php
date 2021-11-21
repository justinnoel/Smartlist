<?php
session_start();
include('../cred.php');
$q = str_replace('"', '', trim($_POST['query']));
?>
<style>
  #search_results .collection-item {
    display: block;
    width: 100%;
    padding-left: 3px !important
  }
  #search_results i.right {
    color: #ffa000 !important
  }
</style>
<br>
<div class="container">
  <h5 id="noSearchResultsHeading">Search results for "<?php echo htmlspecialchars($q); ?>"</h5><br>
  <input id='q' value="<?php echo $q; ?>" type="hidden" oninput="">
  <h6>Filter</h6>
  <p>Room</p>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Kitchen</div>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Bedroom</div>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Bathroom</div>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Garage</div>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Laundry Room</div>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Family Room</div>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Storage Room</div>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Dining Room</div>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Laundry Room</div>
  <div class="chip waves-effect chip-outline" onclick="filterResults(this)">Camping Supplies</div>
  <p>Category</p>
  <div class="chip-suggestions">
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = $dbh->prepare("SELECT * FROM bathroom WHERE id=:id");

    $sql->execute(array(
        ':id' => intval($_GET['id'])
    ));
    $users = $sql->fetchAll();
      $c1 = count($users);
      foreach ($users as $row){
    ?>
    <div class="chip waves-effect chip-outline" onclick="filterResults(this)"><?=$row['name'];?></div>
    <?php
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
  </div>
  <div class="divider"></div><br>
  <h6>Results</h6>
  <ul class="collection" id="search_results">
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c1 = $users->rowCount();
      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <a href='javascript:void(0)'><b>". htmlspecialchars(($row["name"])). "</b></a>
            <br><span>Room</span>
       </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM products WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c2 = $users->rowCount();
      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "")." onclick=\"new loadPage('./rooms/kitchen/view.php', '#app', { callback: function() {setTimeout(() => {scrollInto(".$row['id']."), 200})}})   \">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."
            <a href='javascript:void(0)'><b>". htmlspecialchars(decrypt($row["name"])). "</b>
            <br><span>Kitchen</span>
            <br>";
        if(!empty($row['price'] && $row['price'] !== "No Category Specified")) {
          foreach(explode(",", decrypt($row['price'])) as $this1) {
            echo "<div class='chip'>".$this1."</div>";
          }
        }
        echo "</a> </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM garage WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c3 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)' onclick=\"new loadPage('./rooms/garage/view.php', '#app', { callback: function() {setTimeout(() => {scrollInto(".$row['id']."), 200})}})    \">". htmlspecialchars(decrypt($row["name"])). "</b>
            <br><span>Garage</span>
            <br>";
        if(!empty($row['price'] && $row['price'] !== "No Category Specified")) {
          foreach(explode(",", decrypt($row['price'])) as $this1) {
            echo "<div class='chip'>".$this1."</div>";
          }
        }
        echo "</a> </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM bedroom WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c4 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)' onclick=\" new loadPage('./rooms/bedroom/view.php', '#app', { callback: function() {setTimeout(() => {scrollInto(".$row['id']."), 200})}})    \">". htmlspecialchars(decrypt($row["name"])). "</b>
            <br><span>Bedroom</span>
            <br>";
        if(!empty($row['price'] && $row['price'] !== "No Category Specified")) {
          foreach(explode(",", decrypt($row['price'])) as $this1) {
            echo "<div class='chip'>".$this1."</div>";
          }
        }
        echo "</a> </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM bathroom WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c5 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)'onclick=\"  new loadPage('./rooms/bathroom/view.php', '#app', { callback: function() {setTimeout(() => {scrollInto(".$row['id']."), 200})}})     \">". htmlspecialchars(decrypt($row["name"])). "</b>
            <br><span>Bathroom</span>
            <br>";
        if(!empty($row['price'] && $row['price'] !== "No Category Specified")) {
          foreach(explode(",", decrypt($row['price'])) as $this1) {
            echo "<div class='chip'>".$this1."</div>";
          }
        }
        echo "</a> </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM family WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c6 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)' onclick=\" new loadPage('./rooms/family/view.php', '#app', { callback: function() {setTimeout(() => {scrollInto(".$row['id']."), 200})}})     \">". htmlspecialchars(decrypt($row["name"])). "</b>
            <br><span>Family Room</span>
            <br>";
        if(!empty($row['price'] && $row['price'] !== "No Category Specified")) {
          foreach(explode(",", decrypt($row['price'])) as $this1) {
            echo "<div class='chip'>".$this1."</div>";
          }
        }
        echo "</a> </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM storageroom WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c7 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <b><a href='javascript:void(0)' onclick=\"new loadPage('./rooms/storage/view.php', '#app', { callback: function() {setTimeout(() => {scrollInto(".$row['id']."), 200})}})   \">". htmlspecialchars(decrypt($row["name"])). "</b>
            <br><span>Storage Room</span>
            <br>";
        if(!empty($row['price'] && $row['price'] !== "No Category Specified")) {
          foreach(explode(",", decrypt($row['price'])) as $this1) {
            echo "<div class='chip'>".$this1."</div>";
          }
        }
        echo "</a> </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM laundry WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c8 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

            <a href='javascript:void(0)'  onclick=\"new loadPage('./rooms/laundry/view.php', '#app', { callback: function() {setTimeout(() => {scrollInto(".$row['id']."), 200})}})   \"><b>". htmlspecialchars(decrypt($row["name"])). "</b>
            <br><span>Laundry</span>
            <br>";
        if(!empty($row['price'] && $row['price'] !== "No Category Specified")) {
          foreach(explode(",", decrypt($row['price'])) as $this1) {
            echo "<div class='chip'>".$this1."</div>";
          }
        }
        echo "</a> </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM dining_room WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c9 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
        ".($row['star'] == "1" ? '<i class="material-icons-round right">star</i>' : "")."

        <a href='javascript:void(0)'  onclick=\"new loadPage('./rooms/dining_room/view.php', '#app', { callback: function() {setTimeout(() => {scrollInto(".$row['id']."), 200})}})   \"><b>". htmlspecialchars(decrypt($row["name"])). "</b>
            <br><span>Dining Room</span>
            <br>";
        if(!empty($row['price'] && $row['price'] !== "No Category Specified")) {
          foreach(explode(",", decrypt($row['price'])) as $this1) {
            echo "<div class='chip'>".$this1."</div>";
          }
        }
        echo "</a> </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM grocerylist WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c10 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <a href='javascript:void(0)'><b>". htmlspecialchars(($row["name"])). "</b>
            <br><span>Shopping List</span>
       </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM roomnames WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c11 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <a href='javascript:void(0)'><b>". htmlspecialchars(($row["name"])). "</b>
            <br><span>Custom Room</span>
       </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM todo WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c4 = $users->rowCount();

      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <b><a href='javascript:void(0)' onclick=\"sm_page('News');\">". htmlspecialchars(($row["name"])). "</b>
            <br><span>Todo</span>
       </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>
    <?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM custom_room_items WHERE login_id=" . $_SESSION['id'];
      $users = $dbh->query($sql);
      $c12 = $users->rowCount();
      foreach ($users as $row)
      {
        print "<li class=\"collection-item waves-effect modal-close\" ".(decrypt($row['name']) == $_POST['query'] ? 'style="border-left: 4px solid #1b5e20 !important"' : "").">
            <b><a href='javascript:void(0)' onclick=\"load_croom('" . str_replace('"', '', str_replace("'", "", $row['price'])) . "', '" . str_replace('"', '', str_replace("'", "", decrypt($row['name']))) . "')\"\">". htmlspecialchars(decrypt($row["name"])). "</b>
            <br><span>Custom room Item</span>
            <br>
            ".($row["label"] !== "No Category Specified" && !empty($row["label"]) && isset($row["label"]) ? '<div class="chip" style="margin-top: 5px;">'.htmlspecialchars($row['label']).'</div>' : "")."
       </li>";
      }
      $dbh = null;
    }
    catch(PDOexception $e) { echo "Error is: " . $e->etmessage(); }
    ?>

  </ul>
</div>
<div style="display:none" id="noSearchResultsContainer">
  <div class="container">
    <div class="container center">
      <img src="https://i.ibb.co/7y844v7/acc336e913e7b393292965434d5a48bf.png" width="100%">
      <h5><b>No results found</b></h5>
    </div>
  </div>
</div>
<script>
  setTimeout(function() {
    qq();
  }, 400);
</script>