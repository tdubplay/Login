<?php
$con = mysqli_connect("localhost","root","","dblogin");
session_start();
?>
<html>
<body>
<?php
if(!isset($_SESSION["email"]))
{
?>
<form method="POST">
    Email Address: <input type="email" name="email"></input><br/>
    Password: <input type="password" name="password"></input><br/>
    <input type="submit" name="btnlogin" value="Login"></input>

<?php
if(isset($_POST["btnlogin"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $q = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $count = mysqli_num_rows($q);
    if($count > 0){
        $_SESSION["email"] = $email;
        echo "<script>window.location = 'index.php';</script>";
    }
    else{
        echo "<br/>Invalid Email or Password.";
    }
}
?>
</form>

<?php
}
else{
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
<?php
$q = mysqli_query($con, "SELECT * FROM users");
while($r = mysqli_fetch_array($q)){
?>
    <tr>
        <td><?php echo $r["id"]; ?></td>
        <td><?php echo $r["fullname"]; ?></td>
        <td><?php echo $r["email"]; ?></td>
        <td><?php echo $r["password"]; ?></td>
    </tr>
<?php
}
?>
</table>

<a href="logout.php">Logout</a>

<?php
}
?>
</body>
</html>
