<?php
include('../../cred.php');
session_start();
if(isset($_POST['submit'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql  and bind parameters
    $stmt = $conn->prepare("INSERT INTO roomnames (name, qty, price, login_id) 
      VALUES (:name, :quantity, :price, :sessid)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':quantity', $qty);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':sessid', $id);

    // insert a row
    $name = ($_POST['name']);
    $qty = ($_POST['icon']);
    $price = 1;
    $id = $_SESSION['id'];
    $stmt->execute();
    header("Location: https://smartlist.ga/dashboard");
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

  $conn = null;
}
?>

<div class="container">
  <form method="POST" action="https://smartlist.ga/dashboard/rooms/custom_room/add_room.php">
    <br><br>
    <div class="row">
      <div class="col s12">
        <h5>Create new room</h5>
        <div class="input-field input-border">
          <label>Room name</label>
          <input name="name" required autofocus autocomplete="off" type="text">
        </div>
        <p>Tip: Creating a room with the word "Bedroom" or "Bathroom" in it moves your room under the specified room!</p>
      </div>
      <div class="col s12">
        <input style="font-family: 'Material Icons Round';height: auto !important;font-size: 100px;text-align:center;border:0" placeholder="Choose icon..." value="label" required name="icon" readonly id="icon1"><br>
      </div>
      <div class="col s12 center">  <a class='dropdown-trigger btn blue-grey btn-largea waves-effect' href='#' data-target='dropdown1'>Change</a>
      </div>
    </div>  <!-- Dropdown Trigger -->
    <!-- Dropdown Structure -->
    <ul id='dropdown1' class='dropdown-content' style='min-width: 300px;margin-top: 10px;'>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">masks</i>masks <span class='badge new'></span></a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">label_outline</i>Default</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">kitchen</i>Kitchen</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">shower</i>Bathroom</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">dining</i>Dining Room</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">bedroom_parent</i>Master Bedroom</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">bedroom_baby</i>Baby Bedroom</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">bedroom_child</i>Children's Bedroom</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">living</i>Living Room</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">add_shopping_cart</i>Shopping Cart</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">attach_file</i>File</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">backup</i>Cloud</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_activity</i>Ticket</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_airport</i>Plane</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_atm</i>ATM</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_bar</i>Beverage</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_cafe</i>Cafe</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_car_wash</i>Car Wash</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_convenience_store</i>Store</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_dining</i>Dining room</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_drink</i>Beverage</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_florist</i>Flower</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_gas_station</i>Gas</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_grocery_store</i>Grocery Store</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_hospital</i>Medical supplies</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_hotel</i>Hotel</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_laundry_service</i>Laundry</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_library</i>Book (Library)</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_mall</i>Mall</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_movies</i>Movie</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_offer</i>Local Offer</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_pharmacy</i>Pharmacy</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_phone</i>Phone</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">local_pizza</i>Food</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">coronavirus</i>Coronavirus</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">cake</i>Cake</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">deck</i>Deck</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">domain</i>domain</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">fireplace</i>Fireplace</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">piano</i>Piano</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">sports_esports</i>sports_esports</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">sports_basketball</i>sports_basketball</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">sports_cricket</i>sports_cricket</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">sports_football</i>sports_football</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">sports_golf</i>sports_golf</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">sports_mma</i>sports_mma</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">backpack</i>backpack</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">cabin</i>cabin</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">beach_access</i>beach_access</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">cottage</i>cottage</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">tapas</i>tapas</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">engineering</i>engineering</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">kayaking</i>kayaking</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">kitesurfing</i>kitesurfing</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">outdoor_grill</i>outdoor_grill</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">public</i>public</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">hiking</i>hiking</a></li>
      <li><a href="javascript:void(0)" onclick="icon.value = this.innerHTML.value = this.getElementsByTagName('i')[0].innerHTML"><i class="material-icons">medication</i>medication</a></li>
    </ul>

    <button name="submit" class="btn blue-grey darken-3 waves-effect waves-light btn-round">Create</button>
  </form>
</div>
<script>
  $(document).ready(function(){
    $('.dropdown-trigger').dropdown();
  });
  var icon = document.getElementById('icon1');
</script>