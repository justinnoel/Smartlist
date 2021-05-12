<?php
    /* Your password */
    include("../../connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM pwd WHERE qty=".$_GET['id']." ORDER BY id DESC");
#echo mysqli_num_rows($result);
if(mysqli_num_rows($result) > 0) {
while($res = mysqli_fetch_array($result)) {
$password = $res['name'];
}
    if (empty($_COOKIE['password']) || $_COOKIE['password'] !== $password) {
        // Password not set or incorrect. Send to login.php.
        header('Location: login.php?integrity='.hash('sha256', rand(0, 9999999999)).'&id='.$_GET['id']);
        exit;
    }
}
?>
<?php
$item = htmlspecialchars($_GET["name"]);
$room = htmlspecialchars($_GET["room"]);
$name = htmlspecialchars($_GET["personname"]);
$itemqty = htmlspecialchars($_GET["itemqty"]);

?>
<!DOCTYPE html> 
<html>
<link rel="preconnect" href="https://fonts.gstatic.com">
<!-- Compiled and minified CSS -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="comments.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<head>
</head>
<body>
 <nav class="purple darken-2">
    <div class="nav-wrapper">
      <a href="https://homebase.rf.gd" class="brand-logo left"><i class="material-icons"></i>Homebase</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
      </ul>
    </div>
  </nav>
  <div class="row">
  <div class="col s6">
  <center><i class="material-icons center" style="font-size: 100px;">share</i>
<h5>Currently, <u><?php echo $name ?></u> has <u><?php echo $itemqty ?></u> <u><?php echo $item ?></u> in the <u><?php echo $room ?></u></h5>
<a class="btn red btn-large waves-effect waves-light" href="https://homebase.rf.gd/homebase/adda.php?item=">Add this to my inventory</a>
</center>
</div>
<div class="col s6" style="overflow: scroll;height: 85vh">
<div class="comments"></div>
</div>
</div>
<script>
const comments_page_id = <?php echo $_GET['id'];?> ; // This number should be unique on every page
fetch("comments.php?page_id=" + comments_page_id).then(response => response.text()).then(data => {
	document.querySelector(".comments").innerHTML = data;
	document.querySelectorAll(".comments .write_comment_btn, .comments .reply_comment_btn").forEach(element => {
		element.onclick = event => {
			event.preventDefault();
			document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
			document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']").style.display = 'block';
			document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "'] input[name='name']").focus();
		};
	});
	document.querySelectorAll(".comments .write_comment form").forEach(element => {
		element.onsubmit = event => {
			event.preventDefault();
			fetch("comments.php?page_id=" + comments_page_id, {
				method: 'POST',
				body: new FormData(element)
			}).then(response => response.text()).then(data => {
				element.parentElement.innerHTML = data;
			});
		};
	});
});
</script>
<?php 
if(isset($_GET['new'])) {
?>
<div id="modal" class="modal">
    <div class="modal-content modal-fixed-footer">
      <h4>Share</h4>
      <h6>Link</h6>
     <input type="text" value="https://homebase.rf.gd/homebase/rooms/share/?integrity=sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhHQWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=&personname=<?php echo $name ?>&itemqty=<?php echo $itemqty ?>&item=<?php echo $item ?>&room=<?php echo $room ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name'];?>" id="myInput">
     <button onclick="myFunction()" class="right btn waves-light waves-effect">Copy link</button>
     <h6>Other</h6>
     <a href="https://classroom.google.com/share?url=https://homebase.rf.gd/homebase/rooms/share/?integrity=sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhHQWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=&personname=<?php echo $name ?>&itemqty=<?php echo $itemqty ?>&item=<?php echo $item ?>&room=<?php echo $room ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name'];?>">Google Classroom</a>
    <br><br><br>
<form action="./pwd/add.php?personname=<?php echo $name ?>&itemqty=<?php echo $itemqty ?>&item=<?php echo $item ?>&room=<?php echo $room ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name'];?>" method="post" name="form1" style="padding: 10px;border-radius: 4px;" class="raed lighten-3">
<p>Password Protect item</p>
<p>This action is <b>irreversible</b>. Make sure you enter the correct password. You will not be able to recover this!</p>
<input type="text" name="name" class="form-control" placeholder="Password...">
<input type="hidden" name="qty" class="form-control" placeholder="Password..." value="<?php echo $_GET[id];?>">
<input type="submit" name="Submit" value="Set Password" class=" right text-center btn red d-block m-auto" style="box-shadow:none !important">
</form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
<script>
 $(document).ready(function(){
    $('#modal').modal();
    $('#modal').modal('open'); 
 });
</script>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  M.toast({html: 'Copied!'})
}
</script>
<?php }?>
</body>
</html>