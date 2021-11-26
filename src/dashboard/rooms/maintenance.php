<?php 
if(!isset($_GET['card'])) {
  $q = $_GET['q'];
  if(isset($q)) {?>
<br><br>
<style>
  .addToTask {
    line-height: 50px;
    border-radius: 3px;
    box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12) !important;
    padding: 0 20px;
    height: 50px;
  }
  .materialbox-overlay {
    z-index:999999999999999999999999999999999999999999999999999999999999 !important;
  }
  .addToTask .waves-ripple {
    transition-duration: .4s !important;
    transition-timing-function: ease-in-out !important;
  }
  .m_img {
    border-radius: 5px;
  }
</style>
<?php 
  }
  switch ($q) {
    case "Check fire extinguishers": 
      $items = array (
        1 => "Fire extinguisher",
      );
      $image = "https://assets.spe.org/dims4/default/b1d4e21/2147483647/strip/true/crop/500x250+0+0/resize/800x400!/quality/90/?url=http%3A%2F%2Fspe-brightspot.s3.amazonaws.com%2Fc4%2F02%2F3f6f4109bd02db0f466fc8b6273e%2Ffireextinguishers.jpg";
      break;
    case "Reseal stone surfaces": 
      $items = array (
        1 => "Countertop cleaner",
        2 => "Gloves",
        3 => "Paper Towels / Microfiber towels",
      );
      $image = "https://d1afoc0smheahm.cloudfront.net/images/library_checklists/reseal+stone+surfaces.jpg";
      break;
    case "Trim shrubs around air conditioning units": 
      $items = array (
        1 => "Pruner",
        2 => "Air Conditioning Unit",
        3 => "Trash bag",
      );
      $image = "https://kglandscape.com/wp-content/uploads/2017/12/holmstrup-arborvitae-1.jpg";
      break;
    case "Replace batteries in smoke detectors": 
      $items = array (
        1 => "Smoke Detector",
        2 => "Screwdriver (If required)",
        3 => "9-volt battery",
      );
      $image = "https://zionssecurity.com/wp-content/uploads/2015/07/Chirping-Smoke-Alarm-Battery-Cover.jpg";
      break;
    case "Steam clean carpets": 
      $items = array (
        1 => "Wet Vacuum Cleaner",
        2 => "Carpet Soap (Important: Make sure that this is suitable for your carpet)",
        3 => "Power Supply",
        4 => "Water",
      );
      $image = "https://www.thecarpetlegacy.com/wp-content/uploads/2018/05/What-is-a-Steam-Cleaner-and-How-Does-it-Clean-My-Carpets.jpg";
      break;
    case "Pressure wash decks, patios and driveways": 
      $items = array (
        1 => "Garden Hose",
        2 => "Pressure Wash Garden Hose extension",
        3 => "Water supply",
        4 => "Waterproof Shoes/Sandals",
      );
      $image = "https://washh.com/wp-content/uploads/2019/08/Patio-Pressure-Washing.jpg";
      break;
    case "Inspect attic for leaks during heavy rain": 
      $items = array (
        1 => "Flashlight",
        2 => "Attic",
      );
      $image = "https://sageroofingllc.com/wp-content/uploads/2019/07/inspect-roof-damage-after-storm.jpg";
      break;
    case "Flush water in hot water heaters": 
      $items = array (
        1 => "Water Heater",
        2 => "Hose",
      );
      $image = "https://content.artofmanliness.com/uploads//2016/05/connect_hose.jpg";
      break;
    case "Remove lint from dryer exhaust duct": 
      $items = array (
        1 => "Dryer Exhaust Duct",
      );
      $image = "https://www.tntdryervent.com/wp-content/uploads/2019/05/iStock-472032305-1080x675.jpg";
      break;
    case "Seal exterior wooden decks and balconies": 
      $items = array (
        1 => "Paint",
        2 => "Deck",
      );
      $image = "https://cdn.vox-cdn.com/thumbor/B4cYJJFhKBC4ZxeCczs6v3Y-tMA=/0x0:450x300/1200x800/filters:focal(189x114:261x186)/cdn.vox-cdn.com/uploads/chorus_image/image/65889339/deck_defense_x.0.jpg";
      break;
    case "Inspect automatic garage door safety shutoff": 
      $items = array (
        1 => "Flashlight",
      );
      $image = "https://artisandoorworks.com/wp-content/uploads/2020/08/Garage-Door-Rollers.jpg";
      break;
    case "Inspect heating and cooling systems": 
      $items = array (
        1 => "Flashlight",
      );
      $image = "https://octanecdn.com/pvhvaccom/hands-on-heat-pump-min.jpg";
      break;
    case "Clean your stove": 
      $items = array (
        1 => "Stove Cleaner",
        2 => "Soap",
        3 => "Brush",
      );
      $image = "https://scrubdaddy.com/media/page_photos/0000/photo_39.normal.jpg";
      break;
    case "Clean couches": 
      $items = array (
        1 => "Vacuum (Optional)",
      );
      $image = "https://rescuemytimecleaningservice.com/wp-content/uploads/2020/08/homemade-upholstery-cleaner.jpeg";
      break;
    case "Clean your car": 
      $items = array (
        1 => "Car",
        2 => "Brush",
        3 => "Water",
        4 => "Garden Hose",
        5 => "Clorox Wipes",
        6 => "Soap",
        7 => "Micro Fiber towels",
      );
      $image = "https://rescuemytimecleaningservice.com/wp-content/uploads/2020/08/homemade-upholstery-cleaner.jpeg";
      break;
    case "Inspect your pipes": 
      $items = array (
        1 => "Flashlight",
        2 => "Tools (If required)",
      );
      $image = "https://theensign.org/wordpress/wp-content/uploads/2018/06/shutterstock_499516039-web.jpg";
      break;
    case "Clean shower heads": 
      $items = array (
        1 => "Vinegar",
        2 => "Shower Heads",
      );
      $image = "https://accurateleaklocators.com/wp-content/uploads/2020/09/1_ZqoyUq7L047nEuPR7ks0JA.png";
      break;
    case "Remove expired food": 
      $items = array (
        1 => "Trash Bag",
      );
      $image = "https://s.abcnews.com/images/Lifestyle/ht_expired_supermarket_01_mm_150624_16x9_992.jpg";
      break;
    case "Clean your pantry": 
      $items = array (
        1 => "Pantry",
        2 => "Handheld vacuum",
      );
      $image = "https://communityactionprovo.org/wp-content/uploads/2020/03/spring-clean-your-pantry.png";
      break;
    case "Clean your fridge": 
      $items = array (
        1 => "Clorox Wipes",
        2 => "Hot Water",
      );
      $image = "https://reviewed-com-res.cloudinary.com/image/fetch/s--PpqOvJ2N--/b_white,c_limit,cs_srgb,f_auto,fl_progressive.strip_profile,g_center,q_auto,w_972/https://reviewed-production.s3.amazonaws.com/1560196726000/GettyImages-484299850.jpg";
      break;
    case "Clean your shelves/countertops": 
      $items = array (
        1 => "Clorox Wipes",
        2 => "Handheld vacuum",
      );
      $image = "https://www.fermag.com/wp-content/uploads/2020/06/Shelf-Cleaning.jpg";
      break;
    case "Clean your dining table": 
      $items = array (
        1 => "Clorox Wipes",
        2 => "Handheld vacuum",
      );
      $image = "https://cdn.apartmenttherapy.info/image/upload/f_auto,q_auto:eco/k%2FPhoto%2FLifestyle%2F2020-04-How-to-Maintain-a-Wooden-Dining-Table%2FHow-to-Maintain-a-Wooden-Dining-Table722";
      break;
    case "Clean your rooms": 
      $items = array (
        1 => "Clorox Wipes",
        2 => "Vacuum cleaner",
        3 => "Empty Containers",
      );
      $image = "https://hips.hearstapps.com/hbu.h-cdn.co/assets/cm/15/04/54c131321d66f_-_hbx-cleaning-habits-de-s2.jpg";
      break;
    case "Spring Cleaning!": 
      $items = array (
        1 => "Clorox Wipes",
        2 => "Vacuum cleaner",
        3 => "Empty Containers",
        4 => "Duster",
        5 => "Broom",
      );
      $image = "https://pennstatehealthnews.org/wp-content/uploads/2019/05/050119-spring-clean.jpg";
      break;
    case "Clean out your mail": 
      $items = array (
        1 => "Trash Cover",
      );
      $image = "https://blog.jmwhite.co.uk/wp-content/uploads/2014/10/windows8mailapp.jpg";
      break;
    case "Check AC/Heat filter": 
      $items = array (
        1 => "Duster",
      );
      $image = "https://aplusairconditioning.com/wp-content/uploads/2019/02/where-is-my-AC-air-filter-located.jpg";
      break;
    case "Check Sprinklers": 
      $items = array (
        1 => "Sprinkler Cleaning Toolkit",
      );
      $image = "https://landscapingthegulfcoast.com/wp-content/uploads/2019/12/sprinkler_winter.jpg";
      break;
    case "Descale Coffee maker": 
      $items = array (
        1 => "Coffee Maker",
      );
      $image = "https://www.mollymaid.com/images/blog/Vinegar-vs-Descaler-9-17.jpg";
      break;
    case "Dust your TV": 
      $items = array (
        1 => "Sprinkler Cleaning Toolkit",
      );
      $image = "https://sbly-web-prod-shareably.netdna-ssl.com/wp-content/uploads/2018/05/01091250/how-to-clean-a-flat-screen-television-featured.jpg";
      break;
    case "Make your beds": 
      $items = array (
        1 => "Beds",
      );
      $image = "https://crownlinen.com/wp-content/uploads/2018/08/hotel-bed-making.jpg";
      break;
    case "Do your laundry": 
      $items = array (
        1 => "Laundry Basket",
      );
      $image = "https://cf.ltkcdn.net/cleaning/images/orig/257114-1600x1030-how-properly-do-laundry.jpg";
      break;
    case "Check and Vacuum floors": 
      $items = array (
        1 => "Vacuum cleaner",
      );
      $image = "https://images.squarespace-cdn.com/content/v1/586d72eacd0f6848a35cf3b9/1571361411554-8ZJ1X9K78X8Y6S2YWVOR/ke17ZwdGBToddI8pDm48kLkXF2pIyv_F2eUT9F60jBl7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z4YTzHvnKhyp6Da-NYroOW3ZGjoBKy3azqku80C789l0iyqMbMesKd95J-X4EagrgU9L3Sa3U8cogeb0tjXbfawd0urKshkc5MgdBeJmALQKw/IMG_20180925_0901086.jpg?format=2500w";
      break;
    case "Clean your gutters": 
      $items = array (
        1 => "Ladder",
      );
      $image = "https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/cleaning-gutters-during-the-summer-royalty-free-image-485292592-1541689661.jpg";
      break;
    case "Clean your windows": 
      $items = array (
        1 => "Glass Cleaner",
        2 => "Microfiber cloth"
      );
      $image = "https://empire-s3-production.bobvila.com/articles/wp-content/uploads/2019/07/Best_Glass_Cleaner-650x433.jpg";
      break;
    case "Prune your plants": 
      $items = array (
        1 => "Ladder (Optional)",
      );
      $image = "https://chopmytree.com/wp-content/uploads/2015/06/tree-pruning.jpg";
      break;
  }
