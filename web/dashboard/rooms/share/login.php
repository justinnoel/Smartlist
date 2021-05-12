<?php
    include("../../connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM pwd WHERE qty=".$_GET['id']." ORDER BY id DESC");
while($res = mysqli_fetch_array($result)) {
$password = $res['name'];
$name = $res['iname'];
$qty = $res['iqty'];
$ipname = $res['ipname'];
$id = $res['id'];

}

    if (isset($_POST['password']) && $_POST['password'] == $password) {
        setcookie("password", $password, $remember_password);
                header('Location: index.php?id='.$id.'&name='.$name.'&personname='.$ipname.'&itemqty='.$qty.'&room='.$_GET["room"]);

        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Password protected</title>
    <style>
    form {
        height: 100%;
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
    font-family: 'Open Sans', sans-serif;
}
input {background: whitesmoke;outline: 0;border: 0;padding: 15px;width: 100%;transition: all .2s}
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
</head>
<body>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <div style="text-align:center;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);font-family: 'Open Sans', sans-serif;">
        <form method="POST">
        <h2>Enter your password</h2>
        <p>You're viewing an item someone shared with you, but they have password-protected this item. If they have given you the password, please enter it to proceed</p>
            <input type="text" name="password" autofocus autocomplete="off" placeholder="Enter your password">
            <button>Unlock item</button>
        </form>
    </div>
</body>
</html>