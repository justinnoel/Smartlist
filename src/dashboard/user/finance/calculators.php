<style>
.border-max {border-radius: 99999px!important;border:0!important}
.modal.bottom-sheet.finance__calculator {
  max-height: 100vh !important;
  min-height: 100vh !important;
  height: 100vh !important;
  width: 100vw !important
}
</style>
<div class="container">
  <div class="center">
  <br><br>
    <h3><b>Finance calculators <span class="new-badge" style="font-size: 15px;background: #aaa;color:var(--font-color);line-height: 20px!important;padding: 3px!important;display:inline-block;border-radius: 999px;">New!</span></b></h3>
    <a href="#_feedback" class="modal-trigger btn blue-grey darken-3 waves-effect waves-light btn-round">Request a calculator</a>
  </div>
  <div class="collection">
    <a href="#calculator__main" class="border-max modal-trigger waves-effect collection-item" onclick="calculatorFinance('loan')">
      <b>Loan calculator</b><br>
      Your monthly payment is what you pay to the lender each month to repay your loan. The amount you pay every month depends on the terms of your mortgage loan. 
    </a>
    <a href="#calculator__main" class="border-max modal-trigger waves-effect collection-item" onclick="calculatorFinance('future value')">
      <b>Future value</b><br>
      Future value (FV) is the value of a current asset at a future date based on an assumed rate of growth.
    </a>
    <a href="#calculator__main" class="border-max modal-trigger waves-effect collection-item" onclick="calculatorFinance('discount')">
      <b>Discount calculator</b><br>
      A deduction from the usual cost of something, typically given for prompt or advance payment or to a special category of buyers.
    </a>
    <a href="#calculator__main" class="border-max modal-trigger waves-effect collection-item" onclick="calculatorFinance('tax')">
      <b>Tax calculator</b><br>
      A tax is a compulsory financial charge or some other type of levy imposed on a taxpayer by a governmental organization in order to fund government spending and various public expenditures.
    </a>
  </div>
</div>

<div id="calculator__main" class="modal bottom-sheet finance__calculator">
<div id="calculator__results" class="finance__calculator modal modal-center waves-effect" style="padding: 20px!important;" onclick="$('#calculator__results').modal('close')">
<center>
<br><br>
      <h3 id="finance__calculator_res" style="margin-top: 10px;"></h3>
      <div id="finance__calculator_desc"></div>
<br><br>

    </center>
</div>

  <div class="modal-content">
    <div class="container">
    <nav class="blue-grey lighten-5 z-depth-0">
      <ul>
        <li><a class="btn btn-flat nav_scaleIconOnHover transparent waves-effect modal-close btn-floating"><i style="line-height: 40px!important" class="black-text material-icons">arrow_back</i></a></li>
      </ul>
    </nav>
    <br><br>
    <br><br>
    <div id="finance__calculator_app"></div>
    </div>
  </div>
</div>

<script>
  $(".finance__calculator").modal({
    dismissible: false,
    onOpenStart() {
      document.querySelector('meta[name="theme-color"]').setAttribute("content", (document.documentElement.classList.contains("_darkTheme") ? "#101010": "#cfd8dc"));
    },
    onCloseStart() {
      document.querySelector('meta[name="theme-color"]').setAttribute("content", (document.documentElement.classList.contains("_darkTheme") ? "#212121": user.themeTop));
    }
  });
  $('#calculator__results').modal({
    dismissible: false,
    onOpenStart() {
      document.querySelector('meta[name="theme-color"]').setAttribute("content", (document.documentElement.classList.contains("_darkTheme") ? "#101010": "#6c7073"));
    },
    onCloseStart() {
      document.querySelector('meta[name="theme-color"]').setAttribute("content", (document.documentElement.classList.contains("_darkTheme") ? "#212121": '#cfd8dc'));
    }
  })
  $(".finance__calculatorForm").submit(function(e) {
    e.preventDefault();
    return false;
  })
  function calculatorFinance(str) {
    var content;
    switch(str) {
      case "loan": content = `
      <h4><b>Loan calculator</b></h4>
      <form class="finance__calculatorForm">
        <div class="input-field input-border">
          <input id="finance__loan_amount" type="number">
          <label>Loan amount</label>
        </div>
        <div class="input-field input-border">
          <input id="finance__loan_percent" type="number">
          <label>Interest (percent)</label>
        </div>
        <div class="input-field input-border">
          <input id="finance__loan_time" type="number">
          <label>Loan time (in years)</label>
        </div>
        <div style="text-align:right"><button type="button" class="btn blue-grey darken-3 waves-effect waves-light btn-round" onclick="showCalcResults(getLoanMonthlyFromLoan( document.getElementById('finance__loan_amount').value, document.getElementById('finance__loan_percent').value, document.getElementById('finance__loan_time').value ), 'Monthly expenses on this loan')">Calculate <i class="material-icons right">calculate</i></button></div>
      </form>
      `; break;

      case "future value": content = `
      <h4><b>Future Value calculator</b></h4>
      <form class="finance__calculatorForm">
        <div class="input-field input-border">
          <input id="finance__fv_periods" type="number">
          <label># of periods</label>
        </div>
        <div class="input-field input-border">
          <input id="finance__fv_presentValue" type="number">
          <label>Present Value</label>
        </div>
        <div class="input-field input-border">
          <input id="finance__fv_rate" type="number">
          <label>Interest Rate</label>
        </div>
        <div style="text-align:right"><button type="button" class="btn blue-grey darken-3 waves-effect waves-light btn-round" onclick="showCalcResults(calculateFutureValue( document.getElementById('finance__fv_periods').value, document.getElementById('finance__fv_presentValue').value, document.getElementById('finance__fv_rate').value ), 'Your future value')">Calculate <i class="material-icons right">calculate</i></button></div>
      </form>
      `; break;

      case "discount": content = `
      <h4><b>Discount Calculator</b></h4>
      <form class="finance__calculatorForm">
        <div class="input-field input-border">
          <input id="finance__discount_percent" type="number">
          <label>% of discount</label>
        </div>
        <div class="input-field input-border">
          <input id="finance__discount_total" type="number">
          <label>Total price</label>
        </div>
        <div style="text-align:right"><button type="button" class="btn blue-grey darken-3 waves-effect waves-light btn-round" onclick="showCalcResults(getDiscount( document.getElementById('finance__discount_total').value, document.getElementById('finance__discount_percent').value) , 'Amount after discount')">Calculate <i class="material-icons right">calculate</i></button></div>
      </form>
      `; break;

      case "tax": content = `
      <h4><b>Tax Calculator</b></h4>
      <form class="finance__calculatorForm">
        <div class="input-field input-border">
          <input id="finance__tax_percent" type="number">
          <label>% of tax</label>
        </div>
        <div class="input-field input-border">
          <input id="finance__tax_total" type="number">
          <label>Total price</label>
        </div>
        <div style="text-align:right"><button type="button" class="btn blue-grey darken-3 waves-effect waves-light btn-round" onclick="showCalcResults(getTax( document.getElementById('finance__tax_total').value, document.getElementById('finance__tax_percent').value) , 'Amount after discount')">Calculate <i class="material-icons right">calculate</i></button></div>
      </form>
      `; break;
    }
    document.getElementById("finance__calculator_app").innerHTML = content
  }
  function showCalcResults(res, text) {
    $("#calculator__main").modal("open")
    $("#calculator__results").modal("open")
    document.getElementById("finance__calculator_res").innerHTML = `\$${res}`;
    document.getElementById("finance__calculator_desc").innerHTML = text+"<br>Click to close"
  }
</script>