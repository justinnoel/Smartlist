<br><br>
<div class="container">
  <form action="./user/finance/subscription_add.php" id="quickAddForm" method="POST">
    <div class="row">
      <div class="col s12">
        <h5>Add a subscription</h5>
        <p>Your subscriptions are NOT synced with anyone else</p>
      </div>
      <div class="col s12 m9">
        <div class="input-field input-border">
          <label>Subscription name</label>
          <input type="text" name="name" autocomplete="off" required onkeyup="savea(this)" id="s1">
        </div>
      </div>

      <div class="col s12 m3">
        <div class="input-field input-border">
          <label>Subscription price</label>
          <input type="number" name="price" autocomplete="off" required onkeyup="savea(this)" id="s2">
        </div>
      </div>
      <div class="col s12">

        <div class="input-field input-border">
          <label>Date of renewal</label>
          <input type="text" name="date" autocomplete="off" class="datepicker" onmousemove="savea(this)" id="s3">
        </div>

        <p>
          <label onclick="this.querySelector('input').focus()">
            <input class="with-gap" name="type" type="radio" value="monthly" required />
            <span>Monthly</span>
          </label>
          <br>
          <label onclick="this.querySelector('input').focus()">
            <input class="with-gap" name="type" type="radio" value="yearly" required />
            <span>Yearly</span>
          </label>
          <br>
          <label onclick="this.querySelector('input').focus()">
            <input class="with-gap" name="type" type="radio" value="weekly" required />
            <span>Weekly</span>
          </label>
        </p>    

        <p>
          <label onclick="this.querySelector('input').focus()">
            <input class="with-gap" name="paymentType" type="radio" value="bill" required />
            <span>Bill</span>
          </label>
          <br>
          <label onclick="this.querySelector('input').focus()">
            <input class="with-gap" name="paymentType" type="radio" value="payment" required />
            <span>Payment</span>
          </label>
          <br>
          <label onclick="this.querySelector('input').focus()">
            <input class="with-gap" name="paymentType" type="radio" value="subscription" required />
            <span>Subscription</span>
          </label>
        </p>    
        <button class="btn blue-grey darken-3 waves-effect waves-light"><i class="material-icons left">add</i>Add</button>
      </div>
    </div>
  </form>
</div>

<script>
  M.Datepicker.init(document.querySelectorAll(".datepicker"), {
    format: "mm/dd/yyyy",
    autoClose: true
  });
  document.getElementById("quickAddForm").addEventListener("submit", (event) =>
    sendData(event)
      .then((res) => {
        window.location.hash="#/my-finances/"
        M.toast({html:data});
      })
  );
  function savea(e) {
    localStorage.setItem(e.id, e.value);
  } 
  document.getElementById('s1').value=localStorage.getItem('s1')||""
  document.getElementById('s2').value=localStorage.getItem('s2')||""
  document.getElementById('s3').value=localStorage.getItem('s3')||""
  document.getElementById('s2').focus()
  document.getElementById('s3').focus()
  document.getElementById('s1').focus()
</script>