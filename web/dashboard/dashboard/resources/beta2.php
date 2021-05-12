<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$chartqty = mysqli_query($mysqli, "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
$tablebm = mysqli_query($mysqli, "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
$as = mysqli_query($mysqli, "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");
$chartname = mysqli_query($mysqli, "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." ORDER BY id ASC");

?>
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Expenses'],
          <?php 
          while($resd = mysqli_fetch_array($chartname)) {
            echo "['".$resd['name']."', ".$resd['qty']."],";
            echo "\n";
            }
            ?>
        ]);

        var options = {
          title: 'My expenses',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 100%; height: 400px"></div>
  </body>
</html>
