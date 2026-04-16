<?php 
    $con = mysqli_connect("localhost", "root", "", "users"); 
?> 
<html> 
    <body> 
        <b>Registered Users</b> 
        <table border="1" cellspacing="0"> 
            <tr> 
                <th>ID</th> 
                <th>Username</th> 
                <th>Password</th> 
            </tr> 
            <?php 
            $query = mysqli_query($con, "SELECT * FROM user"); 
            while($row = mysqli_fetch_array($query)){ 
            ?> 
                <tr> 
                    <td><?php echo $row["id"]; ?></td> 
                    <td><?php echo $row["username"]; ?></td> 
                    <td><?php echo $row["password"]; ?></td> 
                </tr> 
            <?php 
            } 
            ?> 
        </table> 
        
    </body> 
</html>