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
$result = mysqli_query($mysqli, "SELECT * FROM bm WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
<title>Homepage</title>
<style>
body {
    background: transparent;
}
html {
    height:400px;
}
</style>
<style>
@import url(https://fonts.googleapis.com/css?family=Lato:400,400italic,700|Sansita+One);
:root {
  --primary-color: #302AE6;
  --secondary-color: #536390;
  --font-color: #424242;
  --bg-color: transparent;
  --heading-color: #292922;
}

[data-theme="dark"] {
  --primary-color: #9A97F3;
  --secondary-color: #818cab;
  --font-color: #e1e1ff;
  --bg-color: #161625;
  --heading-color: #818cab;
}

body,.sidenav {
  background-color: var(--bg-color) !important;
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
<h1 class="text-center">Family Room</h1>
<a href="add.html" class="text-center btn btn-success float-left p-2" style="box-shadow:none !important">Add</a>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for items..." title="Type in a name" class="form-control w-75 float-right">
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<br><br>
<table class="table" id="myTable">
<tr >
<td>Name</td>
<td>Quantity</td>
<td class="d-none">Price</td>
<td style="width:10%">Actions</td>
</tr>
<?php
while($res = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$res['name']."</td>";
echo "<td>".$res['qty']."</td>";
echo "<td class=\"d-none\">".$res['price']."</td>";
echo "<td><a href=\"edit.php?id=$res[id]\"><i class='fa fa-pen'></i></a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash'></i></a></td>";
}
?>
</table>
</body>
</html>