<?php
session_start();
if(!isset($_SESSION['valid'])) {die("Invalid session");}
include("/home/smartlis/public_html/dashboard/cred.php");
$_SESSION['id'] = intval($_SESSION['id']);
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
$sql = "SELECT * FROM login WHERE id=" . $_SESSION['id']; 
$users = $dbh->query($sql);
foreach ($users as $row) { 
  // echo $row['financePlan'];
  if(!empty($row['financePlan'])) {
    $financePlan =decrypt($row['financePlan']);
  }
  else {
    $financePlan = "none";
  }
}
?>
<style>
  .center .card p:not(.override_center) {margin-bottom: 20px;text-align:left}
  .center .card p:not(.override_center) span {cursor:auto;pointer-events:none}
  .card {width:100%}
  .card.selected {box-shadow:  0px 0px 0px 2px inset #1976d2;pointer-events:none;border-radius:4px;border-color:#1976d2!important}
  input[type="checkbox"]:checked + label:after{
     border: 2px solid #fff!important;
  }
  @media only screen and (min-width: 600px) {
    .card {height: 300px;}
  }
</style>
<div class="container">
  <div class="center">
    <br><br>
    <h5><b>Set a goal.</b></h5>
    <p>Choose a finance plan below which you need the most help on. Smartlist will help you reach this goal!</p>

    <div class="row">
      <div class="col s12 m4">
        <div class="card waves-effect <?=($financePlan == 'short-term'?'selected':'');?>" onmousedown="selectPlan(this, 'short-term')">
          <div class="card-content">
            <p class="override_center">
              <b>Short-term</b><br>
              Easier to achieve. Won't help you in the long term
            </p>
            <br>
            <p>
              <label>
                <input type="checkbox" disabled checked/>
                <span>Helps you save money for things you want or need</span>
              </label>
            </p>
            <p>
              <label>
                <input type="checkbox" disabled checked/>
                <span>Stricter budget</span>
              </label>
            </p>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card waves-effect <?=($financePlan == 'medium-term'?'selected':'');?>" onmousedown="selectPlan(this, 'medium-term')">
          <div class="card-content">
            <p class="override_center">
              <b>Medium-term</b><br>
              Will help you boost your net worth for a while
            </p>
            <br>
            <p>
              <label>
                <input type="checkbox" disabled checked/>
                <span>Spend on weekends, save on weekdays</span>
              </label>
            </p>
            <p>
              <label>
                <input type="checkbox" disabled checked/>
                <span>Helps for funding higher education</span>
              </label>
            </p>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card waves-effect <?=($financePlan == 'long-term'?'selected':'');?>" onmousedown="selectPlan(this, 'long-term')">
          <div class="card-content">
            <p class="override_center">
              <b>Long-term</b><br>
              Harder to achieve. Will help you later
            </p>
            <br>
            <p>
              <label>
                <input type="checkbox" disabled checked/>
                <span>Helps for retirement</span>
              </label>
            </p>
            <p>
              <label>
                <input type="checkbox" disabled checked/>
                <span>Easier budget</span>
              </label>
            </p>
            <p>
              <label>
                <input type="checkbox" disabled checked/>
                <span>Save for something huge (such as a house, car, etc.)</span>
              </label>
            </p>
          </div>
        </div>
      </div>
      <div class="col s12">
        <div class="card <?=($financePlan == 'none'?'selected':'');?> <?=($financePlan == ''?'selected':'');?> waves-effect" onmousedown="selectPlan(this, '')" style="height: auto !important">
          <div class="card-content">
            <p class="override_center">
              <b>No plan</b><br>
              Smartlist will not help you reach your goal.
            </p>
          </div>
        </div>
      </div>
      <!--End row-->
    </div>

  </div>
</div>
<script>
function selectPlan(el,v) {
	if(document.querySelectorAll(".selected")) document.querySelectorAll(".selected").forEach(e=>e.classList.remove("selected"))
  
  el.classList.add("selected");
  $("#ajaxLoader").load("./user/finance/setFinancePlan.php?v="+v);
}
</script>