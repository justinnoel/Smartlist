<!DOCTYPE html>
<html>
  <head>
    <title>Smartlist Security</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style>
      * {
        font-family: 'Nunito', sans-serif;
      }
    </style>
  </head>
  <body>
    <div class="indigo white-text darken-4" style="padding: 10px;">
      <div class='container center'>
        <div class='container'>
          <div class='container'>
            <img src="https://i.ibb.co/3mwwpnf/vecteezy-Cyber-Security-Illustration-ma1020.png" width="100%">
            <h1>
              <b>Security</b>
            </h1>
            <p>
              At Smartlist, we value your privacy. We also strongly believe in transparency, and knowledge should be available to all. Read this entire page to know what preventive measures we take, and how we use your data.
            </p>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <h3>
            <b>End-to-End encrypted</b>
          </h3>
          <p>
            At Smartlist, your privacy is of the highest importance. All your rooms, accounts, items, tasks, etc. are encrypted. <br>
            <b>What is "Encryption"?</b><br>
            Encryption is the process of taking plain text, like a text message or email, and scrambling it into an unreadable format — called “cipher text.” This helps protect the confidentiality of digital data either stored on computer systems or transmitted through a network like the internet. (Source: Norton)</p>
        </div>
        <div class="col s12 m6">
          <img src="https://thumbs.dreamstime.com/b/data-encryption-icon-tablet-pc-laptop-vector-illustration-red-blue-white-background-88758144.jpg" width="100%">
        </div>
      </div>
      <div class="row">
        <div class="col s12 m6">
          <div class='container'>
            <img src="https://i.ibb.co/Fg0Nswk/pale-security.png" width="100%">
          </div>
        </div>
        <div class="col s12 m6">
          <h3>
            <b>HSTS enabled</b>
          </h3>
          <p>
            If a website accepts a connection through HTTP and redirects to HTTPS, visitors may initially communicate with the non-encrypted version of the site before being redirected, if, for example, the visitor types http://www.foo.com/ or even just foo.com. This creates an opportunity for a man-in-the-middle attack. The redirect could be exploited to direct visitors to a malicious site instead of the secure version of the original site.
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m6">
          <h3>
            <b>Up-to-date &amp; safe code</b>
          </h3>
          <p>
            We use up-to-date code, and also our code prevents injection attacks. <i>An injection attack is a malicious code injected in the network which fetched all the information from the database to the attacker. </i>
          </p>
        </div>
        <div class="col s12 m6">
          <div class='container'>
            <div class='container'>
              <img src="https://cdn.iconscout.com/icon/free/png-256/code-336-830581.png" width="100%">
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <div class="center">
        <h2>
          <b>What we do with your data</b>
        </h2>
        <div class="container">
        <div class="container">
          <canvas id="myChart"></canvas>
        </div>
        </div>
      </div>
    </div><br><br>
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    <script>
      Chart.defaults.global.legend.labels.usePointStyle = true;
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Storing it in our database for you to view', 'Analytics'],
          datasets: [{
            data: [50, 7],
            backgroundColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        maintainAspectRatio: false,
        options: {
          legend: {
            display: true,
            position: 'bottom',
            labels: {
              fontColor: '#333'
            }
          }
        }
      });
    </script>
  </body>
</html>