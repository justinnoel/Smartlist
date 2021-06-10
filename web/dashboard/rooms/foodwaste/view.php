<?php
session_start();
include('../../cred.php'); ?>
<div class="container" style="width: 90%">
    <canvas id="foodWaste" width="400" height="400"></canvas>
</div>
<script>
var ctx = document.getElementById('foodWaste').getContext('2d');
var foodWaste = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM food_wastage WHERE login=" . $_SESSION['id'];
  $users = $dbh->query($sql);
  foreach ($users as $row)
  {
    echo json_encode($row['date']) . ", ";
  }
  $dbh = null;
}
       catch(PDOexception $e)
       {
         echo "Error is: " . $e->etmessage();
       } ?>],
        datasets: [{
            label: 'Food Wastage',
            data: [<?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM food_wastage WHERE login=" . $_SESSION['id'];
  $users = $dbh->query($sql);
  foreach ($users as $row)
  {
    echo $row['amount'] . ", ";
  }
  $dbh = null;
}
       catch(PDOexception $e)
       {
         echo "Error is: " . $e->etmessage();
       } ?>],
            backgroundColor: [
                'rgba(244, 67, 54, 0.2)',
            ],
            borderColor: [
                'rgba(244, 67, 54, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        tooltips: {
            titleFontSize: 16,
            caretPadding: 10,
            bodyFontSize: 14,
            mode: 'index',
            intersect: false,
            displayColors: false,
            xPadding: 20,
            yPadding: 15,
            bodyFontColor: '#919191',
            backgroundColor: '#fff',
            cornerRadius: 6,
            borderColor: '#ccc',
            borderWidth: 1.5,
            titleFontColor: '#212121',
            callbacks: {
                label: function(tooltipItems, data) {
                    return "Food Wasted: " + tooltipItems.yLabel + ' bowls';
                },
            },
    },
    hover: {
        mode: 'nearest',
        intersect: true
    },
    elements: {
                    point:{
                        radius: 0
                    }
                },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<br><br>
<div class="container">
<h5>Food Wastage</h5>

<table>
    <tr>
        <td style="width: 40%">Date</td>
        <td style="width: 50%">Amount</td>
        <td style="width: 10%"></td>
    </tr>
    <?php try
{
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $sql = "SELECT * FROM food_wastage WHERE login=" . $_SESSION['id'];
  $users = $dbh->query($sql);
  foreach ($users as $row)
  {
    echo "<tr>
            <td>".htmlspecialchars($row['date'])."</td>
            <td>".htmlspecialchars($row['amount'])."</td>
            <td><a href='javascript:void(0)' onclick='sm_page(\"ajax_loader\");$(\"#div1\").load(\"./rooms/foodwaste/delete.php?id=".$row['id']."\", function() { sm_page(\"foodwaste\");AJAX_LOAD(\"#foodwaste\", \"./rooms/foodwaste/view.php\");change_title(\"Food Waste\")})'><i class='material-icons'>delete</i></a></td>
        </tr>";
  }
  $dbh = null;
}
       catch(PDOexception $e)
       {
         echo "Error is: " . $e->etmessage();
       } ?>
</table>
</div>