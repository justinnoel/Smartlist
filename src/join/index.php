<!DOCTYPE html>
<html>
  <head>
    <title>Join | Smartlist</title>
    <meta name="title" content="Join us |  Smartlist">
    <meta name="description" content="Do you want to help make Smartlist a better app?">
    <link rel="shortcut icon" href="https://i.ibb.co/HPtyvJS/logo.png">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="Join us |  Smartlist">
    <meta property="og:description" content="Do you want to help make Smartlist a better app?">
    <meta property="og:image" content="https://i.ibb.co/1nW9xMJ/banner.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="Join us |  Smartlist">
    <meta property="twitter:description" content="Do you want to help make Smartlist a better app?">
    <meta property="twitter:image" content="https://i.ibb.co/1nW9xMJ/banner.png">
    <style>.loader { z-index:999999999999999;left: 50%; top: 50%; position: fixed; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);transition:all .2s; } .loader #spinner { box-sizing: border-box; stroke: #000; stroke-width: 3px; -webkit-transform-origin: 50%; transform-origin: 50%; -webkit-animation: line 1.6s cubic-bezier(0.4, 0, 0.2, 1) infinite, rotate 1.6s linear infinite; animation: line 1.6s cubic-bezier(0.4, 0, 0.2, 1) infinite, rotate 1.6s linear infinite; } @-webkit-keyframes rotate { from { -webkit-transform: rotate(0); transform: rotate(0); } to { -webkit-transform: rotate(450deg); transform: rotate(450deg); } } @keyframes rotate { from { -webkit-transform: rotate(0); transform: rotate(0); } to { -webkit-transform: rotate(450deg); transform: rotate(450deg); } } @-webkit-keyframes line { 0% { stroke-dasharray: 2, 85.964; -webkit-transform: rotate(0); transform: rotate(0); } 50% { stroke-dasharray: 65.973, 21.9911; stroke-dashoffset: 0; } 100% { stroke-dasharray: 2, 85.964; stroke-dashoffset: -65.973; -webkit-transform: rotate(90deg); transform: rotate(90deg); } } @keyframes line { 0% { stroke-dasharray: 2, 85.964; -webkit-transform: rotate(0); transform: rotate(0); } 50% { stroke-dasharray: 65.973, 21.9911; stroke-dashoffset: 0; } 100% { stroke-dasharray: 2, 85.964; stroke-dashoffset: -65.973; -webkit-transform: rotate(90deg); transform: rotate(90deg); } } iframe {height:calc(100vh + 23px)!important;width:100vw;position:fixed;top:0;left:0;}body{margin:0;overflow:hidden;}</style>
  </head>
  <body>
  <div class="loader" id="loader">
    <svg viewBox="0 0 32 32" width="42" height="42">
        <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
      </svg>
  </div>
    <div id="app"></div>
    <script>
      setInterval(function() {document.body.scrollTop=0;document.documentElement.scrollTop=0}, 200);
      window.addEventListener("load", function() {
        setTimeout(function() {
          document.getElementById("app").innerHTML = `<iframe class="airtable-embed" src="https://airtable.com/embed/shrryYzbZ0JpXn3w0?backgroundColor=teal" frameborder="0" onmousewheel="" width="100%" height="100%" style="background: #fff" style="position:fixed;top:0;left:0;" onload="setTimeout(function() {document.getElementById('loader').remove();}, 500)"></iframe>`;
        }, 500)
      })
    </script>
  </body>
</html>