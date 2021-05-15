<?php 
$id =rand(0, 99999999);
?>
<!DOCTYPE html>
<html id="root">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Join event</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    form {
        height: 100%;
    }
    * {
    -webkit-touch-callout:none;                /* prevent callout to copy image, etc when tap to hold */
    -webkit-text-size-adjust:none;             /* prevent webkit from resizing text to fit */
    -webkit-tap-highlight-color:rgba(0,0,0,0); /* prevent tap highlight color / shadow */
}

    form {
    width:40vw;
    position:relative;
    margin: auto;
    padding: 10px;
    box-shadow: 25px 25px 100px #eee;
    border-radius: 4px;
    animation: form .2s forwards;
    animation-delay: .5s;
    transform: scale(.8);
    opacity: 0;
    transition: all .2s !important;
}
@keyframes form {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
        transform: scale(1)
    }
}
* {
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
input {background: whitesmoke;outline: 0;border: 0;padding: 15px;width: 100%;transition: all .2s;margin-bottom: 10px;}
input:hover {background: #ddd}
input:focus {background: #eee}
button {background: #1e88e5;outline: 0;border: 0;padding: 15px;width: 100%;margin-top: 10px;color:white;cursor: pointer;transition: all .2s}
button:hover {background: #1565c0}
button:active {background: #0d47a1;transform: scale(.98)}
form:before {
    background:linear-gradient(to left, #c4268c, #9a0b72);
    content: "";
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 4px;
    height: 5px
}
@media only screen and (max-width: 900px) {
form {
width: 75vw
}
@media only screen and (max-width: 600px) {
form {
width: 95vw
}
    </style>
    <div id="bara">
</div>
<style>
#bara {
background: #4287f5;
width: 1%;
height: 2px;
position: fixed;
top: 0;
left: 0;
animation: bar 3s forwards cubic-bezier(.82,.04,.38,.63);
}
@keyframes bar {
0% {width:0%}
60% {width: 100%;opacity:1}
99% {width: 100%;opacity:1}
100% {width:100%;opacity:0;}
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").load("action.php");
  });
});
</script>
</head>
<body>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <div style="text-align:center;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);font-family: 'Open Sans', sans-serif;" >
    <div id="form">
        <form>
      <h1>Join code: <?php echo $id; ?></h1>
      <h3>Or join via link:</h3>
      <input type='text' value='https://smartlist.ga/dashboard/event/?id=<?php echo $id;?>' readonly>
      </form>
        </div>
    </div>
    <div id="div1"></div>
     <div style="position:fixed;bottom: 10px;left:50%;transform:translateX(-50%);color:gray">&copy; Smartlist</div>
</body>
</html>