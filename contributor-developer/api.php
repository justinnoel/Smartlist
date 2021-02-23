<?php
session_start();
$name = $_SESSION['name'];
$qty = $_POST['key'];
$price = $_POST['url'];
$loginId = $_SESSION['id'];
if(isset($_POST['submit'])) {
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO api_keys(name, qty, price, login_id, login_user_id) 
  VALUES('$name','$qty','$price', '1', '$loginId')";
  // use exec() because no results are returned
  $conn->exec($sql);
  //echo "New record created successfully";
  header("Location: https://smartlist.ga/contribute/api.php?success&key=$qty");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
    * {
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
        background: #fafafa;
    }
    form {
        <?php if(!isset($_GET['success'])){?>
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        <?php } else {echo "margin:auto;";}?>
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 50px #ccc;
        width: 50vw;
    }
    input {
        width: 100%;
        outline:0;
        margin-top: 10px;
        transition: all .5s;
        border:0;
        border-bottom: 2px solid #eee;
        font-size: 15px;
        padding: 10px;
    }
    input:focus {
        border-bottom: 2px solid teal;
    }
    a,button {
     padding: 10px 20px; 
      border:0;
      font-size: 15px;
      text-transform: uppercase; 
      outline:0;
      cursor: pointer;
      border-radius: 5px;
      background: #038cfc;
      color: white;
      width: 100%;
      transition: all .2s;
      box-shadow: 0 0 10px #eee;
      display:block;
      text-decoration: none;
      text-align:center;
      margin: 5px;
    }
    a:focus,button:focus {
        background: #038cf1
    }
    * {
          -webkit-font-smoothing: antialiased;

    }
    a:hover,button:hover {
      background: #0283ed;
      box-shadow: 2px 0 10px #ccc;
    }
    @keyframes form {
        0% {
            opacity:0;
        }
        100% {opacity:1;}
    }
    hr {
        border: 0;
        height: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }
    a:active,button:active {
      background: #0465b5;
      transform: translateY(2px);
      box-shadow: 2px 0 10px #bbb
    }
    button[disabled] {
     color: gray;
      background: #eee;
      box-shadow: none !important;
      cursor: not-allowed;
    }
    .hljs{display:block;overflow-x:auto;padding:.5em;color:#abb2bf;background:#282c34}.hljs-comment,.hljs-quote{color:#5c6370;font-style:italic}.hljs-doctag,.hljs-formula,.hljs-keyword{color:#c678dd}.hljs-deletion,.hljs-name,.hljs-section,.hljs-selector-tag,.hljs-subst{color:#e06c75}.hljs-literal{color:#56b6c2}.hljs-addition,.hljs-attribute,.hljs-meta-string,.hljs-regexp,.hljs-string{color:#98c379}.hljs-built_in,.hljs-class .hljs-title{color:#e6c07b}.hljs-attr,.hljs-number,.hljs-selector-attr,.hljs-selector-class,.hljs-selector-pseudo,.hljs-template-variable,.hljs-type,.hljs-variable{color:#d19a66}.hljs-bullet,.hljs-link,.hljs-meta,.hljs-selector-id,.hljs-symbol,.hljs-title{color:#61aeee}.hljs-emphasis{font-style:italic}.hljs-strong{font-weight:700}.hljs-link{text-decoration:underline}        hr  {
</style>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://yandex.st/highlightjs/8.0/highlight.min.js"></script>
<form method="POST">
    <?php if(!isset($_GET['success'])){?>
    <h2>Create an API key!</h2>
    <p>Enter a callback URL. This will be used to redirect once logged in</p>
    <input type="hidden" name="key" placeholder="Username" value=<?php echo hash('sha256', rand(0, 999999999999));?>>
    <input type="text" name="url" placeholder="Your Callback URL"><br><br>
    <button type="submit" name="submit">Create</button>
    <?php } else {?>
    <script>
            hljs.initHighlightingOnLoad();
            function copyToClipboard(element) {
  var $temp = $("<textarea>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
        </script>
    <h2>Success!</h2>
    Your API key: <span id="s1"><?php echo $_GET['key'];?></span>
        <button onclick="copyToClipboard('#s1');this.style.backgroundColor='#4caf50';this.innerHTML='Copied!';setTimeout(function(){ this.style.backgroundColor='#038cfc';this.innerHTML='Copy'; }, 1000);" type="button">Copy</button>
<hr>
    Now, you can embed this in your site! Here is the code for you<br>
    <button onclick="copyToClipboard('#p1');this.style.backgroundColor='#4caf50';this.innerHTML='Copied!';setTimeout(function(){ this.style.backgroundColor='#038cfc';this.innerHTML='Copy'; }, 1000);"type="button">Copy</button>
    <pre><code class="code php" id="p1">&lt;link href=&quot;https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap&quot; rel=&quot;stylesheet&quot;&gt;
&lt;style&gt;
* {
    box-sizing: border-box;
    font-family: &#39;Poppins&#39;, sans-serif;
}
body {
    background: #fafafa;
}
form {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background: #fff;
    box-shadow: 0 0 50px #ccc;
    width: 50vw;
}
input {
    width: 100%;
    outline:0;
    margin-top: 10px;
    transition: all .5s;
    border:0;
    border-bottom: 2px solid #eee;
    font-size: 15px;
    padding: 10px;
}
input:focus {
    border-bottom: 2px solid teal;
}
a,button {
 padding: 10px 20px; 
  border:0;
  font-size: 15px;
  text-transform: uppercase; 
  outline:0;
  cursor: pointer;
  border-radius: 5px;
  background: #038cfc;
  color: white;
  width: 100%;
  transition: all .2s;
  box-shadow: 0 0 10px #eee;
  display:block;
  text-decoration: none;
  text-align:center;
  margin: 5px;
}
a:focus,button:focus {
    background: #038cf1
}
a:hover,button:hover {
  background: #0283ed;
  box-shadow: 2px 0 10px #ccc;
}
a:active,button:active {
  background: #0465b5;
  transform: translateY(2px);
  box-shadow: 2px 0 10px #bbb
}
button[disabled] {
 color: gray;
  background: #eee;
  box-shadow: none !important;
  cursor: not-allowed;
}
&lt;/style&gt;
&lt;form method=&quot;POST&quot;&gt;
    &lt;?php if(!isset($_GET[&#39;success&#39;])){?&gt;
    &lt;img src=&quot;https://img.flaticon.com/icons/png/512/295/295128.png?size=1200x630f&amp;pad=10,10,10,10&amp;ext=png&amp;bg=FFFFFFFF&quot; width=&quot;50%&quot; style=&quot;display:block;margin: auto&quot;&gt;
    &lt;h2&gt;Simple login form using Smartlist API&lt;/h2&gt;
    &lt;p&gt;Here, we show you how an example of using the Smartlist API. Image by flaticon&lt;/p&gt;
    &lt;input type=&quot;text&quot; placeholder=&quot;Username&quot;&gt;
    &lt;input type=&quot;text&quot; placeholder=&quot;Password&quot;&gt;
    &lt;button type=&quot;submit&quot; disabled&gt;Log in&lt;/button&gt;
    &lt;a href=&quot;https://smartlist.ga/auth?key=<?php echo $_GET['key'];?>&quot;&gt;Log in with Smartlist&lt;/a&gt;
    &lt;?php } else {?&gt;
        &lt;div style=&quot;background: #34eb64;color:white;padding: 10px;border-radius: 5px&quot;&gt;Successfully Signed In!&lt;br&gt;
        Data Collected: &lt;br&gt;
        Username: &lt;?php echo $_GET[&#39;username&#39;];?&gt;&lt;/div&gt;
    &lt;?php }?&gt;
&lt;/form&gt;

</code></pre>
    <?php }?>
    </form>
