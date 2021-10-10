<?php
session_start();
include("../../cred.php");
$dbname = "bcxkspna_smartlist_api";
?>
<style>.e {float:none !important;color: white !important;vertical-align:middle; margin-right: 10px;padding: 1px 10px;border-radius: 999px}</style>
<br><br>
<div class="alert orange white-text darken-2" style="padding: 10px">
Warning - this section is for developers only. Don't change anything here unless you really know what you're doing...
</div>
<h5>Developer</h5>
<a href="https://smartlist.ga/developer" class="btn blue-grey darken-3 waves-effect waves-light">API Dashboard</a>


<table>
       <tr>
         <td><b>Name</b></td>
         <td class="center"><b>API Key</b></td>
      </tr>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM api_keys WHERE login_id=".$_SESSION['id']);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $d = $stmt->fetchAll();
        foreach($d as $v) {
      ?>
      <tr>
        <td><?=$v['name'];?></td>
        <td><?=$v['apiKey'];?></td>
      </tr>
      <?php
        }
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
      ?>
    </table>
<p>API Reference</p>
<?php 
include('../../../developer/pages/options.php');
?>
<script>
  window.scrollTo(0,0)
  $('.collapsible').collapsible({
    // specify options here
  });
</script>