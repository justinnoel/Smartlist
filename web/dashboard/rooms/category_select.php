<?php
// session_start();
// include "../cred.php";
// echo get_include_path();
?>
<input type="hidden" name="price" id="price1">
<select id="categorySelect" multiple> 
<option disabled>Categories</option>
    <option selected id="nc" value="No Category Specified">No Category Specified</option> 
    <option disabled>Other</option>
    <?php
    try
    {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "SELECT * FROM labels WHERE login= " . $_SESSION['id'];
        $users = $dbh->query($sql);
            foreach ($users as $row){
                ?>
                <option value=<?=json_encode($row['name'])?>> <?=htmlspecialchars($row['name'])?> </option>
                <?php
        }
            $dbh = null;
    }
    catch(PDOexception $e)
    {
        echo "Error is: " . $e->etmessage();
    }
?>
</select>
<script>
    $('select').formSelect();
    if(localStorage.getItem("categorySelect")) {
        var x = document.getElementById('categorySelect');
        $('select').formSelect();
        x.value = null;
        $('select').formSelect();
        x.value = localStorage.getItem("categorySelect");
        $('select').formSelect();
        console.log(x.value)
    }
    document.getElementById('categorySelect').onchange = function() {
        var sel = document.getElementById('categorySelect');
        localStorage.setItem("categorySelect", sel.value)
        console.log(localStorage.getItem("categorySelect"))
        var price = document.getElementById('price1')
        price.value = $('#categorySelect').val().toString();
        console.log(price.value)
        document.getElementById('nc').selected = false
        $('select').formSelect();
    }
</script>