?>
<div class="container">
  <div class="row">
    <div class="col s12 m6">
    <br><br>
      <h4><b><?php echo htmlspecialchars($q); ?></b></h4>
      <h6>Recommended Month: <?php echo date('M'); ?></h6>
      <br>
      <button onclick="$('#app').load('./rooms/maintenance.php?card')" class="btn red darken-3 waves-effect waves-light btn-round">Cancel</button>
      <button onclick="$('#ajaxLoader').load('./rooms/todo_add.php?q=<?=urlencode($q);?>')" class="btn-round btn blue-grey darken-3 waves-effect waves-light"><i class="material-icons left">add</i>Add to todo list</button>
      <br><br>
    </div>
    <div class="col s12 m6">
      <img class="materialboxed"  src="<?php echo $image; ?>" class="m_img materialboxed" width="100%">
    </div>
  </div>
  <div style="padding: 10px">
    <h5>Items Required</h5>
    <?php
  foreach($items as $item) { 
    ?>
    <label>
      <input type="checkbox" />
      <span><?=$item?></span>
    </label> 
    <br>
    <?php
    } 
    ?>
  </div>
</div>
<script>
$('.materialboxed').materialbox({
    onOpenStart() {
        document.querySelector('meta[name="theme-color"]') .setAttribute("content", "#292929");
    },
    onCloseStart() {
        document.querySelector('meta[name="theme-color"]') .setAttribute("content", user.themeTop);
    }
});</script>
<?php } else {
  $month = date('M');  
?>
<style>.mcard {overflow:hidden}.mcard span { font-weight: bold !important } .mcard .card-image img {transition: all .05s !important}.mcard .card-image img.active {border-radius: 20px;} .mcard .card-image img:not(.active) { height: 250px !important; object-fit: cover; }</style>
<div class="container">
  <?php if($month !== 'Jul') { ?>
  <br><br>
  <h5><b>Maintenance for this month</b></h5>
  <p>Content Refreshes every month. Click on a card to view details and items required</p>
  <?php } ?>
  <?php switch($month) {
    case "Jan":?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://sageroofingllc.com/wp-content/uploads/2019/07/inspect-roof-damage-after-storm.jpg"> </div> <div class="card-content"> <span class="card-title">Inspect attic for leaks during heavy rain</span> <p>Inspect attic for leaks during heavy rain</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Inspect attic for leaks during heavy rain'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://content.artofmanliness.com/uploads//2016/05/connect_hose.jpg"> </div> <div class="card-content"> <span class="card-title">Flush water in hot water heaters</span> <p>Flush water in hot water heaters</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Flush water in hot water heaters'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://www.tntdryervent.com/wp-content/uploads/2019/05/iStock-472032305-1080x675.jpg"> </div> <div class="card-content"> <span class="card-title">Remove lint from dryer exhaust duct</span> <p>Remove lint from dryer exhaust duct to prevent accidental fires</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Trim shrubs around air conditioning units'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://cdn.vox-cdn.com/thumbor/B4cYJJFhKBC4ZxeCczs6v3Y-tMA=/0x0:450x300/1200x800/filters:focal(189x114:261x186)/cdn.vox-cdn.com/uploads/chorus_image/image/65889339/deck_defense_x.0.jpg"> </div> <div class="card-content"> <span class="card-title">Seal exterior wooden decks and balconies</span> <p>Paint outdoor wood balconies/decks</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Seal exterior wooden decks and balconies'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://artisandoorworks.com/wp-content/uploads/2020/08/Garage-Door-Rollers.jpg"> </div> <div class="card-content"> <span class="card-title">Inspect automatic garage door safety shutoff</span> <p>Inspect the safety sensor on your garage door works</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Inspect automatic garage door safety shutoff'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://octanecdn.com/pvhvaccom/hands-on-heat-pump-min.jpg"> </div> <div class="card-content"> <span class="card-title">Inspect heating and cooling systems</span> <p>Make sure your AC and Heaters work. </p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Inspect heating and cooling systems'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "Feb":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://scrubdaddy.com/media/page_photos/0000/photo_39.normal.jpg"> </div> <div class="card-content"> <span class="card-title">Clean your stove</span> <p>Clean your stove. Make sure to avoid filling water in small crevices. </p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your stove'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://rescuemytimecleaningservice.com/wp-content/uploads/2020/08/homemade-upholstery-cleaner.jpeg"> </div> <div class="card-content"> <span class="card-title">Clean couches</span> <p>Clean your couches. Wash any throws and pillow cases</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Clean couches'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://images.squarespace-cdn.com/content/v1/57bf69aa9f7456b465a1ef78/1552972248385-JLADWPA6BC7YCPRKRFM4/ke17ZwdGBToddI8pDm48kLkXF2pIyv_F2eUT9F60jBl7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z4YTzHvnKhyp6Da-NYroOW3ZGjoBKy3azqku80C789l0iyqMbMesKd95J-X4EagrgU9L3Sa3U8cogeb0tjXbfawd0urKshkc5MgdBeJmALQKw/service-page-mobile-car-wash-2500x1667.jpg?format=2500w"> </div> <div class="card-content"> <span class="card-title">Clean your car</span> <p>Take your car to a car wash!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your car'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://theensign.org/wordpress/wp-content/uploads/2018/06/shutterstock_499516039-web.jpg"> </div> <div class="card-content"> <span class="card-title">Inspect your pipes</span> <p>Inspect your pipes. Make sure nothing is leaking!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Inspect your pipes'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://accurateleaklocators.com/wp-content/uploads/2020/09/1_ZqoyUq7L047nEuPR7ks0JA.png"> </div> <div class="card-content"> <span class="card-title">Clean shower heads</span> <p>Clean shower heads using vinegar. Make sure there isn't any hair/soap on it</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean shower heads'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://washh.com/wp-content/uploads/2019/08/Patio-Pressure-Washing.jpg"> </div> <div class="card-content"> <span class="card-title">Pressure wash decks, patios and driveways</span> <p>Cover all areas of the driveway. Wash all the dirt</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Pressure wash decks, patios and driveways'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "Mar":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://s.abcnews.com/images/Lifestyle/ht_expired_supermarket_01_mm_150624_16x9_992.jpg"> </div> <div class="card-content"> <span class="card-title">Remove expired food</span> <p>Remove any stale/expired food</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Remove expired food'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://communityactionprovo.org/wp-content/uploads/2020/03/spring-clean-your-pantry.png"> </div> <div class="card-content"> <span class="card-title">Clean your pantry</span> <p>Organize your entire pantry!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Clean your pantry'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://reviewed-com-res.cloudinary.com/image/fetch/s--PpqOvJ2N--/b_white,c_limit,cs_srgb,f_auto,fl_progressive.strip_profile,g_center,q_auto,w_972/https://reviewed-production.s3.amazonaws.com/1560196726000/GettyImages-484299850.jpg"> </div> <div class="card-content"> <span class="card-title">Clean your fridge</span> <p>Make sure to clean your entire fridge!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your fridge'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://www.fermag.com/wp-content/uploads/2020/06/Shelf-Cleaning.jpg"> </div> <div class="card-content"> <span class="card-title">Clean your shelves/countertops</span> <p>Wipe down shelves and countertops</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Inspect your pipes'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://cdn.apartmenttherapy.info/image/upload/f_auto,q_auto:eco/k%2FPhoto%2FLifestyle%2F2020-04-How-to-Maintain-a-Wooden-Dining-Table%2FHow-to-Maintain-a-Wooden-Dining-Table722"> </div> <div class="card-content"> <span class="card-title">Clean your dining table</span> <p>Remove any food stains</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your dining table'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://hips.hearstapps.com/hbu.h-cdn.co/assets/cm/15/04/54c131321d66f_-_hbx-cleaning-habits-de-s2.jpg"> </div> <div class="card-content"> <span class="card-title">Clean your rooms</span> <p>Scan for any dust and debris in your rooms</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your rooms'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "Apr":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://pennstatehealthnews.org/wp-content/uploads/2019/05/050119-spring-clean.jpg"> </div> <div class="card-content"> <span class="card-title">Spring cleaning!</span> <p>Make sure to check every room in your home and clean out the clutter!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Spring Cleaning!'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://blog.jmwhite.co.uk/wp-content/uploads/2014/10/windows8mailapp.jpg"> </div> <div class="card-content"> <span class="card-title">Clean out your mail</span> <p>Throw out any junk mail that is unnecessary</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Clean out your mail'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://aplusairconditioning.com/wp-content/uploads/2019/02/where-is-my-AC-air-filter-located.jpg"> </div> <div class="card-content"> <span class="card-title">Check AC/heat filter</span> <p>Make sure your AC filters are working properly</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Check AC/Heat filter'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://landscapingthegulfcoast.com/wp-content/uploads/2019/12/sprinkler_winter.jpg"> </div> <div class="card-content"> <span class="card-title">Check Sprinklers</span> <p>Make sure all your sprinklers are fully functional. </p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Check Sprinklers'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://sbly-web-prod-shareably.netdna-ssl.com/wp-content/uploads/2018/05/01091250/how-to-clean-a-flat-screen-television-featured.jpg"> </div> <div class="card-content"> <span class="card-title">Dust your TV</span> <p>You wouldn't want dust on your TV when you're watching your favorite show!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Dust your TV'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://www.mollymaid.com/images/blog/Vinegar-vs-Descaler-9-17.jpg"> </div> <div class="card-content"> <span class="card-title">Descale Coffee maker</span> <p>Make sure you descale your coffee maker every year!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Descale Coffee maker'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "May":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://d1afoc0smheahm.cloudfront.net/images/library_checklists/reseal+stone+surfaces.jpg"> </div> <div class="card-content"> <span class="card-title">Reseal stone surfaces</span> <p>Reseal the countertops in your home</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Reseal stone surfaces'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://assets.spe.org/dims4/default/b1d4e21/2147483647/strip/true/crop/500x250+0+0/resize/800x400!/quality/90/?url=http%3A%2F%2Fspe-brightspot.s3.amazonaws.com%2Fc4%2F02%2F3f6f4109bd02db0f466fc8b6273e%2Ffireextinguishers.jpg"> </div> <div class="card-content"> <span class="card-title">Check fire extinguishers pressure</span> <p>Make sure the pointer is within the green range</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Check fire extinguishers'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://kglandscape.com/wp-content/uploads/2017/12/holmstrup-arborvitae-1.jpg"> </div> <div class="card-content"> <span class="card-title">Trim shrubs around air conditioning units</span> <p>Don't let any overgrown shrubs come into contact with the air conditioning unit.</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Trim shrubs around air conditioning units'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://zionssecurity.com/wp-content/uploads/2015/07/Chirping-Smoke-Alarm-Battery-Cover.jpg"> </div> <div class="card-content"> <span class="card-title">Replace batteries in smoke detectors</span> <p>Don't want to hear an annoying chirping sound???</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Replace batteries in smoke detectors'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://www.thecarpetlegacy.com/wp-content/uploads/2018/05/What-is-a-Steam-Cleaner-and-How-Does-it-Clean-My-Carpets.jpg"> </div> <div class="card-content"> <span class="card-title">Steam clean carpets</span> <p>Reseal the countertops in your home</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Steam clean carpets'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://washh.com/wp-content/uploads/2019/08/Patio-Pressure-Washing.jpg"> </div> <div class="card-content"> <span class="card-title">Pressure wash decks, patios and driveways</span> <p>Cover all areas of the driveway. Wash all the dirt</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Pressure wash decks, patios and driveways'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "Jun":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://sageroofingllc.com/wp-content/uploads/2019/07/inspect-roof-damage-after-storm.jpg"> </div> <div class="card-content"> <span class="card-title">Inspect attic for leaks during heavy rain</span> <p>Inspect attic for leaks during heavy rain</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Inspect attic for leaks during heavy rain'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://content.artofmanliness.com/uploads//2016/05/connect_hose.jpg"> </div> <div class="card-content"> <span class="card-title">Flush water in hot water heaters</span> <p>Flush water in hot water heaters</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Flush water in hot water heaters'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://www.tntdryervent.com/wp-content/uploads/2019/05/iStock-472032305-1080x675.jpg"> </div> <div class="card-content"> <span class="card-title">Remove lint from dryer exhaust duct</span> <p>Remove lint from dryer exhaust duct to prevent accidental fires</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Trim shrubs around air conditioning units'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://cdn.vox-cdn.com/thumbor/B4cYJJFhKBC4ZxeCczs6v3Y-tMA=/0x0:450x300/1200x800/filters:focal(189x114:261x186)/cdn.vox-cdn.com/uploads/chorus_image/image/65889339/deck_defense_x.0.jpg"> </div> <div class="card-content"> <span class="card-title">Seal exterior wooden decks and balconies</span> <p>Paint outdoor wood balconies/decks</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Seal exterior wooden decks and balconies'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://artisandoorworks.com/wp-content/uploads/2020/08/Garage-Door-Rollers.jpg"> </div> <div class="card-content"> <span class="card-title">Inspect automatic garage door safety shutoff</span> <p>Inspect the safety sensor on your garage door works</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Inspect automatic garage door safety shutoff'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://octanecdn.com/pvhvaccom/hands-on-heat-pump-min.jpg"> </div> <div class="card-content"> <span class="card-title">Inspect heating and cooling systems</span> <p>Make sure your AC and Heaters work. </p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Inspect heating and cooling systems'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "Jul":
  ?>
  <h3>Break Time!</h3> <p>You've cleaned you're entire home! Sit back and relax!</p>
  <?php
      break;
    case "Aug":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://crownlinen.com/wp-content/uploads/2018/08/hotel-bed-making.jpg"> </div> <div class="card-content"> <span class="card-title">Make your beds</span> <p>Wash and fold your blankets</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Make your beds'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://cf.ltkcdn.net/cleaning/images/orig/257114-1600x1030-how-properly-do-laundry.jpg"> </div> <div class="card-content"> <span class="card-title">Do your laundry</span> <p>Fold the clothes in your laundry room</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Do your laundry'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://images.squarespace-cdn.com/content/v1/586d72eacd0f6848a35cf3b9/1571361411554-8ZJ1X9K78X8Y6S2YWVOR/ke17ZwdGBToddI8pDm48kLkXF2pIyv_F2eUT9F60jBl7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z4YTzHvnKhyp6Da-NYroOW3ZGjoBKy3azqku80C789l0iyqMbMesKd95J-X4EagrgU9L3Sa3U8cogeb0tjXbfawd0urKshkc5MgdBeJmALQKw/IMG_20180925_0901086.jpg?format=2500w"> </div> <div class="card-content"> <span class="card-title">Check and Vacuum floors</span> <p>Make sure that there aren't any loose tiles in your flooring</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Check and Vacuum floors'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/cleaning-gutters-during-the-summer-royalty-free-image-485292592-1541689661.jpg"> </div> <div class="card-content"> <span class="card-title">Clean your gutters</span> <p>Remove any dirt from your gutters</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Clean your gutters'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://chopmytree.com/wp-content/uploads/2015/06/tree-pruning.jpg"> </div> <div class="card-content"> <span class="card-title">Prune your plants</span> <p>Remove any excess branches or dying branches. Let them grow the upcoming months</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Prune your plants'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://www.mollymaid.com/images/blog/Vinegar-vs-Descaler-9-17.jpg"> </div> <div class="card-content"> <span class="card-title">Descale Coffee maker</span> <p>Make sure you descale your coffee maker every year!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Descale Coffee maker'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "Sep":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://s.abcnews.com/images/Lifestyle/ht_expired_supermarket_01_mm_150624_16x9_992.jpg"> </div> <div class="card-content"> <span class="card-title">Remove expired food</span> <p>Remove any stale/expired food</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Remove expired food'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://communityactionprovo.org/wp-content/uploads/2020/03/spring-clean-your-pantry.png"> </div> <div class="card-content"> <span class="card-title">Clean your pantry</span> <p>Organize your entire pantry!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Clean your pantry'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://reviewed-com-res.cloudinary.com/image/fetch/s--PpqOvJ2N--/b_white,c_limit,cs_srgb,f_auto,fl_progressive.strip_profile,g_center,q_auto,w_972/https://reviewed-production.s3.amazonaws.com/1560196726000/GettyImages-484299850.jpg"> </div> <div class="card-content"> <span class="card-title">Clean your fridge</span> <p>Make sure to clean your entire fridge!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your fridge'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://www.fermag.com/wp-content/uploads/2020/06/Shelf-Cleaning.jpg"> </div> <div class="card-content"> <span class="card-title">Clean your shelves/countertops</span> <p>Wipe down shelves and countertops</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Inspect your pipes'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://cdn.apartmenttherapy.info/image/upload/f_auto,q_auto:eco/k%2FPhoto%2FLifestyle%2F2020-04-How-to-Maintain-a-Wooden-Dining-Table%2FHow-to-Maintain-a-Wooden-Dining-Table722"> </div> <div class="card-content"> <span class="card-title">Clean your dining table</span> <p>Remove any food stains</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your dining table'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://hips.hearstapps.com/hbu.h-cdn.co/assets/cm/15/04/54c131321d66f_-_hbx-cleaning-habits-de-s2.jpg"> </div> <div class="card-content"> <span class="card-title">Clean your rooms</span> <p>Scan for any dust and debris in your rooms</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your rooms'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "Oct":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://d1afoc0smheahm.cloudfront.net/images/library_checklists/reseal+stone+surfaces.jpg"> </div> <div class="card-content"> <span class="card-title">Reseal stone surfaces</span> <p>Reseal the countertops in your home</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Reseal stone surfaces'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://assets.spe.org/dims4/default/b1d4e21/2147483647/strip/true/crop/500x250+0+0/resize/800x400!/quality/90/?url=http%3A%2F%2Fspe-brightspot.s3.amazonaws.com%2Fc4%2F02%2F3f6f4109bd02db0f466fc8b6273e%2Ffireextinguishers.jpg"> </div> <div class="card-content"> <span class="card-title">Check fire extinguishers pressure</span> <p>Make sure the pointer is within the green range</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Check fire extinguishers'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://kglandscape.com/wp-content/uploads/2017/12/holmstrup-arborvitae-1.jpg"> </div> <div class="card-content"> <span class="card-title">Trim shrubs around air conditioning units</span> <p>Don't let any overgrown shrubs come into contact with the air conditioning unit.</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Trim shrubs around air conditioning units'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://zionssecurity.com/wp-content/uploads/2015/07/Chirping-Smoke-Alarm-Battery-Cover.jpg"> </div> <div class="card-content"> <span class="card-title">Replace batteries in smoke detectors</span> <p>Don't want to hear an annoying chirping sound???</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Replace batteries in smoke detectors'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://www.thecarpetlegacy.com/wp-content/uploads/2018/05/What-is-a-Steam-Cleaner-and-How-Does-it-Clean-My-Carpets.jpg"> </div> <div class="card-content"> <span class="card-title">Steam clean carpets</span> <p>Reseal the countertops in your home</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Steam clean carpets'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://washh.com/wp-content/uploads/2019/08/Patio-Pressure-Washing.jpg"> </div> <div class="card-content"> <span class="card-title">Pressure wash decks, patios and driveways</span> <p>Cover all areas of the driveway. Wash all the dirt</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Pressure wash decks, patios and driveways'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "Nov":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://scrubdaddy.com/media/page_photos/0000/photo_39.normal.jpg"> </div> <div class="card-content"> <span class="card-title">Clean your stove</span> <p>Clean your stove. Make sure to avoid filling water in small crevices. </p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your stove'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://rescuemytimecleaningservice.com/wp-content/uploads/2020/08/homemade-upholstery-cleaner.jpeg"> </div> <div class="card-content"> <span class="card-title">Clean couches</span> <p>Clean your couches. Wash any throws and pillow cases</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Clean couches'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://images.squarespace-cdn.com/content/v1/57bf69aa9f7456b465a1ef78/1552972248385-JLADWPA6BC7YCPRKRFM4/ke17ZwdGBToddI8pDm48kLkXF2pIyv_F2eUT9F60jBl7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z4YTzHvnKhyp6Da-NYroOW3ZGjoBKy3azqku80C789l0iyqMbMesKd95J-X4EagrgU9L3Sa3U8cogeb0tjXbfawd0urKshkc5MgdBeJmALQKw/service-page-mobile-car-wash-2500x1667.jpg?format=2500w"> </div> <div class="card-content"> <span class="card-title">Clean your car</span> <p>Take your car to a car wash!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean your car'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://theensign.org/wordpress/wp-content/uploads/2018/06/shutterstock_499516039-web.jpg"> </div> <div class="card-content"> <span class="card-title">Inspect your pipes</span> <p>Inspect your pipes. Make sure nothing is leaking!</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Inspect your pipes'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://accurateleaklocators.com/wp-content/uploads/2020/09/1_ZqoyUq7L047nEuPR7ks0JA.png"> </div> <div class="card-content"> <span class="card-title">Clean shower heads</span> <p>Clean shower heads using vinegar. Make sure there isn't any hair/soap on it</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Clean shower heads'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://washh.com/wp-content/uploads/2019/08/Patio-Pressure-Washing.jpg"> </div> <div class="card-content"> <span class="card-title">Pressure wash decks, patios and driveways</span> <p>Cover all areas of the driveway. Wash all the dirt</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Pressure wash decks, patios and driveways'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    case "Dec":
  ?>
  <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://d1afoc0smheahm.cloudfront.net/images/library_checklists/reseal+stone+surfaces.jpg"> </div> <div class="card-content"> <span class="card-title">Reseal stone surfaces</span> <p>Reseal the countertops in your home</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Reseal stone surfaces'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://assets.spe.org/dims4/default/b1d4e21/2147483647/strip/true/crop/500x250+0+0/resize/800x400!/quality/90/?url=http%3A%2F%2Fspe-brightspot.s3.amazonaws.com%2Fc4%2F02%2F3f6f4109bd02db0f466fc8b6273e%2Ffireextinguishers.jpg"> </div> <div class="card-content"> <span class="card-title">Check fire extinguishers pressure</span> <p>Make sure the pointer is within the green range</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Check fire extinguishers'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://kglandscape.com/wp-content/uploads/2017/12/holmstrup-arborvitae-1.jpg"> </div> <div class="card-content"> <span class="card-title">Trim shrubs around air conditioning units</span> <p>Don't let any overgrown shrubs come into contact with the air conditioning unit.</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Trim shrubs around air conditioning units'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://zionssecurity.com/wp-content/uploads/2015/07/Chirping-Smoke-Alarm-Battery-Cover.jpg"> </div> <div class="card-content"> <span class="card-title">Replace batteries in smoke detectors</span> <p>Don't want to hear an annoying chirping sound???</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q=' + encodeURI('Replace batteries in smoke detectors'))">View More</a> </div> </div> </div> </div> <div class="row"> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://www.thecarpetlegacy.com/wp-content/uploads/2018/05/What-is-a-Steam-Cleaner-and-How-Does-it-Clean-My-Carpets.jpg"> </div> <div class="card-content"> <span class="card-title">Steam clean carpets</span> <p>Reseal the countertops in your home</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Steam clean carpets'))">View More</a> </div> </div> </div> <div class="col s12 m6"> <div class="card mcard"> <div class="card-image"> <img class="materialboxed"  src="https://washh.com/wp-content/uploads/2019/08/Patio-Pressure-Washing.jpg"> </div> <div class="card-content"> <span class="card-title">Pressure wash decks, patios and driveways</span> <p>Cover all areas of the driveway. Wash all the dirt</p> </div> <div class="card-action"> <a class="btn-round btn btn-flat waves-effect" href="javascript:void(0)" onclick="$('#app').load('./rooms/maintenance.php?q='+encodeURI('Pressure wash decks, patios and driveways'))">View More</a> </div> </div> </div> </div>
  <?php
      break;
    default: echo "Invalid Month"; break;
  }?>
</div>
<script>$('.materialboxed').materialbox({
    onOpenStart() {
        document.querySelector('meta[name="theme-color"]') .setAttribute("content", "#292929");
    },
    onCloseStart() {
        document.querySelector('meta[name="theme-color"]') .setAttribute("content", user.themeTop);
    }
});</script>
<?php } ?>