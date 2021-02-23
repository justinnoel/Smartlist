<?php 
session_start();
if(isset($_POST['submit'])){
$name = $_SESSION['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$loginId = $_SESSION['id'];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO products(name, qty, price, login_id) 
  VALUES('$name','$qty','$price', '$loginId')";
  $conn->exec($sql);
  header('Location: index.php?info_check');
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <title>Add yourself!</title>
</head>
<style>
.nice-select { -webkit-tap-highlight-color: transparent; background-color: #fff;border-bottom: solid 1px #e0e7ee; box-sizing: border-box; clear: both; cursor: pointer; display: block; float: left; font-family: inherit; font-size: 14px; font-weight: normal; height: 42px; line-height: 40px; outline: none; padding-left: 5px; padding-right: 30px; position: relative; text-align: left !important; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; white-space: nowrap; width: auto; } .nice-select:hover { border-color: #d0dae5; }  .nice-select:after { border-bottom: 2px solid #90a1b5; border-right: 2px solid #90a1b5; content: ''; display: block; height: 5px; margin-top: -4px; pointer-events: none; position: absolute; right: 12px; top: 50%; -webkit-transform-origin: 66% 66%; -ms-transform-origin: 66% 66%; transform-origin: 66% 66%; -webkit-transform: rotate(45deg); -ms-transform: rotate(45deg); transform: rotate(45deg); -webkit-transition: all 0.15s ease-in-out; transition: all 0.15s ease-in-out; width: 5px; } .nice-select.open:after { -webkit-transform: rotate(-135deg); -ms-transform: rotate(-135deg); transform: rotate(-135deg); } .nice-select.open .list { opacity: 1; pointer-events: auto; -webkit-transform: scale(1) translateY(0); -ms-transform: scale(1) translateY(0); transform: scale(1) translateY(0); } .nice-select.disabled { border-color: #e7ecf2; color: #90a1b5; pointer-events: none; } .nice-select.disabled:after { border-color: #cdd5de; } .nice-select.wide { width: 100%; } .nice-select.wide .list { left: 0 !important; right: 0 !important; } .nice-select.right { float: right; } .nice-select.right .list { left: auto; right: 0; } .nice-select.small { font-size: 12px; height: 36px; line-height: 34px; } .nice-select.small:after { height: 4px; width: 4px; } .nice-select.small .option { line-height: 34px; min-height: 34px; } .nice-select .list { background-color: #fff; border-radius: 5px; box-shadow: 0 0 0 1px rgba(68, 88, 112, 0.11); box-sizing: border-box; margin-top: 4px; opacity: 0; overflow: hidden; padding: 0; pointer-events: none; position: absolute; top: 100%; left: 0; -webkit-transform-origin: 50% 0; -ms-transform-origin: 50% 0; transform-origin: 50% 0; -webkit-transform: scale(0.75) translateY(-21px); -ms-transform: scale(0.75) translateY(-21px); transform: scale(0.75) translateY(-21px); -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out; transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out; z-index: 1; } .nice-select .list:hover .option:not(:hover) { background-color: transparent !important; } .nice-select .option { cursor: pointer; font-weight: 400; line-height: 40px; list-style: none; min-height: 40px; outline: none; padding-left: 18px; padding-right: 29px; text-align: left; -webkit-transition: all 0.2s; transition: all 0.2s; } .nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus { background-color: #f6f7f9; } .nice-select .option.selected { font-weight: bold; } .nice-select .option.disabled { background-color: transparent; color: #90a1b5; cursor: default; } .no-csspointerevents .nice-select .list { display: none; } .no-csspointerevents .nice-select.open .list { display: block; } code[class*="language-"], pre[class*="language-"] { border-radius: 2px; color: #445870; -webkit-hyphens: none; -ms-hyphens: none; hyphens: none; line-height: 1.5; -moz-tab-size: 4; -o-tab-size: 4; tab-size: 4; text-align: left; white-space: pre; word-break: normal; word-spacing: normal; word-wrap: normal; direction: ltr; font-family: Inconsolata, monospace; font-size: 13px; letter-spacing: 0; } /* Code blocks */ pre[class*="language-"] { padding: 18px 24px; margin: 0 0 24px; overflow: auto; } :not(pre) > code[class*="language-"], pre[class*="language-"] { background: #f6f7f9; } /* Inline code */ :not(pre) > code[class*="language-"] { padding: 0 2px 1px; } .token.comment, .token.prolog, .token.doctype, .token.cdata { color: #90a1b5; } .token.punctuation { color: #999; }
@media only screen and (max-width: 600px) {
.col {
    width: 100% !important
}
}
input,textarea {
    border-color: #e0e7ee !important
}
</style>
<form method="POST" class="container">
    <h5 class="center">Add yourself to the contributor list!</h5>
<select name="qty" class="wide">
    <option value="What have you contributed?" selected disabled>How have you contributed?</option>
    <option value="Produced Framework which is or was used in app">Produced Framework which is/was used in app</option>
    <option value="Developed app">I helped in the development process of this app</option>
    <option value="Helped in security">I helped in the security aspect of this app</option>
</select>
<input name="price"  placeholder="What exactly did you do? Be honest, and feel free to brag about it ;)"> 
<button type="submit" name="submit" class="btn purple darken-3" style="z-index: 0 !important">Submit</button>
<button type="reset" class="btn btn-flat" style="z-index: 0 !important;background:transparent !important">Reset</button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
  $('select').niceSelect();
});
</script>
