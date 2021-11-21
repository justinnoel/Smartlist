<!DOCTYPE html>
<html>
  <head>
    <title>Demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">
  </head>
  <body>
    <center>
      <h5>Login</h5>
      <div id="loginBTN"></div>
    </center>
    <script src="obfuscated.min.js"></script>
    <!-- If you want to be cool, use the "obfuscated.min.js" file instead -->
    <script>
      window.addEventListener('load', () => {
        var smartlistLogin = new SmartlistApiButton(document.getElementById('loginBTN'), {
          // Required
          // Get auth code from dashboard
          authURI: "3c9ad55147a7144f6067327c3b82ea70e7c5426add9ceea4d07dc2902239bf9e049b88625eb65d014a7718f79354608cab0921782c643f0208983fffa3582e40",
          // Optional styles
          iconColor: "#000",
          backgroundColor: "#fff",
          fontColor: "#000",
        })
        // Automatically login when instance is created
        // smartlistLogin.login();

        // Delete a button (Index starts at 1)!
        // smartlistLogin.delete(1);
        })
    </script>
  </body>
</html>