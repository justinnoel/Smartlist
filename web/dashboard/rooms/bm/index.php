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

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>  
<!-- MDB core JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<title>Homepage</title>
<style>
body {
    background: transparent
}
</style>
<style>
@import url(https://fonts.googleapis.com/css?family=Lato:400,400italic,700|Sansita+One);
:root {
  --primary-color: #302AE6;
  --secondary-color: #536390;
  --font-color: #424242;
  --bg-color: transparent;
    --modal-color: white;

  --heading-color: #292922;
}
dialog {
    position: fixed;
    max-height: 90%;
    overflow: scroll;
    border: 0;
    border-radius: 10px;
}
body {
      scrollbar-width: none;  /* Firefox */
}
/**
 * Native modal dialog (limited support)
 */

dialog::backdrop {
	background: rgba(0,0,0,.8)
}
::-webkit-scrollbar {
  display: none;
}
[data-theme="dark"] {
  --primary-color: #9A97F3;
  --secondary-color: #818cab;
  --font-color: #e1e1ff;
  --bg-color: #161625;
    --modal-color: #161625;

  --heading-color: #818cab;
}

body,.sidenav,.modal * {
  background-color: var(--modal-color) !important;
  color: var(--font-color) !important;
}
li,h1,h2,h3,h4,h5,a,i,table,td,tr {
      color: var(--font-color) !important;

}
h1 {
  color: var(--heading-color);
}

p {

}

a {
  color: var(--primary-color);
  text-decoration: none;
  border-bottom: 3px solid transparent;
  font-weight: bold;
}

section {
  max-width: 68%;
  margin: 0 auto;
}

.post-meta {
  font-size: 1rem;
  font-style: italic;
  display: block;
  margin-bottom: 4vh;
  color: var(--secondary-color);
}
.theme-switch-wrapper em {
  margin-left: 10px;
  font-size: 1rem;
}

.theme-switch {
display:none
}

.theme-switch input {
  display: none;
}

.slider {
  background-color: #ccc;
  bottom: 0;
  cursor: pointer;
  left: 0;
  transition: .4s;
}

.slider:before {
  background-color: #fff;
  bottom: 4px;
  content: "";
  height: 26px;
  left: 4px;
  position: absolute;
  transition: .4s;
  width: 26px;
}

input:checked + .slider {
  background-color: #66bb6a;
}

</style>
  <div class="theme-switch-wrapper">
       <label class="theme-switch" for="checkbox">
    <input type="checkbox" id="checkbox" />
    <div class="slider round"></div>
  </label>
  </div>
  <script id="rendered-js" >
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
const currentTheme = localStorage.getItem('theme');

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);
  
    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    }
    else {        document.documentElement.setAttribute('data-theme', 'light');
          localStorage.setItem('theme', 'light');
    }    
}

toggleSwitch.addEventListener('change', switchTheme, false);
    </script>
</head>

<body>
<!-- Button trigger modal -->
 <a href="add.php" class="text-center btn btn-success float-right waves-effect waves-light" style="color:white !important">Add</a>
<button onclick="document.querySelector('#modal').showModal()" class="btn red waves-effect waves-light">Edit</button>
</button>
<canvas id="myChart" style="width: 100%;height:400px !important;background: whitesmoke" onClick="location.reload()"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: { <?php
            echo "labels: ['',";
            while($resd = mysqli_fetch_array($chartname)) {
            echo "'".$resd['name']."',";
            }
            echo "],";
            echo "\n";
            echo "datasets: [{";
            echo "\n";
            echo "label: 'Amount you spent',";
            echo "\n";
            echo "data: [0,";
            while($res = mysqli_fetch_array($chartqty)) {
            echo "".$res['qty'].",";
            }
            echo "],";
            echo "\n";

            ?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,

        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                },
                scaleLabel: {
        display: true,
        labelString: 'You spent'
      }
            }],
            xAxes: [{
      scaleLabel: {
        display: true,
        labelString: 'Time'
      }
    }]
        },
        tooltips: {
           callbacks: {
                label: function(tooltipItems, data) {
                    return data.datasets[tooltipItems.datasetIndex].label +': ' + tooltipItems.yLabel + ' dollars';
                }				
            },
        

        },
        elements: {
                animationEasing: 'easeIn',
                    line: {
            //tension: 0
        },
        point:{
                        radius: 0
                    }
                },
    }
});
ctx.height = 500;
</script><!--<a href="add.php" class="text-center btn btn-success float-right p-2" style="box-shadow:none !important;margin-right:5%;color:white !important">Add</a><br><div class="container">
<table class="table table-striped " id="myTable">
<tr >
<td>Name</td>
<td>Price</td>
<td class="d-none">Price</td>
<td style="width:10%">Actions</td>
</tr>
<?php
while($resc = mysqli_fetch_array($resultc)) {
echo "<tr>";
#echo "<td>".$resc['name']."</td>";
echo "<td>".$resc['qty']."</td>";
echo "<td class=\"d-none\">".$resc['price']."</td>";
echo "<td><a href=\"edit.php?id=$resc[id]\">Edit</a> | <a href=\"delete.php?id=$resc[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
}
?>
</table>-->
 <!-- Modal Trigger -->
<dialog id="modal">
<table class="table table-striped " id="myTable">
<tr >
<!--<td>Name</td>-->
<td>Price</td>
<td class="d-none">Price</td>
<td style="width:10%">Actions</td>
</tr>
<?php
while($a = mysqli_fetch_array($as)) {
echo "<tr>";
#echo "<td>".$resc['name']."</td>";
echo "<td>".$a['qty']."</td>";
echo "<td class=\"d-none\">".$a['price']."</td>";
echo "<td><a href=\"edit.php?id=$a[id]\">Edit</a> | <a href=\"delete.php?id=$a[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
}
?>
</table><button onclick="this.parentNode.close()">Close</button>
</dialog>
  <script>
    $(document).ready(function(){
    $('.modal').modal();
  });
  </script>
</body>
</html>