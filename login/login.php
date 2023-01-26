<?php 

include('config.php');

    //login user
    if ($_SERVER["REQUEST_METHOD"] == 'POST' ){
        $username = $_POST['username'];
        $password = $_POST['password_1'];

            $hashed_password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password='$hashed_password'";
            $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)){
           
            $_SESSION['username'] = $username;
            $_SESSION['success'] = " Logged in Successfully";
            echo '<script>alert("Logged in Successfully.")</script>';
            header("location:index.php");
        } else{
           echo '<script>alert("Wrong username or password combinations. Please Try again.")</script>';
        }
    }
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container" >
        <div class="header">
            <h2>Log In</h2>
        </div>

        <form action="" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
                 <br>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password_1" required>
            </div>
                 <br>
          <button type="submit" name="login_user">Submit</button>

          <p>No account yet? <a href="register.php"><b>Register Here</b></a></p>
        </form>

    </div>
</body>
</html>