<?php
// session_start();
// include "../cred.php";
// echo get_include_path();
?>
<div class="chips chips-autocomplete">
  <input class="custom-class">
</div>
<input type="hidden" id="price" name="price">
<script>
  var acdata = {<?php
    try
    {
      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = "SELECT * FROM labels WHERE login= " . $_SESSION['id'];
      $users = $dbh->query($sql);
      foreach ($users as $row){
    ?>
    <?=json_encode($row['name']);?>: null,
    <?php
      }
      $dbh = null;
    }
    catch(PDOexception $e)
    {
      echo "Error is: " . $e->etmessage();
    }
    ?>};

  var categories = [];
  $(document).ready(function(){
    $('.chips').chips({
      placeholder: "Categories...",
      // specify options here
      autocompleteOptions: {
        data: acdata,
        limit: Infinity,
        minLength: 1
      },
      onChipAdd(e) {
        var instance = M.Chips.getInstance(document.querySelector('.chips'));
        categories = (instance.chipsData);
        console.log(categories);
        var val = "";
        document.getElementById('price').value = ""
        categories.forEach(val => {
          document.getElementById('price').value += val.tag+", ";
        });
        document.getElementById('price').value = document.getElementById('price').value.substring(0, document.getElementById('price').value.length - 2)
      },
      onChipDelete(e) {
        var instance = M.Chips.getInstance(document.querySelector('.chips'));
        categories = instance.chipsData;
        console.log(categories);
        var val = "";
        document.getElementById('price').value = ""
        categories.forEach(val => {
          document.getElementById('price').value += val.tag+", ";
        });
        document.getElementById('price').value = document.getElementById('price').value.substring(0, document.getElementById('price').value.length - 2)
      },
    });
  });
</script>