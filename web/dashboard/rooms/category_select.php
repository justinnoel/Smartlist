<?php
// session_start();
// include "../cred.php";
// echo get_include_path();
?>
<style>
  .chip_e {border-color: #aaa!important; box-shadow: 0px 0px 0px 1px #aaa inset !important;padding-left: 10px;border-radius: 4px}
  .chip_e:hover {border-color: var(--navbar-color) !important; box-shadow: 0px 0px 0px 1px var(--navbar-color) inset !important;}
  .chip_e:focus {border-color: var(--navbar-color) !important; box-shadow: 0px 0px 0px 1px var(--navbar-color) inset !important;}
  .chip_e input::placeholder {color: var(--sidenavf-color)}
</style>
<div class="chip_e" tabindex=0>
  <div class="chips chips-autocomplete input-aborder" style="border: 0 !important;box-shadow:none!important;width:100%">
    <input class="custom-class">
  </div>
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