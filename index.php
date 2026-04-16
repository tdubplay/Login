<?php
$con = mysqli_connect("localhost", "root", "", "users");
session_start();
?>
<html>

<body>
    <form method="POST">
        Username: <input type="text" name="username" placeholder="Username" required><br>
        Password: <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
        <?php
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['username'] = $username;
                echo "<script>window.location='main.php';</script>";
            } else {
                echo "<br/><span style='color: red;'>Invalid username or password.</span>";
            }
        }
        ?>
    </form>
    <form method="POST">
        Username: <input type="text" name="newusername" placeholder="Username" required><br>
        Password: <input type="password" name="newpassword" placeholder="Password" required><br>
        <input type="submit" name="register" value="Register">
    </form>

    <?php
    if (isset($_POST['register'])) {
        $username = $_POST['newusername'];
        $password = $_POST['newpassword'];

        $check = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($con, $check);

        if (mysqli_num_rows($result) > 0) {
            echo "<span style='color:red;'>Username already exists.</span>";
        } else {
            $insert = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

            if (mysqli_query($con, $insert)) {
                echo "<span style='color:green;'>Account created successfully!</span>";
            } else {
                echo "<span style='color:red;'>Error creating account.</span>";
            }
        }
    }
    ?>
</body>

</html>